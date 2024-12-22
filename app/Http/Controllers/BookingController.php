<?php

namespace App\Http\Controllers;

use App\Mail\BookingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function showForm()
    {
        return view('booking-form');
    }

    // Mengirim email
    public function sendBookingEmail(Request $request)
    {
        // Validasi input email
        $request->validate([
            'email' => 'required|email',
        ]);

        $recipientEmail = $request->input('email');
        $bookingId = strtoupper(Str::random(8)); // Generate booking code random 8 karakter

        // Kirim email menggunakan Mailable
        Mail::to($recipientEmail)->send(new BookingMail($bookingId));

        // Redirect dengan pesan sukses
        return redirect()->route('booking.form')->with('success', "Email sent successfully to $recipientEmail with Booking Code: $bookingId");
    }
}