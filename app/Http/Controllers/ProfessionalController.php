<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use App\Models\User;
use Illuminate\Http\Request;

class ProfessionalController extends Controller
{
    /**
     * Affiche la liste des professionnels avec filtres.
     */
    public function index(Request $request)
    {
        $specialties = [
            'all' => 'Toutes les spécialités',
            'plumbing' => 'Plomberie',
            'electrical' => 'Électricité',
            'cleaning' => 'Nettoyage',
            'carpentry' => 'Menuiserie',
            'painting' => 'Peinture',
            'gardening' => 'Jardinage'
        ];

        $professionals = $this->mockProfessionals();

        $filteredProfessionals = collect($professionals)
            ->when($request->specialty && $request->specialty !== 'all', function($collection) use ($request) {
                return $collection->where('specialty', $request->specialty);
            })
            ->when($request->search, function($collection) use ($request) {
                return $collection->filter(function($professional) use ($request) {
                    return stripos($professional['name'], $request->search) !== false || 
                           stripos($professional['specialty'], $request->search) !== false;
                });
            })
            ->when($request->rating, function($collection) use ($request) {
                return $collection->where('rating', '>=', $request->rating);
            })
            ->when($request->location, function($collection) use ($request) {
                return $collection->where('city', $request->location);
            })
            ->when($request->availability, function($collection) use ($request) {
                return $collection->filter(function($professional) use ($request) {
                    return array_intersect($request->availability, $professional['availability']);
                });
            })
            ->values();

        $locations = collect($professionals)->pluck('city')->unique()->values();
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

        return view('professionals.index', compact(
            'filteredProfessionals', 
            'specialties',
            'locations',
            'days',
            'request'
        ));
    }

    /**
     * Données factices de professionnels (pour le Maroc).
     */
    private function mockProfessionals()
    {
        return [
            [
                'id' => 1,
                'name' => 'Yassine El Amrani',
                'specialty' => 'Plomberie',
                'rating' => 4.9,
                'reviews' => 127,
                'city' => 'Casablanca',
                'experience' => '8 ans',
                'availability' => ['Lundi', 'Mardi', 'Jeudi', 'Vendredi'],
                'image' => 'https://randomuser.me/api/portraits/men/32.jpg',
                'description' => 'Plombier certifié avec 8 ans d\'expérience en plomberie résidentielle et commerciale.',
                'services' => [
                    ['name' => 'Réparation de tuyaux', 'price' => 300],
                    ['name' => 'Installation de robinets', 'price' => 500],
                    ['name' => 'Débouchage', 'price' => 400]
                ],
                'sample_photos' => [
                    'https://images.unsplash.com/photo-1600566752355-35792bedcfe3',
                    'https://images.unsplash.com/photo-1605087880595-8cc5db02f3ed'
                ],
                'reviews_data' => [
                    [
                        'user' => 'Karim B.',
                        'rating' => 5,
                        'comment' => 'Service rapide et très professionnel.',
                        'date' => 'Il y a 2 semaines'
                    ],
                    [
                        'user' => 'Fatima Z.',
                        'rating' => 4,
                        'comment' => 'Bon travail mais un peu cher.',
                        'date' => 'Il y a 1 mois'
                    ]
                ]
            ],
            [
                'id' => 2,
                'name' => 'Sara Benjelloun',
                'specialty' => 'Électricité',
                'rating' => 4.8,
                'reviews' => 94,
                'city' => 'Rabat',
                'experience' => '6 ans',
                'availability' => ['Lundi', 'Mercredi', 'Samedi'],
                'image' => 'https://randomuser.me/api/portraits/women/44.jpg',
                'description' => 'Électricienne expérimentée spécialisée dans les installations domestiques.',
                'services' => [
                    ['name' => 'Installation de prises', 'price' => 250],
                    ['name' => 'Installation d\'éclairage', 'price' => 300],
                    ['name' => 'Réparation de disjoncteur', 'price' => 400]
                ],
                'sample_photos' => [
                    'https://images.unsplash.com/photo-1581093450021-4a7360e9a6a1',
                    'https://images.unsplash.com/photo-1581094794329-c8112a89af12'
                ],
                'reviews_data' => [
                    [
                        'user' => 'Omar T.',
                        'rating' => 5,
                        'comment' => 'Très professionnelle et efficace.',
                        'date' => 'Il y a 3 semaines'
                    ]
                ]
            ]
        ];
    }

    public function create()
    {
        // À implémenter
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'cin' => 'required',
            'profile_photo' => 'required|image',
            'email' => 'required|email|max:255|unique:users',
            'city' => 'required',
            'specialty' => 'required',
            'password' => 'required|confirmed',
        ]);

        $professional = new \App\Models\Professional();
        $professional->fill($validated);
        $professional->password = bcrypt($request->password);
        $professional->save();

        return redirect()->route('professionals.dashboard');
    }

    public function show($id)
    {
        // À implémenter
    }

    public function edit(string $id)
    {
        // À implémenter
    }

    public function update(Request $request, string $id)
    {
        // À implémenter
    }

    public function destroy(string $id)
    {
        // À implémenter
    }
    
}
