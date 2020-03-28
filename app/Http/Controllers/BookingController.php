<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
    		'userId' => 'required',
    		'specialistId' => 'required',
    		'category' => 'required|string',
    		'service' => 'required|string',
    		'bookDate' => 'required',
		    'timeFrom' => 'required',
		    'timeTo'=> 'required',
		    'location' => 'required',
		    'address'=> 'required',
		    'addInfo'=> 'required'
    	]);

        $bookDate = date("Y-m-d", strtotime($request->bookDate));
        $timeFrom = date("h:i:s", strtotime($request->timeFrom));
        $timeTo = date("h:i:s", strtotime($request->timeTo));

    	$booking = new Booking;

    	$booking->user_id = $request->userId;
    	$booking->specialist_id = $request->specialistId;
    	$booking->category = $request->category;
    	$booking->service = $request->service;
    	$booking->book_date = $bookDate;
    	$booking->time_from = $timeFrom;
    	$booking->time_to = $timeTo;
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
}
