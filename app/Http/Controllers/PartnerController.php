<?php

namespace App\Http\Controllers;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->get();
        return view('admin.views.admin-partner', compact('partners'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:5048',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('partners-images', 'public');
        }

        Partner::create([
            'name' => $request->name,
            'link' => $request->link,
            'image' => $imagePath,
            'status' => $request->status
        ]);

        return back()->with('success', 'Partner added successfully!');
    }
    public function update(Request $request, Partner $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5048',
            'status' => 'required|in:active,inactive'

        ]);

        $imagePath = $item->image;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('partners-images', 'public');
        }
        $item->update([
            'name' => $request->name,
            'link' => $request->link,
            'image' => $imagePath,
            'status' => $request->status
        ]);

        return back()->with('success', 'Partner updated successfully!');
    }
    public function destroy(Partner $item)
    {
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();
        return back()->with('success', 'Partner deleted successfully!');
    }
}
