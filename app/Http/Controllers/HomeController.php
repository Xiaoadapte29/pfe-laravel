<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ServiceCategory;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
 public function index()
{
    $categories = ServiceCategory::with(['services' => function ($query) {
        $query->with('professional')->take(5); // charge 5 services avec leurs pros
    }])->take(6)->get(); // charge 6 catégories max
    //dd($categories);
    return view('home', compact('categories'));
}

}