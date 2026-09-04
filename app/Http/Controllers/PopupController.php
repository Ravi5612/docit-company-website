<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Popup;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popup = Popup::firstOrCreate(
            [],
            [
                
                'is_active' => true
            ]
        );
        return view('admin.views.admin-popup', compact('popup'));
    }


    public function update(Request $request)
    {
        $popup = Popup::firstOrFail();


        $request->validate([
           
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'nullable|boolean'
        ]);

        //  Normal fields
        $data = $request->only([
            'image',
            'is_active'
        ]);

        $data['is_active'] = 1;

        /* =========================
           LOGO UPLOAD (DARK LOGO)
        ==========================*/
        if ($request->hasFile('image')) {

            if ($popup->image && Storage::disk('public')->exists($popup->image)) {
                Storage::disk('public')->delete($popup->image);
            }

            $logoPath = $request->file('image')->store('popups', 'public');
            $data['image'] = $logoPath;

            Log::info('Image uploaded: ' . $logoPath);
        }

       
        //  Update data
        $popup->update($data);

        return back()->with('success', 'Popup  updated successfully!');
    }


}
