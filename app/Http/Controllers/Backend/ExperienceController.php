<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Dev;
use Carbon\Carbon;
class ExperienceController extends Controller
{
    public function index()
    
        {
            $experiences = Experience::with('skills')->get();
            return view('experiences.index', compact('experiences'));
        }
    
        public function create()
        {
            $skills = Skill::all();
            $Devs = Dev::all();
            return view('experiences.create', compact('skills','cvs'));
        }
        
    
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'entreprisename' => 'required|max:255',
                'startdate' => 'required|date',
                'enddate' => 'nullable|date',
                'description' => 'nullable|string',
                'skills' => 'nullable|array',
                'skills.*' => 'exists:skills,id', 
                'dev_id' => 'required|exists:devs,id',
            ]);
        
            $experience = Experience::create($validatedData);
        
            if (!empty($validatedData['skills'])) {
                $experience->skills()->attach($validatedData['skills']);
            }
        
            return redirect()->route('experiences.index');
        }
        
    
        public function show($id)
        {
            $experience = Experience::with('skills')->findOrFail($id);
            return view('experiences.show', compact('experience'));
        }
    
        public function edit($id)
        {
            $experience = Experience::with('skills')->findOrFail($id);
            $skills = Skill::all();
            $devs = Dev::all();
            return view('experiences.edit', compact('experience', 'skills','cvs'));
        }
    
        public function update(Request $request, $id)
        {
            $experience = Experience::findOrFail($id);
            $experience->update($request->all());
    
            if ($request->skills) {
                $experience->skills()->sync($request->skills);
            }
    
            return redirect()->route('experiences.index');
        }
    
        public function destroy($id)
        {
            $experience = Experience::findOrFail($id);
            $experience->skills()->detach(); // Detach all skills before deleting
            $experience->delete();
    
            return redirect()->route('experiences.index');
        }
        
}
