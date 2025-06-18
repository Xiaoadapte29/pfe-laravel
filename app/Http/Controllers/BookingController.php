<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $serviceId = $request->input('service_id');
    
    if (!$serviceId) {
        return redirect()->route('services.index')
               ->with('error', 'Please select a service first');
    }

    $service = Service::findOrFail($serviceId);
    $bookings = Booking::where('service_id', $serviceId)->get();

    return view('bookings.index', [
        'service' => $service,
        'bookings' => $bookings
    ]);
}



    /**
     * Show the form for creating a new booking.
     */
   public function create(Request $request)
{
    $serviceId = $request->input('service_id');
        $service = Service::findOrFail($serviceId);
        
        return view('bookings.create', compact('service'));
}


    /**
     * Store a newly created booking.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'nullable|string',
            'date' => 'required|date',
            'time' => 'required',
            'notes' => 'nullable|string'
        ]);

        $booking = Booking::create($validated);
        
        return redirect()->route('bookings.index', ['service_id' => $booking->service_id])
            ->with('success', 'Booking created successfully!');
    }

    /**
     * Accept or refuse a booking (by professional).
     */
    public function acceptRefuse($id, $action)
    {
        $booking = Booking::findOrFail($id);
        $user = auth()->user();

        if ($user->role !== 'professional' || $booking->service->professional_id !== $user->id) {
            abort(403, 'Unauthorized');
        }

        if ($action === 'accept') {
            $booking->update(['status' => 'accepted']);
        } elseif ($action === 'refuse') {
            $booking->update([
                'status' => 'cancelled',
                'cancellation_reason' => 'Refused by professional',
            ]);
        }

        return redirect()->route('dashboard.professional')->with('success', 'Booking status updated.');
    }

    /**
     * Cancel a booking (by client or professional).
     */
    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);
        $user = auth()->user();

        if (
            !(
                ($user->role === 'client' && $booking->client_id === $user->id) ||
                ($user->role === 'professional' && $booking->service->professional_id === $user->id)
            )
        ) {
            abort(403, 'Unauthorized');
        }

        $booking->update([
            'status' => 'cancelled',
            'cancellation_reason' => $user->role === 'client' ? 'Cancelled by client' : 'Cancelled by professional',
        ]);

        return redirect()->back()->with('success', 'Booking cancelled.');
    }

    /**
     * Mark a booking as complete (by professional).
     */
    public function complete($id)
    {
        $booking = Booking::findOrFail($id);
        $user = auth()->user();

        if ($user->role !== 'professional' || $booking->service->professional_id !== $user->id) {
            abort(403, 'Unauthorized');
        }

        $booking->update(['status' => 'completed']);
        return redirect()->route('dashboard.professional')->with('success', 'Booking marked as completed.');
    }

    /**
     * Display a specific booking (optional).
     */
    public function show(string $id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing a booking (optional).
     */
    public function edit(string $id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.edit', compact('booking'));
    }

    /**
     * Update a booking (optional).
     */
    public function update(Request $request, string $id)
    {
        $booking = Booking::findOrFail($id);
        // Optional update logic
    }

    /**
     * Delete a booking (optional).
     */
    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->back()->with('success', 'Booking deleted.');
    }
}
