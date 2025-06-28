<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $categories = [
            ['id' => 'all', 'name' => 'Toutes les catégories'],
            ['id' => 'plomberie', 'name' => 'Plomberie'],
            ['id' => 'électricité', 'name' => 'Électricité'],
            ['id' => 'nettoyage', 'name' => 'Nettoyage'],
            ['id' => 'menuiserie', 'name' => 'Menuiserie'],
            ['id' => 'peinture', 'name' => 'Peinture'],
            ['id' => 'jardinage', 'name' => 'Jardinage'],
            ['id' => 'déménagement', 'name' => 'Déménagement'],
            ['id' => 'sécurité', 'name' => 'Sécurité'],
          
        ];

        $services = [
            [
                'id' => 1,
                'name' => 'Réparation de robinet qui fuit',
                'category' => 'plomberie',
                'price' => 500,
                'duration' => 60,
                'rating' => 4.8,
                'reviews' => 124,
                'professional' => 'Ahmed El Mansouri',
                'city' => 'Casablanca',
                'professionalImage' => 'https://randomuser.me/api/portraits/men/32.jpg',
                'isPopular' => true,
            ],
            [
                'id' => 2,
                'name' => 'Installation de ventilateur de plafond',
                'category' => 'électricité',
                'price' => 850,
                'duration' => 90,
                'rating' => 4.7,
                'reviews' => 98,
                'professional' => 'Fatima Zahra',
                'city' => 'Rabat',
                'professionalImage' => 'https://randomuser.me/api/portraits/women/44.jpg',
                'isPopular' => true,
            ],
            [
                'id' => 3,
                'name' => 'Nettoyage en profondeur de maison',
                'category' => 'nettoyage',
                'price' => 1200,
                'duration' => 180,
                'rating' => 4.9,
                'reviews' => 156,
                'professional' => 'Sara Idrissi',
                'city' => 'Marrakech',
                'professionalImage' => 'https://randomuser.me/api/portraits/women/68.jpg',
                'isPopular' => true,
            ],
            [
                'id' => 4,
                'name' => 'Fabrication d’étagères sur mesure',
                'category' => 'menuiserie',
                'price' => 2000,
                'duration' => 240,
                'rating' => 4.7,
                'reviews' => 72,
                'professional' => 'Youssef Ben Ali',
                'city' => 'Fès',
                'professionalImage' => 'https://randomuser.me/api/portraits/men/75.jpg',
                'isPopular' => false,
            ],
            [
                'id' => 5,
                'name' => 'Peinture intérieure des murs',
                'category' => 'peinture',
                'price' => 2500,
                'duration' => 300,
                'rating' => 4.8,
                'reviews' => 84,
                'professional' => 'Khadija Ouazzani',
                'city' => 'Tanger',
                'professionalImage' => 'https://randomuser.me/api/portraits/women/22.jpg',
                'isPopular' => false,
            ],
            [
                'id' => 6,
                'name' => 'Aménagement paysager de jardin',
                'category' => 'jardinage',
                'price' => 1500,
                'duration' => 180,
                'rating' => 4.6,
                'reviews' => 58,
                'professional' => 'Mohamed El Fassi',
                'city' => 'Agadir',
                'professionalImage' => 'https://randomuser.me/api/portraits/men/33.jpg',
                'isPopular' => false,
            ],
            [
                'id' => 7,
                'name' => 'Assemblage de meubles',
                'category' => 'déménagement',
                'price' => 750,
                'duration' => 120,
                'rating' => 4.5,
                'reviews' => 42,
                'professional' => 'Youssef Mansouri',
                'city' => 'Casablanca',
                'professionalImage' => 'https://randomuser.me/api/portraits/men/41.jpg',
                'isPopular' => false,
            ],
            [
                'id' => 8,
                'name' => 'Installation de caméras de sécurité',
                'category' => 'sécurité',
                'price' => 1750,
                'duration' => 150,
                'rating' => 4.7,
                'reviews' => 63,
                'professional' => 'Najat El Idrissi',
                'city' => 'Rabat',
                'professionalImage' => 'https://randomuser.me/api/portraits/women/25.jpg',
                'isPopular' => true,
            ],
            [
                'id' => 9,
                'name' => 'Installation de climatiseur',
                'category' => 'chauffage',
                'price' => 1800,
                'duration' => 120,
                'rating' => 4.9,
                'reviews' => 110,
                'professional' => 'Rachid Bennis',
                'city' => 'Casablanca',
                'professionalImage' => 'https://randomuser.me/api/portraits/men/52.jpg',
                'isPopular' => true,
            ],
            [
                'id' => 10,
                'name' => 'Réparation électroménager',
                'category' => 'électricité',
                'price' => 700,
                'duration' => 90,
                'rating' => 4.4,
                'reviews' => 80,
                'professional' => 'Samira Lahlou',
                'city' => 'Marrakech',
                'professionalImage' => 'https://randomuser.me/api/portraits/women/56.jpg',
                'isPopular' => false,
            ],
            // Nouveaux services ajoutés
            [
                'id' => 11,
                'name' => 'Pose de carrelage professionnel',
                'category' => 'menuiserie',
                'price' => 2200,
                'duration' => 240,
                'rating' => 4.8,
                'reviews' => 95,
                'professional' => 'Mustapha El Ghazali',
                'city' => 'Fès',
                'professionalImage' => 'https://randomuser.me/api/portraits/men/48.jpg',
                'isPopular' => true,
            ],
            [
                'id' => 12,
                'name' => 'Désherbage et entretien du jardin',
                'category' => 'jardinage',
                'price' => 1300,
                'duration' => 180,
                'rating' => 4.5,
                'reviews' => 60,
                'professional' => 'Leila Chraibi',
                'city' => 'Tanger',
                'professionalImage' => 'https://randomuser.me/api/portraits/women/38.jpg',
                'isPopular' => false,
            ],
            [
                'id' => 13,
                'name' => 'Nettoyage de vitres',
                'category' => 'nettoyage',
                'price' => 900,
                'duration' => 90,
                'rating' => 4.6,
                'reviews' => 70,
                'professional' => 'Hassan Benjelloun',
                'city' => 'Rabat',
                'professionalImage' => 'https://randomuser.me/api/portraits/men/59.jpg',
                'isPopular' => true,
            ],
            [
                'id' => 14,
                'name' => 'Réparation serrure de porte',
                'category' => 'sécurité',
                'price' => 650,
                'duration' => 60,
                'rating' => 4.3,
                'reviews' => 45,
                'professional' => 'Noureddine Ouhammou',
                'city' => 'Casablanca',
                'professionalImage' => 'https://randomuser.me/api/portraits/men/61.jpg',
                'isPopular' => false,
            ],
            [
                'id' => 15,
                'name' => 'Installation réseau informatique',
                'category' => 'informatique',
                'price' => 1200,
                'duration' => 90,
                'rating' => 4.9,
                'reviews' => 130,
                'professional' => 'Yassine Bouzidi',
                'city' => 'Casablanca',
                'professionalImage' => 'https://randomuser.me/api/portraits/men/70.jpg',
                'isPopular' => true,
            ],
            [
                'id' => 16,
                'name' => 'Réparation d’ordinateur à domicile',
                'category' => 'informatique',
                'price' => 900,
                'duration' => 60,
                'rating' => 4.6,
                'reviews' => 75,
                'professional' => 'Nadia Ait Ali',
                'city' => 'Rabat',
                'professionalImage' => 'https://randomuser.me/api/portraits/women/71.jpg',
                'isPopular' => false,
            ],
            [
                'id' => 17,
                'name' => 'Installation de chauffage central',
                'category' => 'chauffage',
                'price' => 3500,
                'duration' => 360,
                'rating' => 4.8,
                'reviews' => 85,
                'professional' => 'Abdelaziz El Amrani',
                'city' => 'Marrakech',
                'professionalImage' => 'https://randomuser.me/api/portraits/men/72.jpg',
                'isPopular' => true,
            ],
            [
                'id' => 18,
                'name' => 'Réparation système d’alarme',
                'category' => 'sécurité',
                'price' => 1100,
                'duration' => 120,
                'rating' => 4.4,
                'reviews' => 50,
                'professional' => 'Imane Zohra',
                'city' => 'Tanger',
                'professionalImage' => 'https://randomuser.me/api/portraits/women/73.jpg',
                'isPopular' => false,
            ],
            [
                'id' => 19,
                'name' => 'Service de déménagement complet',
                'category' => 'déménagement',
                'price' => 3000,
                'duration' => 480,
                'rating' => 4.7,
                'reviews' => 68,
                'professional' => 'Karim Fassi',
                'city' => 'Casablanca',
                'professionalImage' => 'https://randomuser.me/api/portraits/men/74.jpg',
                'isPopular' => true,
            ],
            [
                'id' => 20,
                'name' => 'Installation de système domotique',
                'category' => 'électricité',
                'price' => 2800,
                'duration' => 240,
                'rating' => 4.9,
                'reviews' => 112,
                'professional' => 'Sofia El Idrissi',
                'city' => 'Rabat',
                'professionalImage' => 'https://randomuser.me/api/portraits/women/75.jpg',
                'isPopular' => true,
            ],
        ];

        $filteredServices = collect($services)
            ->when($request->category && $request->category !== 'all', function($collection) use ($request) {
                return $collection->where('category', $request->category);
            })
            ->when($request->search, function($collection) use ($request) {
                return $collection->filter(function($service) use ($request) {
                    return stripos($service['name'], $request->search) !== false;
                });
            })
            ->when($request->min_price || $request->max_price, function($collection) use ($request) {
                $min = $request->min_price ?? 0;
                $max = $request->max_price ?? 10000;
                return $collection->whereBetween('price', [$min, $max]);
            })
            ->when($request->ratings, function($collection) use ($request) {
                return $collection->filter(function($service) use ($request) {
                    return in_array(floor($service['rating']), $request->ratings);
                });
            })
            ->when($request->cities, function($collection) use ($request) {
                return $collection->whereIn('city', $request->cities);
            })
            ->values();

        $cities = collect($services)->pluck('city')->unique()->values();

        return view('services.index', compact('filteredServices', 'cities', 'categories', 'request'));
    }
public function create()
{
    $categories = ServiceCategory::all();
    return view('services.create', compact('categories'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'duration' => 'required|integer',
        'category_id' => 'required|exists:service_categories,id',
    ]);

    $validated['professional_id'] = auth()->id(); // attach logged-in pro
    $validated['is_available'] = true;

    Service::create($validated);

    return redirect()->route('dashboard.professional')->with('success', 'Service ajouté avec succès.');
}
}
