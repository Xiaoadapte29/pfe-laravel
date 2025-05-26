<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
    {
        // Define categories
        $categories = [
            ['id' => 'all', 'name' => 'All Categories'],
            ['id' => 'plumbing', 'name' => 'Plumbing'],
            ['id' => 'electrical', 'name' => 'Electrical'],
            ['id' => 'cleaning', 'name' => 'Cleaning'],
            ['id' => 'carpentry', 'name' => 'Carpentry'],
            ['id' => 'painting', 'name' => 'Painting'],
            ['id' => 'gardening', 'name' => 'Gardening'],
            ['id' => 'moving', 'name' => 'Moving'],
            ['id' => 'security', 'name' => 'Security'],
        ];

        $services = [
            [
                'id' => 1,
                'name' => 'Leaky Faucet Repair',
                'category' => 'plumbing',
                'price' => 50,
                'duration' => 60,
                'rating' => 4.8,
                'reviews' => 124,
                'professional' => 'Alex Johnson',
                'city' => 'New York',
                'professionalImage' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a',
                'isPopular' => true,
            ],
[
            'id' => 1,
            'name' => 'Leaky Faucet Repair',
            'category' => 'plumbing',
            'price' => 50,
            'duration' => 60,
            'rating' => 4.8,
            'reviews' => 124,
            'professional' => 'Alex Johnson',
            'city' => 'New York',
            'professionalImage' => 'https://randomuser.me/api/portraits/men/32.jpg',
            'isPopular' => true,
        ],
        [
            'id' => 2,
            'name' => 'Ceiling Fan Installation',
            'category' => 'electrical',
            'price' => 85,
            'duration' => 90,
            'rating' => 4.7,
            'reviews' => 98,
            'professional' => 'Maria Garcia',
            'city' => 'Chicago',
            'professionalImage' => 'https://randomuser.me/api/portraits/women/44.jpg',
            'isPopular' => true,
        ],
        [
            'id' => 3,
            'name' => 'Deep House Cleaning',
            'category' => 'cleaning',
            'price' => 120,
            'duration' => 180,
            'rating' => 4.9,
            'reviews' => 156,
            'professional' => 'Sarah Wilson',
            'city' => 'Boston',
            'professionalImage' => 'https://randomuser.me/api/portraits/women/68.jpg',
            'isPopular' => true,
        ],
        [
            'id' => 4,
            'name' => 'Custom Shelving',
            'category' => 'carpentry',
            'price' => 200,
            'duration' => 240,
            'rating' => 4.7,
            'reviews' => 72,
            'professional' => 'David Smith',
            'city' => 'Los Angeles',
            'professionalImage' => 'https://randomuser.me/api/portraits/men/75.jpg',
            'isPopular' => false,
        ],
        [
            'id' => 5,
            'name' => 'Interior Wall Painting',
            'category' => 'painting',
            'price' => 250,
            'duration' => 300,
            'rating' => 4.8,
            'reviews' => 84,
            'professional' => 'James Brown',
            'city' => 'Houston',
            'professionalImage' => 'https://randomuser.me/api/portraits/men/22.jpg',
            'isPopular' => false,
        ],
        [
            'id' => 6,
            'name' => 'Garden Landscaping',
            'category' => 'gardening',
            'price' => 150,
            'duration' => 180,
            'rating' => 4.6,
            'reviews' => 58,
            'professional' => 'Emma Davis',
            'city' => 'Miami',
            'professionalImage' => 'https://randomuser.me/api/portraits/women/33.jpg',
            'isPopular' => false,
        ],
        [
            'id' => 7,
            'name' => 'Furniture Assembly',
            'category' => 'moving',
            'price' => 75,
            'duration' => 120,
            'rating' => 4.5,
            'reviews' => 42,
            'professional' => 'Michael Wilson',
            'city' => 'Seattle',
            'professionalImage' => 'https://randomuser.me/api/portraits/men/41.jpg',
            'isPopular' => false,
        ],
        [
            'id' => 8,
            'name' => 'Security Camera Installation',
            'category' => 'security',
            'price' => 175,
            'duration' => 150,
            'rating' => 4.7,
            'reviews' => 63,
            'professional' => 'Olivia Martinez',
            'city' => 'Denver',
            'professionalImage' => 'https://randomuser.me/api/portraits/women/25.jpg',
            'isPopular' => true,
        ],
        [
            'id' => 9,
            'name' => 'Appliance Repair',
            'category' => 'electrical',
            'price' => 95,
            'duration' => 90,
            'rating' => 4.6,
            'reviews' => 87,
            'professional' => 'Robert Taylor',
            'city' => 'Phoenix',
            'professionalImage' => 'https://randomuser.me/api/portraits/men/55.jpg',
            'isPopular' => false,
        ],
        [
            'id' => 10,
            'name' => 'Window Cleaning',
            'category' => 'cleaning',
            'price' => 110,
            'duration' => 120,
            'rating' => 4.8,
            'reviews' => 76,
            'professional' => 'Sophia Anderson',
            'city' => 'Philadelphia',
            'professionalImage' => 'https://randomuser.me/api/portraits/women/51.jpg',
            'isPopular' => true,
        ]        ];

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
                $max = $request->max_price ?? 300;
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
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
            'category_id' => 'required|exists:service_categories,id',
            'professional_id' => 'required|exists:users,id',
        ]);

        Service::create($request->all());
        return redirect()->route('services.index')->with('success', 'Service created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::with('category', 'professional')->findOrFail($id);
        return view('services.show', compact('service'));
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
        $service = Service::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
            'category_id' => 'required|exists:service_categories,id',
            'professional_id' => 'required|exists:users,id',
        ]);

        $service->update($request->all());
        return redirect()->route('services.index')->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
    }

    public function search(Request $request)
{
    $query = $request->input('query');

    $services = Service::where('name', 'like', "%{$query}%")
        ->orWhere('description', 'like', "%{$query}%")
        ->get();

    return view('dashboard.client-search-results', compact('services', 'query'));
}

}
