<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use App\Models\User;
use Illuminate\Http\Request;

class ProfessionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $specialties = [
            'all' => 'All Specialties',
            'plumbing' => 'Plumbing',
            'electrical' => 'Electrical',
            'cleaning' => 'Cleaning',
            'carpentry' => 'Carpentry',
            'painting' => 'Painting',
            'gardening' => 'Gardening'
        ];

        $professionals = $this->mockProfessionals();

        // Filtering logic
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
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        return view('professionals.index', compact(
            'filteredProfessionals', 
            'specialties',
            'locations',
            'days',
            'request'
        ));
    }
    private function mockProfessionals()
    {
        return [
            [
                'id' => 1,
                'name' => 'Alex Johnson',
                'specialty' => 'Plumbing',
                'rating' => 4.9,
                'reviews' => 127,
                'city' => 'New York',
                'experience' => '8 years',
                'availability' => ['Monday', 'Tuesday', 'Thursday', 'Friday'],
                'image' => 'https://randomuser.me/api/portraits/men/32.jpg',
                'description' => 'Licensed plumber with 8 years of experience in residential and commercial plumbing.',
                'services' => [
                    ['name' => 'Pipe Repair', 'price' => 75],
                    ['name' => 'Faucet Installation', 'price' => 120],
                    ['name' => 'Drain Cleaning', 'price' => 90]
                ],
                'sample_photos' => [
                    'https://images.unsplash.com/photo-1600566752355-35792bedcfe3',
                    'https://images.unsplash.com/photo-1605087880595-8cc5db02f3ed'
                ],
                'reviews_data' => [
                    [
                        'user' => 'John D.',
                        'rating' => 5,
                        'comment' => 'Fixed my leaky pipes quickly and professionally!',
                        'date' => '2 weeks ago'
                    ],
                    [
                        'user' => 'Sarah M.',
                        'rating' => 4,
                        'comment' => 'Great service but a bit pricey',
                        'date' => '1 month ago'
                    ]
                ]
            ],
            [
                'id' => 2,
                'name' => 'Maria Garcia',
                'specialty' => 'Electrical',
                'rating' => 4.8,
                'reviews' => 94,
                'city' => 'Chicago',
                'experience' => '6 years',
                'availability' => ['Monday', 'Wednesday', 'Saturday'],
                'image' => 'https://randomuser.me/api/portraits/women/44.jpg',
                'description' => 'Certified electrician specializing in home electrical systems and repairs.',
                'services' => [
                    ['name' => 'Outlet Installation', 'price' => 85],
                    ['name' => 'Light Fixture Installation', 'price' => 75],
                    ['name' => 'Circuit Breaker Repair', 'price' => 120]
                ],
                'sample_photos' => [
                    'https://images.unsplash.com/photo-1581093450021-4a7360e9a6a1',
                    'https://images.unsplash.com/photo-1581094794329-c8112a89af12'
                ],
                'reviews_data' => [
                    [
                        'user' => 'Mike T.',
                        'rating' => 5,
                        'comment' => 'Fixed my wiring issues perfectly!',
                        'date' => '3 weeks ago'
                    ]
                ]
            ],
            // Add more professionals as needed
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
public function show($id)
{
   
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
