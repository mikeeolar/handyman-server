<?php

namespace App\Http\Controllers;

use App\Service;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param null $categoryId
     * @return Response
     */


    public function __invoke(Request $request, $categoryId = null) {
        if (isset($categoryId)) {
            $services = Service::with('categories')->where('category_id', $categoryId)->get();
        } else {
            $services = Service::with('categories')->get();
        }
        return response()->json([
            'services'=> $services
        ]);
    }

    public function index()
    {
        if (isset($serviceId)) {
            $services = Service::with(['categories'])
                ->where('service_id', $serviceId)->get();
        } else {
            $services = Service::with(['categories'])->get();
        }
        return view('admin.services.index', compact('services'));
    }

    public function list()
    {
        if (isset($serviceId)) {
            $services = Service::with(['categories'])
                ->where('service_id', $serviceId)->get();
        } else {
            $services = Service::with(['categories'])->get();
        }

        return response()->json([
            'Services' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.services.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param service $service
     * @return Response
     */
    public function show(service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param service $service
     * @return Response
     */
    public function edit(service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param service $service
     * @return Response
     */
    public function update(Request $request, service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param service $service
     * @return Response
     */
    public function destroy(service $service)
    {
        //
    }
}
