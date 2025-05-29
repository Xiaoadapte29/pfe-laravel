@extends('layouts.app')
@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-4">Book Service: {{ $service->name }}</h2>
    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <input type="hidden" name="service_id" value="{{ $service->id }}">

        <div class="mb-4">
            <label class="block mb-1 font-medium">Date & Time</label>
            <input type="datetime-local" name="scheduled_at" required class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Additional Notes</label>
            <textarea name="notes" class="w-full border rounded p-2"></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Confirm Booking
        </button>
    </form>
</div>
@endsection
