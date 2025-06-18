@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            @if($type === 'client')
                @include('auth.register-client')
            @else
                @include('auth.register-professional')
            @endif
        </div>
    </div>
</div>
@endsection