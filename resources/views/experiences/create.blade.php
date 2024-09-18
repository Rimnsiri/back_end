{{-- resources/views/experiences/create.blade.php --}}
@extends('layouts.app') {{-- Assurez-vous que ce layout existe --}}

@section('content')
<div class="container">
    <div class="mt-5 row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="text-center card-header">
                    <h1>Create Experience</h1>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('experiences.store') }}" method="POST">
                        @csrf {{-- Protection CSRF --}}
                
                        {{-- Champs du formulaire pour une Experience --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                
                        <div class="mb-3">
                            <label for="entreprisename" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="entreprisename" name="entreprisename" required>
                        </div>
                
                        <div class="mb-3">
                            <label for="startdate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startdate" name="startdate" required>
                        </div>
                
                        <div class="mb-3">
                            <label for="enddate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="enddate" name="enddate">
                        </div>
                
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                
                        {{-- Champ de sélection pour choisir un CV --}}
                        <div class="mb-3">
                            <label for="cv_id" class="form-label">CV</label>
                            <select class="form-control" id="cv_id" name="cv_id" required>
                                <option value="">Select a CV</option>
                                @foreach ($cvs as $cv)
                                    <option value="{{ $cv->id }}">{{ $cv->title }}</option>
                                @endforeach
                            </select>
                        </div>
                
                        {{-- Champs du formulaire pour sélectionner des Skills --}}
                        <div class="mb-3">
                            <label for="skills" class="form-label">Skills</label>
                            @foreach($skills as $skill)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $skill->id }}" id="skill{{ $skill->id }}" name="skills[]">
                                    <label class="form-check-label" for="skill{{ $skill->id }}">
                                        {{ $skill->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
