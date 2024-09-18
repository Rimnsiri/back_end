{{-- resources/views/educations/show.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    experiences Details
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $experience->title }}</h5>
                    <p class="card-text"><strong>School:</strong> {{ $experience->entreprisename }}</p>
                    <p class="card-text"><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($experience->startdate)->format('d/m/Y') }}</p>
                    <p class="card-text"><strong>End Date:</strong> {{ $experience->enddate ? \Carbon\Carbon::parse($experience->enddate)->format('d/m/Y') : 'En cours' }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $experience->description }}</p>
                    <p class="card-text"><strong>Cv_id:</strong>{{$experience->cv_id}}</p>
                    <p class="card-text"> <strong>skills</strong>{{ $experience->skills->pluck('name')->join(', ') }}</p>
                    <a href="{{ route('experiences.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
