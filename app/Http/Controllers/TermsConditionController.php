<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TermsCondition;

class TermsConditionController extends Controller
{
    public function index()
    {
        $termsCondition = TermsCondition::firstOrCreate(
            [],
            [
                'main_title' => 'Terms and Conditions',
                'sub_title' => 'Terms and Conditions for Education',
                'description_1' => 'The Education is a premier platform where talent meets opportunities. Our mission is to provide individuals with a stage to showcase their skills, compete with passion, and celebrate excellence.',
                'is_active' => true
            ]
        );

        return view('admin.views.admin-terms-condition', compact('termsCondition'));
    }

    public function update(Request $request)
    {
        $termsCondition = TermsCondition::firstOrFail();

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




        $termsCondition->update($data);

        return back()->with('success', 'Terms and conditions updated successfully!');
    }
}
