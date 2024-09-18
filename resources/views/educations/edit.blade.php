{{-- resources/views/educations/edit.blade.php --}}


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Education</div>

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
                    <form method="POST" action="{{ route('educations.update', $education->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="diplome">Diploma</label>
                            <input type="text" class="form-control" id="diplome" name="diplome" value="{{ $education->diplome }}" required>
                        </div>

                        <div class="form-group">
                            <label for="école">School</label>
                            <input type="text" class="form-control" id="école" name="école" value="{{ $education->école }}" required>
                        </div>

                        <div class="form-group">
                            <label for="startdate">Start Date</label>
                            <input type="date" class="form-control" id="startdate" name="startdate" value="{{ \Carbon\Carbon::parse($education->startdate)->format('Y-m-d') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="enddate">End Date</label>
                            <input type="date" class="form-control" id="enddate" name="enddate" value="{{ \Carbon\Carbon::parse($education->enddate)->format('Y-m-d') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $education->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('educations.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
