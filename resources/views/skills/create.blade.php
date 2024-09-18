{{-- resources/views/skills/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Add New Skill</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('skills.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Skill Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Skill Image</label>
                            <input type="file" class="form-control-file" id="image" name="image" required>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Add Skill</button>
                            <a href="{{ route('skills.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
