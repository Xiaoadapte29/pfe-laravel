<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessionalDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
$professional = Auth::user();
        
        $professionalData = [
            'name' => $professional->name,
            'specialty' => 'Plumbing',
            'rating' => 4.8,
            'totalJobs' => 127,
            'profileViews' => 1250,
            'earnings' => 15420,
            'status' => 'verified',
            'profileCompletion' => 85
        ];

        $bookings = [
            [
                'id' => 1,
                'client' => 'Sarah Johnson',
                'service' => 'Kitchen Sink Repair',
                'date' => '2024-01-15',
                'time' => '10:00 AM',
                'status' => 'confirmed',
                'price' => 120
            ],
            [
                'id' => 2,
                'client' => 'Mike Wilson',
                'service' => 'Bathroom Plumbing',
                'date' => '2024-01-16',
                'time' => '2:00 PM',
                'status' => 'pending',
                'price' => 250
            ],
            [
                'id' => 3,
                'client' => 'Emma Davis',
                'service' => 'Pipe Installation',
                'date' => '2024-01-17',
                'time' => '9:00 AM',
                'status' => 'completed',
                'price' => 300
            ]
        ];

        return view('professionals.dashboard', compact('professionalData', 'bookings'));
    
    

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
