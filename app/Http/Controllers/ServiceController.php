<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   
    public function index()
    {
        $services = Service::all();

        return view('services.index', [
            'services' => $services
        ]);

    }

   
    public function create()
    {
        return view('services.form');
    }

   
    public function store(Request $request)
    {
        //
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
