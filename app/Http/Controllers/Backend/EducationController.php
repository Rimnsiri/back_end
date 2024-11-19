<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;
use Carbon\Carbon;
use App\Models\Dev;

class EducationController extends Controller
{
    // Display a listing of the educations
    public function index()
    {
        $educations = Education::all();
        return view('educations.index', compact('educations'));
    }

    // Show the form for creating a new education
    public function create()
    {
        $cvs = Dev::all();
        return view('educations.create', compact('cvs'));
    }

    // Store a newly created education in the database
    public function store(Request $request)
    {
        $request->validate([
            'diplome' => 'required',
            'école' => 'required',
            'startdate' => 'required|date',
            'enddate' => 'required|date',
            'description' => 'required',
            'Dev_id' => 'required|exists:cvs,id',
        ]);

        Education::create($request->all());
        return redirect()->route('educations.index')->with('success','Education created successfully.');
    }

    // Display the specified education
    public function show(Education $education)
    {
        return view('educations.show', compact('education'));
    }

    // Show the form for editing the specified education
    public function edit(Education $education)
    {
        return view('educations.edit', compact('education'));
    }

    // Update the specified education in the database
    public function update(Request $request, Education $education)
    {
        $request->validate([
            'diplome' => 'required',
            'école' => 'required',
            'startdate' => 'required|date',
            'enddate' => 'required|date',
            'description' => 'required',
        ]);

        $education->update($request->all());
        return redirect()->route('educations.index')->with('success','Education updated successfully.');
    }

    // Remove the specified education from the database
    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('educations.index')->with('success','Education deleted successfully.');
    }
}
