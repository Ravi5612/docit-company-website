<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSlider ;
use Illuminate\Support\Facades\Storage;

class HomeSliderController extends Controller
{
   public function index()
    {
        $SliderImage = HomeSlider::latest()->get();
        return view('admin.views.admin-slider', compact('SliderImage'));
    }
    public function store(Request $request)
    {
        $request->validate([
            
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:5048',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('technology-images', 'public');
        }
      


        HomeSlider::create([
          
            'image' => $imagePath,
            'status' => $request->status
        ]);

        return back()->with('success', 'Gallery added successfully!');
    }
    public function update(Request $request, HomeSlider $item)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5048',
            'status' => 'required|in:active,inactive'

        ]);

        $imagePath = $item->image;
       
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('technology-images', 'public');
        }



        $item->update([
           
            'image' => $imagePath,
            'status' => $request->status
        ]);

        return back()->with('success', ' Image updated successfully!');
    }
    public function destroy(HomeSlider $item)
    {
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
       


        $item->delete();

        return back()->with('success', ' Image deleted successfully!');
    }
}
