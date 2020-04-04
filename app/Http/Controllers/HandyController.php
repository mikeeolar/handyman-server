<?php

namespace App\Http\Controllers;

use App\Category;
use App\Booking;
use App\HandyWork;
use App\User;
use App\ProviderService;
use App\JobProfile;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
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

    public function cancelBooking($providerId = null) {
        $booking = Booking::where('provider_id', $providerId);
        $booking->update(['status' => 'Cancelled']);

        return response()->json([
            'Message' => 'Booking status updated'
        ]);
    }
}
