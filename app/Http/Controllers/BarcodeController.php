<?php

namespace App\Http\Controllers;

use App\Models\barcode;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarcodeController extends Controller
{
    public function home()
    {
        return view('staff');
    }
    public function validateBarcode(Request $request)
    {
        $request->validate([
            'barcode' => 'required|string'
        ]);

        $barcode = $request->input('barcode');
        $product = barcode::where('bookId', $barcode)->first();
        if ($product) {
            return redirect()->back()->with('success', 'Barcode valid! Product: ' . $product->barcode);
        } else {
            return redirect()->back()->with('error', 'Invalid barcode!');
        }
    }
}