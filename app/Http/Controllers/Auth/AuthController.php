<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Provider;
use App\JobProfile;
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
        $credentials = request(['email', 'password', 'role']);
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
    	$user->verified = 0;
        $user->role = "user-app";

    	$user->save();

    	return response()->json([
    		'message' => 'Successfull created user!'
    	], 200);
    }

/*-------------------------------------------------------------------------------------------------------------*/
    
    public function providerLogin(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        $credentials = request(['email', 'password', 'role']);
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


    public function providerLogout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function provider(Request $request)
    {
        $id = $request->user()->id;
        $providerProfile = JobProfile::with(['providers', 'providers.providerServices', 'providers.providerServices.categories', 'providers.providerServices.services'])
                ->where('provider_id', $id)->get();

        return response()->json([
            $providerProfile
        ]);
    }


    public function getProviders($id = null) {
        $provider = Provider::find($id);
        return response()->json($provider);
    }

    public function registerProvider(Request $request)
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

        $provider = new Provider;

        $provider->first_name = $request->firstName;
        $provider->last_name = $request->lastName;
        $provider->email = $request->email;
        $provider->password = bcrypt($request->password);
        $provider->gender = $request->gender;
        $provider->phone_number = $request->phoneNumber;
        $provider->location = $request->location;
        $provider->address = $request->address;
        $provider->image = $file;
        $provider->verified = 0;

        $provider->save();

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
        $user->verified = 0;
        $user->role = "provider-app";

        $user->save();

        return response()->json([
            'message' => 'Successfull created provider!'
        ], 200);
    }

}
