{{-- resources/views/educations/create.blade.php --}}
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="mt-5 row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="text-center card-header">
                        Add New Education
                    </div>
                    <div class="card-body">
                        <form action="{{ route('educations.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="diplome">Diploma</label>
                                <input type="text" class="form-control form-control-sm" id="diplome" name="diplome" required>
                            </div>
                            <div class="mb-3">
                                <label for="ecole">School</label>
                                <input type="text" class="form-control form-control-sm" id="école" name="école" required>
                            </div>
                            <div class="mb-3">
                                <label for="startdate">Start Date</label>
                                <input type="date" class="form-control form-control-sm" id="startdate" name="startdate" required>
                            </div>
                            <div class="mb-3">
                                <label for="enddate">End Date</label>
                                <input type="date" class="form-control form-control-sm" id="enddate" name="enddate" required>
                            </div>
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control form-control-sm" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="cv_id" class="form-label">CV</label>
                                <select class="form-control" id="cv_id" name="cv_id" required>
                                    <option value="">Select a CV</option>
                                    @foreach ($cvs as $cv)
                                    <option value="{{ $cv->id }}">{{ $cv->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-center form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection