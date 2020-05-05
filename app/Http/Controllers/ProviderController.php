<?php

namespace App\Http\Controllers;

use App\JobProfile;
use App\Provider;
use App\User;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::all();
        // dd($providers[0]->first_name);
        return view('admin.providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.providers.create');
    }

    public function verified($id) {
        $provider = Provider::find($id);
        $provider->update(['verified' => 1]);
        session()->flash('msg', 'This user is now verified');
        return redirect('/admin/providers');
    }

    public function notVerified($id) {
        $provider = Provider::find($id);
        $provider->update(['verified' => 0]);
        session()->flash('msg', 'This user is not verified');
        return redirect('/admin/providers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|confirmed',
            'gender' => 'required',
            'phone_number' => 'required',
            'location' => 'required',
            'address' => 'required',
            'image' => 'required|image',
            'mode' => 'number',
            'verified' => 'numeric'
        ]);

        if ($request->hasFile('image')) {
//            $fileNameWithExt = $request->file('image')->getClientOriginalName();
//            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = uniqid() . '.' . $extension;
            $image = $request->image;
            $image->move('uploads', $fileNameToStore);

            $folderPath = "uploads/";
            $imagePath = $folderPath . $fileNameToStore;
        }

        Provider::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'location' => $request->location,
            'address' => $request->address,
            'image' => $imagePath,
            'verified' => 0
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'location' => $request->location,
            'address' => $request->address,
            'image' => $imagePath,
            'verified' => 0,
            'role' => 'provider-app'
        ]);

        $request->session()->flash('msg', 'New Provider Created');
        return redirect('admin/providers/create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $user = User::find($id);
//        return view('admin.providers.details', compact('user'));
//        $userProfile = JobProfile::with(['users', 'users.userServices', 'users.userServices.categories', 'users.userServices.services'])
//            ->where('user_id', $id)->get();
//        return view('admin.providers.details', compact('userProfile'));
//        $profile = User::find($id)->with('jobProfile');
//        return view('admin.providers.details', compact('profile'));
        $providerProfile = JobProfile::with(['providers', 'providers.providerServices', 'providers.providerServices.categories', 'providers.providerServices.services'])
            ->where('provider_id', $id)->get();
        return view('admin.providers.details', compact('providerProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
