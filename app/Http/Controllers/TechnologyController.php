<?php

namespace App\Http\Controllers;
use App\Models\Technology;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    public function index()
    {
        $technology = Technology::latest()->get();
        return view('admin.views.admin-technology', compact('technology'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:college_states',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:5048',
            'image_2' => 'required|image|mimes:png,jpg,jpeg,webp|max:5048',
            'description' => 'required|string',
            'overview' => 'required|string',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = null;
        $imagePath_2 = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('technology-images', 'public');
        }
        if ($request->hasFile('image_2')) {
            $imagePath_2 = $request->file('image_2')->store('technology-images', 'public');
        }


        Technology::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $imagePath,
            'image_2' => $imagePath_2,
            'description' => $request->description,
            'overview' => $request->overview,
            'status' => $request->status
        ]);

        return back()->with('success', 'Technology added successfully!');
    }
    public function update(Request $request, Technology $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:college_states,slug,' . $item->id,
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5048',
            'image_2' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5048',
            'description' => 'required|string',
            'overview' => 'required|string',
            'status' => 'required|in:active,inactive'

        ]);

        $imagePath = $item->image;
        $imagePath_2 = $item->image_2;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('technology-images', 'public');
        }
        if ($request->hasFile('image_2')) {
            $imagePath_2 = $request->file('image_2')->store('technology-images', 'public');
        }



        $item->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'image' => $imagePath,
            'image_2' => $imagePath_2,
            'description' => $request->description,
            'overview' => $request->overview,
            'status' => $request->status
        ]);

        return back()->with('success', 'Technology updated successfully!');
    }
    public function destroy(Technology $item)
    {
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
        if ($item->image_2) {
            Storage::disk('public')->delete($item->image_2);
        }


        $item->delete();

        return back()->with('success', 'Technology deleted successfully!');
    }
}
