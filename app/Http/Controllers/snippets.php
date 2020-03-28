
//        if (isset($serviceId)) {
//            $handyMan = HandyWork::with('users')->where('service_id', $serviceId)->get();
//        } else {
//            $handyMan = HandyWork::with('users')->get();
//        }
//        return response()->json([
//            'handyman'=> $handyMan
//        ]);

//        if (isset($serviceId)) {
//            $user_services = User::with(['userServices.categories', 'userServices.services'])->where('user_services.services.service_id', $serviceId)->get();
//        } else {
//            $user_services = User::with(['userServices.categories', 'userServices.services'])->get();
//        }
//        return response()->json([
//            'Users Services' => $user_services
//        ]);


//        $category = Category::with('services')->get();
//        return response()->json([
//            'Categories'=> $category
//        ]);

//        $user_services = UserService::with(['users'])->get();
//        return response()->json([
//            'User Services'=> $user_services
//        ]);