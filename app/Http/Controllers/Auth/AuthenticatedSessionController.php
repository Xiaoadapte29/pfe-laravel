<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
   public function store(LoginRequest $request): \Illuminate\Http\RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();

    $user = Auth::user();

    // Optional: block unverified users
    // if (! $user->is_verified) {
    //     Auth::logout();
    //     return back()->withErrors(['email' => 'Votre compte n\'est pas encore vérifié.']);
    // }

    if ($user->role === 'client') {
        return redirect()->route('home'); // goes to "/"
    }
if ($user->role === 'admin') {
    return redirect()->route('admin.dashboard');
}

    if ($user->role === 'professional') {
        return redirect()->route('professionals.dashboard'); // goes to "/dashboard/professional"
    }

    // fallback (for admin or unknown role)
    return redirect('/');
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    
}
