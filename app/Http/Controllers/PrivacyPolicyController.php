<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;

class PrivacyPolicyController extends Controller
{
      public function index()
    {
        $privacyPolicy = PrivacyPolicy::firstOrCreate(
            [],
            [
                'main_title' => 'Privacy Policy',
                'sub_title' => 'Privacy Policy',
                'description_1' => 'The Jharkhand Super League (JSL) is a premier platform where talent meets opportunities. Our mission is to provide individuals with a stage to showcase their skills, compete with passion, and celebrate excellence.',
                'is_active' => true
            ]
        );

        return view('admin.views.admin-privacy-policy', compact('privacyPolicy'));
    }

    public function update(Request $request)
    {
        $privacyPolicy = PrivacyPolicy::firstOrFail();

        $request->validate([

            'description_1' => 'required|string',
            'sub_title' => 'required|string',
            'main_title' => 'required|string|max: 200',
            'is_active' => 'boolean'
        ]);

        $data = $request->only([

            'main_title',
            'sub_title',
            'description_1',
            'is_active'
        ]);

      


        $privacyPolicy->update($data);

        return back()->with('success', 'Privacy policy updated successfully!');
    }
}
