<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingController extends Controller
{
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
    public function create(Request $request)
{
    $serviceId = $request->query('service');
    $service = Service::find($serviceId);

    return view('bookings.create', compact('service'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'service_id' => 'required|exists:services,id',
        'scheduled_at' => 'required|date|after:now',
        'notes' => 'nullable|string|max:1000',
    ]);

    $service = Service::findOrFail($request->service_id);

    Booking::create([
        'client_id' => auth()->id(),
        'service_id' => $service->id,
        'scheduled_at' => $request->scheduled_at,
        'scheduled_end_time' => now()->parse($request->scheduled_at)->addMinutes($service->duration),
        'status' => 'pending',
        'notes' => $request->notes,
    ]);

    return redirect()->route('dashboard.client')->with('success', 'Votre demande a été envoyée avec succès.');
}

    public function acceptRefuse($id, $action)
    {
        $booking = Booking::findOrFail($id);

        if ($action == 'accept') {
            $booking->update(['status' => 'accepted']);
        } elseif ($action == 'refuse') {
            $booking->update(['status' => 'cancelled', 'cancellation_reason' => 'Refused by professional']);
        }

        return redirect()->route('dashboard.professional')->with('success', 'Booking status updated.');
    }

    // Cancel a booking (by client or professional)
    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'cancelled', 'cancellation_reason' => 'Cancelled by client']);
        return redirect()->route('dashboard.client')->with('success', 'Booking cancelled.');
    }

    // Mark a booking as complete
    public function complete($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'completed']);
        return redirect()->route('dashboard.professional')->with('success', 'Booking marked as completed.');
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
