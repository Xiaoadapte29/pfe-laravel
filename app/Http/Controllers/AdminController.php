<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Professional;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get unverified professionals
        $pendingProfessionals = Professional::where('is_verified', false)->get();

        // Optionally get counts
        $totalProfessionals = Professional::count();
        $verifiedProfessionals = Professional::where('is_verified', true)->count();

        return view('admin.dashboard', compact('pendingProfessionals', 'totalProfessionals', 'verifiedProfessionals'));
    }

    public function verifyProfessional(Request $request, $id)
    {
        $professional = Professional::findOrFail($id);
        $professional->is_verified = true;
        $professional->save();

        return redirect()->back()->with('success', 'Professional verified successfully!');
    }

    public function rejectProfessional(Request $request, $id)
    {
        $professional = Professional::findOrFail($id);
        // You can delete or set a rejected flag here
        $professional->delete();

        return redirect()->back()->with('success', 'Professional rejected and removed.');
    }
}
