<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = []; // Fetch testimonials
        $steps = []; // Fetch steps for how the service works
        return view('client', compact('testimonials', 'steps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

public function showDashboard()
{
    $categories = ServiceCategory::all();

    $services = Service::where('is_featured', true)->get();
    return view('dashboard.client', compact('categories', 'services'));
}

public function book()
    {
        // Logic for booking
        return view('book');
    }

    public function registerProfessional()
    {
        // Professional registration logic
        return view('register.professional');
    }

    public function searchServices(Request $request)
    {
        // Handle the search logic
        $services = []; // Query services based on $request->q
        return view('services.search', compact('services'));
    }

    public function viewService($service)
    {
        // Return service details based on $service
        return view('services.' . $service);
    }

    // Specific Service Methods
    public function plumbing()
    {
        return view('services.plumbing');
    }
    
    public function electrical()
    {
        return view('services.electrical');
    }
    
    public function painting()
    {
        return view('services.painting');
    }

    public function moving()
    {
        return view('services.moving');
    }

    public function carpentry()
    {
        return view('services.carpentry');
    }

    public function gardening()
    {
        return view('services.gardening');
    }

    public function cleaning()
    {
        return view('services.cleaning');
    }

    public function security()
    {
        return view('services.security');
    }
}
