<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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

$service = Service::with('professional')->findOrFail($serviceId);
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
$service = Service::with('professional')->findOrFail($serviceId);
        
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
        'notes' => 'nullable|string',
    ]);

    $scheduledAt = $validated['date'] . ' ' . $validated['time'];

    $service = \App\Models\Service::findOrFail($validated['service_id']);
    $endTime = \Carbon\Carbon::parse($scheduledAt)->addMinutes($service->duration);

    $booking = \App\Models\Booking::create([
        'service_id' => $validated['service_id'],
        'client_id' => Auth::id(), // ✅ this line fixes the error
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'address' => $validated['address'],
        'notes' => $validated['notes'],
        'scheduled_at' => $scheduledAt,
        'scheduled_end_time' => $endTime,
        'status' => 'pending',
    ]);

    return redirect()->route('bookings.index', ['service_id' => $booking->service_id])
        ->with('success', 'Booking created successfully!');
}

    /**
     * Accept or refuse a booking (by professional).
     */
public function acceptRefuse(Booking $booking, string $action)
{
    $user = auth()->user();

    // Check the user is a professional and owns the booking via service
    if ($user->role !== 'professional' || $booking->service->professional_id !== $user->id) {
        abort(403, 'Unauthorized action');
    }

    if ($action === 'accept') {
        $booking->status = 'accepted';  // <-- this status must be allowed in DB enum/string
        $booking->save();

        return redirect()->route('professionals.dashboard')
                         ->with('success', 'Booking accepted successfully!');
    }

    if ($action === 'refuse') {
        // Your refusal logic here
    }

    return redirect()->back()->with('error', 'Invalid action.');
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

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string',
        'date' => 'required|date',
        'time' => 'required',
        'notes' => 'nullable|string',
    ]);

    // Merge date and time
    $scheduledAt = $validated['date'] . ' ' . $validated['time'];

    // Calculate new end time based on service duration
    $service = $booking->service; // Assuming relation exists: $booking->service
    $scheduledEndTime = \Carbon\Carbon::parse($scheduledAt)->addMinutes($service->duration ?? 60); // Default 60 mins

    $booking->update([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'address' => $validated['address'] ?? '',
        'notes' => $validated['notes'] ?? '',
        'scheduled_at' => $scheduledAt,
        'scheduled_end_time' => $scheduledEndTime,
    ]);

    return redirect()->route('bookings.index', ['service_id' => $booking->service_id])
                     ->with('success', 'Booking updated successfully!');
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
