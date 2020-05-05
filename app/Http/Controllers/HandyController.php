<?php

namespace App\Http\Controllers;

use App\Category;
use App\Booking;
use App\HandyWork;
use App\User;
use App\Job;
use App\ProviderService;
use App\JobProfile;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class HandyController extends Controller
{

    public function providerServices($serviceId = null)
    {
        if (isset($serviceId)) {
            $provider_services = ProviderService::with(['providers', 'categories', 'services'])
                ->where('service_id', $serviceId)->get();
        } else {
            $provider_services = ProviderService::with(['providers', 'categories', 'services'])->get();
        }

        return response()->json([
            'ProviderServices' => $provider_services
        ]);
    }

    public function providerProfile($providerId = null)
    {
        if (isset($providerId)) {
            $providerProfile = JobProfile::with(['providers', 'providers.providerServices', 'providers.providerServices.categories', 'providers.providerServices.services'])
                ->where('provider_id', $providerId)->get();
        } else {
            $providerProfile = JobProfile::with(['providers', 'providers.providerServices', 'providers.providerServices.categories', 'providers.providerServices.services'])->get();
        }

        return response()->json([
            'ProviderProfile' => $providerProfile
        ]);
    }

    public function jobDetails($providerId = null) {
        if (isset($providerId)) {
            $jobDetails = Booking::with(['providers', 'providers.providerServices', 'providers.providerServices.categories', 'providers.providerServices.services'])
                ->where('provider_id', $providerId)->get();
        } else {
            $jobDetails = Booking::with(['providers', 'providers.userServices', 'providers.providerServices.categories', 'providers.providerServices.services'])->get();
        }

        return response()->json([
            'ProviderBookings' => $jobDetails
        ]);
    }

    public function getAllJobs($providerId = null) {
        if (isset($providerId)) {
            $jobs = Booking::with(['users', 'providers', 'providers.providerServices', 'providers.providerServices.categories', 'providers.providerServices.services'])
                ->where(['provider_id' => $providerId])->get();
        } else {
            $jobs = Booking::with(['users', 'providers', 'providers.userServices', 'providers.providerServices.categories', 'providers.providerServices.services'])->get();
        }

        return response()->json([
            'Jobs' => $jobs
        ]);
    }

    public function upcomingJobs($userId) {
        if (isset($userId)) {
            $upcomingJobs = Booking::with(['users',  'providers', 'providers.providerServices', 'providers.providerServices.categories', 'providers.providerServices.services'])
                ->where([
                    ['user_id', '=', $userId], 
                    ['status', '=', 'Pending']])->orWhere('status', '=', 'Accepted')->get();
        }
        return response()->json([
            'UpcomingJobs' => $upcomingJobs
        ]);
    }

    public function pastJobs($userId) {
        if (isset($userId)) {
            $pastJobs = Booking::with(['users',  'providers', 'providers.providerServices', 'providers.providerServices.categories', 'providers.providerServices.services'])
                ->where(['user_id' => $userId, 'status' => 'Completed'])->get();
        }
        return response()->json([
            'PastJobs' => $pastJobs
        ]);
    }

    public function allJobs($providerId = null) {
       if (isset($providerId)) {
           $jobs = Job::with(['providers', 'users', 'bookings'])
               ->where(['provider_id' => $providerId])->get();
       } else {
           $jobs = Job::with(['providers', 'users', 'bookings'])->get();
       }

       return response()->json([
           'Jobs' => $jobs
       ]);
   }

    public function getPendingJobs($providerId = null) {
        if (isset($providerId)) {
            $jobs = Booking::with(['users', 'providers', 'providers.providerServices', 'providers.providerServices.categories', 'providers.providerServices.services'])
                ->where(['provider_id' => $providerId, 'status' => 'Pending'])->get();
        } else {
            $jobs = Booking::with(['users', 'providers', 'providers.userServices', 'providers.providerServices.categories', 'providers.providerServices.services'])->get();
        }

        return response()->json([
            'Jobs' => $jobs
        ]);
    }

    public function getAcceptedJobs($providerId = null) {
        if (isset($providerId)) {
            $jobs = Booking::with(['users', 'providers', 'providers.providerServices', 'providers.providerServices.categories', 'providers.providerServices.services'])
                ->where(['provider_id' => $providerId, 'status' => 'Accepted'])->get();
        } else {
            $jobs = Booking::with(['users', 'providers', 'providers.userServices', 'providers.providerServices.categories', 'providers.providerServices.services'])->get();
        }

        return response()->json([
            'Jobs' => $jobs
        ]);
    }

    public function cancelBooking($providerId = null) {
        $booking = Booking::where('provider_id', $providerId);
        $booking->update(['status' => 'Cancelled']);

        return response()->json([
            'Message' => 'Booking status updated'
        ]);
    }

    public function acceptJobStatus($providerId = null) {
        $booking = Booking::where('provider_id', $providerId);
        $booking->update(['status' => 'Accepted']);

        return response()->json([
            'Message' => 'Booking status updated'
        ]);
    }

    public function storeJobs(Request $request) {
        $providerId = $request->providerId;
        $booking = Booking::where('provider_id', $providerId)->get();
        $acceptedTime = $booking[0]->updated_at;

        $job = new Job;

        $job->provider_id = $providerId;
        $job->user_id = $request->userId;
        $job->booking_id = $request->bookingId;
        $job->status = "Accepted";
        $job->accepted_at = $acceptedTime;

        $job->save();
    }

    public function updateStartJob($providerId = null) {
        $booking = Booking::where('provider_id', $providerId);
        $booking->update(['status' => 'Started']);

        $bking = Booking::where('provider_id', $providerId)->get();
        $startedTime = $bking[0]->updated_at;

        $job = Job::where('provider_id', $providerId);
        $job->update(['status' => 'Started', 'started_at' => $startedTime]);

        return response()->json([
            'Message' => 'Job & Booking status updated'
        ]);
    }

    public function updateCompleteJob($providerId = null) {
        $booking = Booking::where('provider_id', $providerId);
        $booking->update(['status' => 'Completed']);

        $bking = Booking::where('provider_id', $providerId)->get();
        $completedTime = $bking[0]->updated_at;

        $job = Job::where('provider_id', $providerId);
        $job->update(['status' => 'Completed', 'completed_at' => $completedTime]);

        return response()->json([
            'Message' => 'Job & Booking status updated'
        ]);
    }

}
