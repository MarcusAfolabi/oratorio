<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommunityController extends Controller
{ 

    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }
    public function index()
    {
        $communities = Community::paginate(4);
        return view('admin.community.index', compact('communities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:communities|max:255',
            "acronyms" => 'required',
            "location" => 'required',
            "phone" => 'required',
            'logo' => 'required|image|mimes:jpg,png,jpeg,svg|max:1024'
        ]);
        $community = new Community();
        $community ->name = $request->input('name');
        $community ->acronyms = $request->input('acronyms');
        $community ->location = $request->input('location');
        $community ->phone = $request->input('phone');
        $community ->slug = Str::slug($request->input('name'), '-');
        $community ->logo = 'storage/' . $request->file('logo')->store('chapterLogo', 'public');
        $community ->save();
        return redirect()->back()->with('status', 'Added Successfully');
    } 
    
    public function edit(Community $community )
    {
        return view('admin.community.edit', compact('community'));
    }
 
    public function update(Request $request, Community $community )
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            "acronyms" => 'sometimes',
            "location" => 'sometimes',
            "phone" => 'sometimes',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:1024'
        ]);
        $community ->name = $request->input('name');
        $community ->acronyms = $request->input('acronyms');
        $community ->location = $request->input('location');
        $community ->phone = $request->input('phone');
        $community ->slug = Str::slug($request->input('name'), '-');
        
        if ($request->hasFile('logo')) {
            Storage::delete($community ->logo);
        $community ->logo = 'storage/' . $request->file('logo')->store('chapterLogo', 'public');
        } 
        $community ->save();
        return redirect()->route('community.index')->with('status', 'Updated');
    } 

    public function destroy(Community $community )
    {
        Storage::disk('public')->delete([
            str_replace('storage/', '', $community ->logo),
        ]);
        $community ->delete();
        return redirect()->back()->with('status', 'Deleted');
    }
}
