{{-- resources/views/skills/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Skill: {{ $skill->name }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('skills.update', $skill->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Skill Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $skill->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Skill Image</label>
                            <div>
                                <img src="{{ Storage::url($skill->image) }}" height="50" width="100" class="mb-3"/>
                            </div>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Skill</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
