@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Réserver un service</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf

        {{-- If a service is already selected (from search) --}}
        @if(isset($service))
            <div class="mb-3">
                <label for="service_id" class="form-label">Service sélectionné</label>
                <input type="text" class="form-control" value="{{ $service->name }}" disabled>
                <input type="hidden" name="service_id" value="{{ $service->id }}">
            </div>
        @else
            <div class="mb-3">
                <label for="service_id" class="form-label">Choisir un service</label>
                <select name="service_id" id="service_id" class="form-select" required>
                    <option value="">-- Sélectionner un service --</option>
                    @foreach(App\Models\Service::where('is_available', true)->get() as $srv)
                        <option value="{{ $srv->id }}">{{ $srv->name }} ({{ $srv->price }} MAD)</option>
                    @endforeach
                </select>
            </div>
        @endif

        <div class="mb-3">
            <label for="scheduled_at" class="form-label">Date et heure souhaitées</label>
            <input type="datetime-local" name="scheduled_at" id="scheduled_at" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Notes supplémentaires (optionnel)</label>
            <textarea name="notes" id="notes" rows="3" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Confirmer la réservation</button>
    </form>
</div>
@endsection
