<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = \App\Models\Service::paginate(10);
        return view('services.index', compact('services'));
    }
}
