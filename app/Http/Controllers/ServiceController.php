<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   
    public function index(Request $request)
    {
        // $date = $request->query('date');
        // $client = $request->query('client');
        // $salesman = $request->query('salesman');
        $query = $request->query();

        $services = Service::where([
                ['created_at', 'LIKE',  "{$query['date']}%"],
                ['client', 'LIKE', '%'.$query['client'].'%'],
                ['salesman', 'LIKE', '%'.$query['salesman'].'%'],

            ])->get();

        return $services;

    }
  
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


    public function update(Request $request, Service $service)
    {
        //
    }

    public function destroy(Service $service)
    {
        //
    }
}
