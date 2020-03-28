<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }


    public function getUsers($id = null) {
        $user = User::find($id);
        return response()->json($user);
    }

    public function register(Request $request)
    {
    	$request->validate([
    		'firstName' => 'required|string',
    		'lastName' => 'required|string',
    		'email' => 'required|string',
    		'password' => 'required|string',
    		'gender' => 'required',
    		'phoneNumber' => 'required',
    		'location' => 'required',
    		'address' => 'required',
    		'image' => 'required'
    		// 'mode' => 'required|string',
    	]);


		$folderPath = "uploads/";
		$base64Image = $request->image;
	    $image_parts = explode(";base64,", $base64Image);
	    $image_type_aux = explode("image/", $image_parts[0]);
	    $image_type = $image_type_aux[1];
	    $image = base64_decode($image_parts[1]);
	    $file = $folderPath . uniqid() . '.jpg';

	    file_put_contents($file, $image);

    	$user = new User;

    	$user->first_name = $request->firstName;
    	$user->last_name = $request->lastName;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->gender = $request->gender;
    	$user->phone_number = $request->phoneNumber;
    	$user->location = $request->location;
    	$user->address = $request->address;
    	$user->image = $file;
    	$user->mode = "App-User";
    	$user->verified = 0;

    	$user->save();

    	return response()->json([
    		'message' => 'Successfull created users!'
    	], 200);
    }
}
