<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;

class WebsiteSettingController extends Controller
{
    public function index()
    {
        $websiteSetting = WebsiteSetting::firstOrCreate(
            [],
            [
                'brand_name' => 'Your Brand Name',
                'description' => 'Your website description',
                'location' => 'Your location',
                'address_noida' => 'Your location',
                'address_jaipur' => 'Your location',
                'phone_1' => 'Your phone number 1',
                'phone_2' => 'Your phone number 2',
                'email' => 'Your email address',
                'logo' => null,
                'logo_white' => null,
                'is_active' => true
            ]
        );

        return view('admin.views.setting', compact('websiteSetting'));
    }

    public function update(Request $request)
    {
        $websiteSetting = WebsiteSetting::firstOrFail();


        $request->validate([
            'brand_name' => 'required|string|max:200',
            'description' => 'required|string',
            'location' => 'required|string|max:500',
            'address_noida' => 'required|string|max:500',
            'address_jaipur' => 'required|string|max:500',
            'email' => 'required|email|max:200',
            'phone_1' => 'required|string|max:200',
            'phone_2' => 'nullable|string|max:200',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_white' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'nullable|boolean'
        ]);

        //  Normal fields
        $data = $request->only([
            'brand_name',
            'description',
            'location',
            'address_noida',
            'address_jaipur',
            'email',
            'phone_1',
            'phone_2'
        ]);

        $data['is_active'] = 1;

        /* =========================
           LOGO UPLOAD (DARK LOGO)
        ==========================*/
        if ($request->hasFile('logo')) {

            if ($websiteSetting->logo && Storage::disk('public')->exists($websiteSetting->logo)) {
                Storage::disk('public')->delete($websiteSetting->logo);
            }

            $logoPath = $request->file('logo')->store('website-settings', 'public');
            $data['logo'] = $logoPath;

            Log::info('Logo uploaded: ' . $logoPath);
        }

        /* =========================
           WHITE LOGO UPLOAD
        ==========================*/
        if ($request->hasFile('logo_white')) {

            if ($websiteSetting->logo_white && Storage::disk('public')->exists($websiteSetting->logo_white)) {
                Storage::disk('public')->delete($websiteSetting->logo_white);
            }

            $logoWhitePath = $request->file('logo_white')->store('website-settings', 'public');
            $data['logo_white'] = $logoWhitePath;

            Log::info('White logo uploaded: ' . $logoWhitePath);
        }

        //  Update data
        $websiteSetting->update($data);

        return back()->with('success', 'Website setting updated successfully!');
    }
}