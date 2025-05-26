<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Professional;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $type = request()->query('type', 'client');
    return view('auth.register', ['type' => $type]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->getValidationRules($request->type));

    $user = User::create($this->getUserData($request));

    if ($request->type === 'professional') {
        Professional::create($this->getProfessionalData($request, $user->id));
    }

    event(new Registered($user));
    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
    }


     public function storeClient(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'terms' => 'accepted',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'client',
        ]);

        event(new Registered($user));
        Auth::login($user);

        // Direct redirect to client dashboard
        return redirect()->route('dashboard.client');
    }
    protected function getValidationRules($type)
{
    $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:8',
    ];

    if ($type === 'professional') {
        $rules += [
            'phone' => 'required|string|max:20',
            'cin' => 'required|string|max:50',
            'city' => 'required|string|max:100',
            'specialization' => 'required|string|max:100',
            'profile_photo' => 'required|image|max:2048',
            'certificate' => 'nullable|file|max:5120',
        ];
    } else {
        $rules += [
            'address' => 'required|string|max:255',
        ];
    }

    return $rules;
}
}
