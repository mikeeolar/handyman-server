<?php

namespace App\Http\Controllers;

use App\Category;
use App\HandyWork;
use App\User;
use App\UserService;
use App\JobProfile;
use Illuminate\Http\Request;

class HandyController extends Controller
{
    public function userServices($serviceId = null)
    {
        if (isset($serviceId)) {
            $user_services = UserService::with(['users', 'categories', 'services'])
                ->where('service_id', $serviceId)->get();
        } else {
            $user_services = UserService::with(['users', 'categories', 'services'])->get();
        }

        return response()->json([
            'UserServices' => $user_services
        ]);
    }

    public function userProfile($userId = null)
    {
        if (isset($userId)) {
            $userProfile = JobProfile::with(['users', 'users.userServices', 'users.userServices.categories', 'users.userServices.services'])
                ->where('user_id', $userId)->get();
        } else {
            $userProfile = JobProfile::with(['users', 'users.userServices', 'users.userServices.categories', 'users.userServices.services'])->get();
        }

        return response()->json([
            'UserProfile' => $userProfile
        ]);
    }
}
