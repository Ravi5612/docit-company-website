<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
class ServiceController extends Controller
{
    public function index()
    {
        $Services = Service::latest()->get();
        return view('admin.views.admin-service', compact('Services'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:service',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:5048',
            'image_2' => 'required|image|mimes:png,jpg,jpeg,webp|max:5048',
            'description' => 'required|string',
            'overview' => 'required|string',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = null;
        $imagePath_2 = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Service-images', 'public');
        }
        if ($request->hasFile('image_2')) {
            $imagePath_2 = $request->file('image_2')->store('Service-images', 'public');
        }



        Service::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'image' => $imagePath,
            'image_2' => $imagePath_2,
            'description' => $request->description,
            'overview' => $request->overview,
            'status' => $request->status
        ]);

        return back()->with('success', 'Service added successfully!');
    }
    public function update(Request $request, Service $Service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:service,slug,' . $Service->id,
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5048',
            'image_2' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5048',
            'description' => 'required|string',
            'overview' => 'required|string',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = $Service->image;
        $imagePath_2 = $Service->image_2;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('Service-images', 'public');
        }
        if ($request->hasFile('image_2')) {
            $imagePath_2 = $request->file('image_2')->store('Service-images', 'public');
        }



        $Service->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'image' => $imagePath,
            'image_2' => $imagePath_2,
            'description' => $request->description,
            'overview' => $request->overview,
            'status' => $request->status
        ]);

        return back()->with('success', 'Service updated successfully!');
    }
    public function destroy(Service $Service)
    {
        if ($Service->image) {
            Storage::disk('public')->delete($Service->image);
        }

        if ($Service->image_2) {
            Storage::disk('public')->delete($Service->image_2);
        }


        $Service->delete();

        return back()->with('success', 'Service deleted successfully!');
    }
}
