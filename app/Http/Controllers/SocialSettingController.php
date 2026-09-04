<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialSetting;
class SocialSettingController extends Controller
{
    //
    public function index()
    {
        $socialSetting = SocialSetting::firstOrCreate(
            [],
            [
                'facebook_url' => null,
                'instagram_url' => null,
                'twitter_url' => null,
                'linkedin_url' => null,
                'is_active' => true
            ]
        );

        return view('admin.views.admin-social-settings', compact('socialSetting'));
    }
    public function update(Request $request)
    {
        $socialSetting = SocialSetting::firstOrFail();

        $request->validate([
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'is_active' => 'nullable|boolean'
        ]);

        $data = $request->only([
            'facebook_url',
            'instagram_url',
            'twitter_url',
            'linkedin_url'
        ]);

        $data['is_active'] = 1;

        $socialSetting->update($data);

        return redirect()->back()->with('success', 'Social settings updated successfully.');
    }
}
