<?php

namespace App\Http\Controllers;

use App\Mail\BookingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        $bookingId = strtoupper(Str::random(8));

        // Pastikan folder ada
        if (!Storage::exists('public/qrcodes')) {
            Storage::makeDirectory('public/qrcodes');
        }

        // Generate QR Code dan simpan sebagai file PNG
        $qrCodePath = 'public/qrcodes/' . $bookingId . '.png';
        QrCode::format('png')->size(300)->generate('Booking ID: ' . $bookingId, storage_path('app/' . $qrCodePath));

        // Periksa apakah file QR Code ada sebelum mengubahnya menjadi base64
        if (Storage::exists($qrCodePath)) {
            $qrCodeBase64 = 'data:image/png;base64,' . base64_encode(Storage::get($qrCodePath));
        } else {
            dd('QR code tidak ditemukan!');
        }
        Mail::to($recipientEmail)->send(new BookingMail($bookingId, $qrCodeBase64));

        return redirect()->route('booking.form')->with('success', "Email sent successfully to $recipientEmail with Booking Code: $bookingId");
    }
}