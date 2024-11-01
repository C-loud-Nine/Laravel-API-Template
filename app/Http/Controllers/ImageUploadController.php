<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function uploadAndPredict(Request $request)
    {
        // Validate that the uploaded file is an image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Save the uploaded image temporarily in the 'public' directory
        $imagePath = $request->file('image')->store('uploads', 'public');

        // Get the image file for sending to FastAPI
        $image = $request->file('image');
        $imageData = fopen($image->getPathname(), 'r');

        // Send the image to the FastAPI endpoint
        $response = Http::attach('file', $imageData, $image->getClientOriginalName())
            ->post(env('FASTAPI_URL') . '/predict');

        if ($response->successful()) {
            // Pass the JSON response and the image path to the view
            $result = $response->json();
            $imageUrl = Storage::url($imagePath);
            return view('result', ['result' => $result, 'imageUrl' => $imageUrl]);
        } else {
            return back()->withErrors(['message' => 'Prediction failed. Try again.']);
        }
    }
}
