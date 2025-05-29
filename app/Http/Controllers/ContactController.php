<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Process the form (send email, save to database, etc.)
        // Mail::to('contact@fixhome.com')->send(new ContactFormSubmitted($validated));

        return back()->with('success', 'Message sent successfully! We\'ll get back to you soon.');
    }
}
