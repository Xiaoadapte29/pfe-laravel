<?php

namespace App\Http\Controllers;

use App\Models\Booking;
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

    // Get bookings related to this professional’s services
    $bookings = Booking::whereHas('service', function ($query) use ($professional) {
        $query->where('professional_id', $professional->id);
    })->with('client', 'service')->get();

    $bookingData = $bookings->map(function ($booking) {
        return [
            'id' => $booking->id,
            'client' => $booking->client->name,
            'service' => $booking->service->name,
            'date' => $booking->scheduled_at->format('Y-m-d'),
            'time' => $booking->scheduled_at->format('h:i A'),
            'status' => $booking->status,
            'price' => $booking->service->price,
        ];
    });

    // Fetch reviews related to this professional's services via bookings
    $reviews = \App\Models\Review::whereHas('booking.service', function ($query) use ($professional) {
        $query->where('professional_id', $professional->id);
    })->with('client')->get();

    // Your professional data (replace with real data if available)
    $professionalData = [
        'name' => $professional->name,
        'specialty' => $professional->specialty ?? 'N/A',
        'rating' => 4.8,
        'totalJobs' => 127,
        'profileViews' => 1250,
        'earnings' => 15420,
        'status' => 'verified',
        'profileCompletion' => 85,
    ];
$services = $professional->services ?? \App\Models\Service::where('professional_id', $professional->id)->get();

   return view('professionals.dashboard', [
    'professionalData' => $professionalData,
    'bookings' => $bookingData,
    'reviews' => $reviews,
    'professional' => $professional, // To show profile info in form
    'services' => $services           // To loop services in Pricing tab
]);

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
