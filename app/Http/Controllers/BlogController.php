<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
class BlogController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.views.admin-blogs', compact('blogs'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:5048',
            'author' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = null;
        $authorImagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog-images', 'public');
        }

     

        Blog::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'image' => $imagePath,
            'author' => $request->author,
            'date' => $request->date,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return back()->with('success', 'Blog added successfully!');
    }
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $blog->id,
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:5048',
            'author' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive'
        ]);

        $imagePath = $blog->image;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog-images', 'public');
        }

      

        $blog->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'image' => $imagePath,
            'author' => $request->author,
            'date' => $request->date,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return back()->with('success', 'Blog updated successfully!');
    }
    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

       
        $blog->delete();

        return back()->with('success', 'Blog deleted successfully!');
    }
}
