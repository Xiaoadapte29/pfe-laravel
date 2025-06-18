<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Professional;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     */
    public function create(): View
    {
        $type = request()->query('type', 'client');
        return view('auth.register', ['type' => $type]);
    }

    /**
     * Gère l'inscription des professionnels.
     */

    public function store(Request $request)
    {
        $type = $request->input('type', 'client');

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', Password::defaults()],
        ];

        if ($type === 'professional') {
            $rules = array_merge($rules, [
                'phone' => 'required|string|max:20',
                'cin' => 'required|string|max:50',
                'city' => 'required|string|max:100',
                'specialization' => 'required|string|max:100',
                'years_experience' => 'required|integer|min:0',
                'profile_photo' => 'nullable|image|max:2048',
                'certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
            ]);
        } else {
            $rules = array_merge($rules, [
                'phone' => 'required|string|max:20',
            ]);
        }

        $validated = $request->validate($rules);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'role' => $type,
            'password' => Hash::make($validated['password']),
            'is_verified' => false,
        ]);

        if ($type === 'professional') {
            $profilePhotoPath = $request->file('profile_photo') ? $request->file('profile_photo')->store('profile_photos', 'public') : null;
            $certificatePath = $request->file('certificate') ? $request->file('certificate')->store('certificates', 'public') : null;

            Professional::create([
                'user_id' => $user->id,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'cin' => $validated['cin'],
                'city' => $validated['city'],
                'specialty' => $validated['specialization'],
                'years_experience' => $validated['years_experience'],
                'profile_photo_path' => $profilePhotoPath,
                'certifications' => $certificatePath,
                // ne pas passer 'password' ici
            ]);
        }

        event(new Registered($user));
        Auth::login($user);

        if ($type === 'professional') {
            return redirect()->route('professionals.dashboard')->with('success', 'Inscription professionnelle réussie !');
        }

        return redirect()->route('professionals.dashboard')->with('success', 'Inscription réussie !');
    }




    /**
     * Gère l'inscription des clients.
     */
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
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => 'client',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('home');
    }

    /**
     * (Optionnel) Validation dynamique par rôle.
     */
    protected function getValidationRules($type)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ];

        if ($type === 'professional') {
            $rules += [
                'phone' => 'required|string|max:20',
                'cin' => 'required|string|max:50',
                'city' => 'required|string|max:100',
                'specialization' => 'required|string|max:100',
                'profile_photo' => 'nullable|image|max:2048',
                'certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
            ];
        } else {
            $rules += [
                'address' => 'required|string|max:255',
            ];
        }

        return $rules;
    }

    /**
     * (Optionnel) Prépare les données utilisateur.
     */
    protected function getUserData(Request $request): array
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->type,
            'phone' => $request->phone ?? null,
            'city' => $request->city ?? null,
            'cin' => $request->cin ?? null,
            'is_verified' => false,
            'password' => Hash::make($request->password),
        ];
    }

    /**
     * (Optionnel) Prépare les données supplémentaires pour un professionnel.
     */
    protected function getProfessionalData(Request $request, $userId): array
    {
        return [
            'user_id' => $userId,
            'name' => $request->name,
            'email' => $request->email,
            'city' => $request->city,
            'specialite' => $request->specialization,
            'cin' => $request->cin,
            'diplome' => $request->hasFile('certificate') ? $request->file('certificate')->store('certificates', 'public') : null,
            'photo' => $request->hasFile('profile_photo') ? $request->file('profile_photo')->store('profile_photos', 'public') : null,
        ];
    }
}
