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
$categories = ServiceCategory::with('services')->get();

    // $professionals = User::where('role', 'professional')
    //   ->where('is_verified', true)
    //   ->take(6)
    //   ->get();

    // // Get latest 6 reviews with related client info
    // $testimonials = Review::with(['booking' => function ($q) {
    //   $q->select('id', 'client_id');
    //   $q->with(['client:id,name']);
    // }])->select('id', 'rating', 'comment', 'booking_id')
    //   ->latest()
    //   ->take(6)
    //   ->get();


    return view('home', compact('categories'));
  }
}
