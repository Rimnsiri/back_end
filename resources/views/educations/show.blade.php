{{-- resources/views/educations/show.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Education Details
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $education->diplome }}</h5>
                    <p class="card-text"><strong>School:</strong> {{ $education->école }}</p>
                    <p class="card-text"><strong>Start Date:</strong> {{ $education->getFormattedStartDateAttribute() }}</p>
                    <p class="card-text"><strong>End Date:</strong> {{ $education->getFormattedEndDateAttribute() }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $education->description }}</p>
                    <p class="card-text"><strong>Cv_id:</strong>{{$education->cv_id}}</p>
                    <a href="{{ route('educations.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
