<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Support\Facades\Storage;
class SkillController extends Controller
{
      // Afficher la liste des compétences
      public function index(Request $request)
      {
          $skills = Skill::orderBy('name')->get(); // Exécute la requête pour récupérer les compétences
          return view('skills.index', compact('skills'));
      }
      

      public function create()
      {
          return view('skills.create');
      }
      public function store(Request $request)
      {
          $request->validate([
              'name' => 'required|string',
              'issearchable' =>'nullable|boolean',
              'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
              
          ]);
  
          $skill = new Skill($request->only(['name', 'image']));
          $skill->issearchable = $request->has('issearchable');
          
          // Si une image est fournie, la sauvegarder et stocker le chemin
          if ($request->hasFile('image')) {
              $imagePath = $request->file('image')->store('public/photos');
              $skill->image = $imagePath;
          }
  
          $skill->save();
  
          return redirect()->route('skills.index')->with('success', 'Skill created successfully.');
      }

      
      
      public function edit($id)
      {
          $skill = Skill::findOrFail($id);
          return view('skills.edit', compact('skill'));
      }
  
      // Mettre à jour une compétence existante
      public function update(Request $request, $id)
      {
          $request->validate([
              'name' => 'required|string',
              'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
              'issearchable' =>'nullable|boolean',
          ]);
  
          $skill = Skill::findOrFail($id);
  
          $skill->fill($request->only(['name' ]));
          $skill->issearchable = $request->has('issearchable');
  
        
          if ($request->hasFile('image')) {
              $imagePath = $request->file('image')->store('public/photos');
              $skill->image = $imagePath;
          }
  
          $skill->save();
  
          return redirect()->route('skills.index')->with('success', 'Skill updated successfully.');
      }


      public function destroy($id)
      {
          $skill = Skill::findOrFail($id);
          $skill->delete();
  
          return redirect()->route('skills.index')->with('success', 'Skill deleted successfully.');
      }

      public function getSkills() {
        $skills = Skill::where('issearchable', true)->orderBy('name', 'asc')->get();
        return response()->json($skills);
    }
    
}

