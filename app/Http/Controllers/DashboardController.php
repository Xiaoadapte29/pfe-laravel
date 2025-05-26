<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function client()
    {
        $clientBookings = Booking::where('client_id', Auth::id())->get();
        return view('dashboard.client', compact('clientBookings'));
    }

    // Show the professional dashboard
    public function professional()
    {
        $professionalServices = Service::where('professional_id', Auth::id())->get();
        $professionalBookings = Booking::whereHas('service', function($query) {
            $query->where('professional_id', Auth::id());
        })->get();
        return view('dashboard.professional', compact('professionalServices', 'professionalBookings'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    
}
