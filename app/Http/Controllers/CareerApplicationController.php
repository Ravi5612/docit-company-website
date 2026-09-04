<?php

namespace App\Http\Controllers;

use App\Models\CareerApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CareerApplicationController extends Controller
{
    public function index()
    {
        $applications = CareerApplication::latest()->get();
        return view('admin.views.admin-career-applications', compact('applications'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits:10',
            'specialization' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'resume' => 'required|mimes:pdf,doc,docx|max:5120',
            'message' => 'nullable|string',
            'g-recaptcha-response' => 'required'
        ]);

        // Verify Google reCAPTCHA v3
        $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]
        );

        $captcha = $response->json();

        if (
            !$captcha['success'] ||
            ($captcha['score'] ?? 0) < 0.5
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'captcha' => 'Captcha verification failed.'
                ]);
        }

        // Upload Resume
        $resumePath = null;

        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store(
                'career-resumes',
                'public'
            );
        }

        // Save Application
        CareerApplication::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'specialization' => $request->specialization,
            'designation' => $request->designation,
            'department' => $request->department,
            'experience' => $request->experience,
            'resume' => $resumePath,
            'message' => $request->message,
            'ip_address' => $request->ip()

        ]);

        return back()->with(
            'success',
            'Your application has been submitted successfully.'
        );
    }
    public function destroy(CareerApplication $application)
    {
        $application->delete();
        return redirect()->back()->with('success', 'Application deleted successfully!');
    }
    public function deleteSelected(Request $request)
    {
        if (!$request->ids || count($request->ids) == 0) {
            return response()->json(['error' => true, 'message' => 'No IDs received']);
        }

        CareerApplication::whereIn('id', $request->ids)->delete();

        return response()->json(['success' => true, 'message' => 'Deleted successfully']);
    }
}