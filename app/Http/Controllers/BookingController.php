<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
    		'userId' => 'required',
    		'providerId' => 'required',
    		'category' => 'required|string',
    		'service' => 'required|string',
    		'bookDate' => 'required',
		    'time' => 'required',
		    'location' => 'required',
		    'address'=> 'required',
		    'addInfo'=> 'required'
    	]);

        $bookDate = date("Y-m-d", strtotime($request->bookDate));
        $time = date("h:ia", strtotime($request->time));

    	$booking = new Booking;

    	$booking->user_id = $request->userId;
    	$booking->provider_id = $request->providerId;
    	$booking->category = $request->category;
    	$booking->service = $request->service;
    	$booking->book_date = $bookDate;
    	$booking->time = $time;
    	// $booking->book_date = $request->bookDate;
    	// $booking->time_from = $request->timeFrom;
    	// $booking->time_to = $request->timeTo;
    	$booking->location = $request->location;
    	$booking->address = $request->address;
    	$booking->additional_info = $request->addInfo;
        $booking->status = "Pending";

    	$booking->save();

    	return response()->json([
    		'message' => 'Successfully booked specialist!'
    	], 200);
    }

    public function show($id)
    {
        if (isset($id)) {
            $userBookings = Booking::with(['users', 'providers', 'providers.providerServices', 'providers.providerServices.categories', 'providers.providerServices.services'])
                ->where('user_id', $id)->get();
        } else {
            $userBookings = Booking::with(['users', 'providers', 'providers.providerServices', 'providers.providerServices.categories', 'providers.providerServices.services'])->get();
        }
        $books = Booking::all();

        return response()->json([
            'ProviderBookings' => $userBookings,
            'Date' => date("D d M,Y", strtotime($books[0]->book_date))
        ]);
    }
}
