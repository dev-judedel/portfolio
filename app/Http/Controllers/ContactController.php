<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

class ContactController extends Controller
{
    public function index()
    {
        $contactEmail = Setting::get('contact_email');
        $contactPhone = Setting::get('contact_phone');
        $contactAddress = Setting::get('contact_address');

        return view('contact', compact('contactEmail', 'contactPhone', 'contactAddress'));
    }

    public function store(Request $request)
    {
        // Validate
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:5000',
        ]);

        // Rate limiting
        $key = 'contact-form:' . $request->ip();
        
        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            return response()->json([
                'success' => false,
                'message' => "Too many attempts. Please try again in {$seconds} seconds."
            ], 429);
        }

        RateLimiter::hit($key, 300); // 5 minutes

        // Save to database
        $contact = Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
        ]);

        // Send email notification (optional)
        try {
            $adminEmail = Setting::get('contact_email', config('mail.from.address'));
            
            Mail::raw(
                "New contact form submission:\n\n" .
                "Name: {$contact->name}\n" .
                "Email: {$contact->email}\n" .
                "Phone: {$contact->phone}\n" .
                "Subject: {$contact->subject}\n\n" .
                "Message:\n{$contact->message}",
                function ($message) use ($adminEmail, $contact) {
                    $message->to($adminEmail)
                           ->subject('New Contact Form: ' . $contact->subject)
                           ->replyTo($contact->email, $contact->name);
                }
            );
        } catch (\Exception $e) {
            // Log error but don't fail the request
            \Log::error('Failed to send contact email: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your message! I will get back to you soon.'
        ]);
    }
}
