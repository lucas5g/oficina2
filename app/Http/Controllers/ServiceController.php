<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   
    public function index()
    {
        $services = Service::all();

       return $services;

    }

   
    // public function create()
    // {
    //     return view('services.form');
    // }

   
    public function store(Request $request)
    {

        // return ['msg' => 'teste'];
        $service = new Service();

        $service->client = $request->client;
        $service->salesman = $request->salesman;
        $service->description = $request->description;
        $service->price = $request->price;

        $service->save();

        return $service;

        
        
    }

    
    public function show(Service $service)
    {
        //
    }

 
    public function edit(Service $service)
    {
        //
    }

    
    public function update(Request $request, Service $service)
    {
        //
    }

    public function destroy(Service $service)
    {
        //
    }
}
