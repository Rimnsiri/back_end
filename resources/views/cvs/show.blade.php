{{-- resources/views/cvs/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>CV Details</h1>
                </div>
                <div class="card-body">
                    <h2>{{ $cv->title }}</h2>
                    <p>Description: {{ $cv->description }}</p>
                    <p>Developer: {{ $cv->dev->name }} {{$cv->dev->firstname}}</p>
                    <p>Tjm: {{$cv->tjm}}</p>
                    <div class="mt-7">
                        <h2>Skills</h2>
                    @foreach ($cv->skills as $skill)
                        <span class="badge bg-secondary">{{ $skill->name }} ({{ $skill->pivot->nbrmonth }} mois)</span><br>
                    @endforeach
                    </div>
                    

                     <div class="mt-7">
                        <h2>Experiences</h2>
                        @foreach ($cv->experiences as $experience)
                            <div>
                                <strong>{{ $experience->title }}</strong> chez {{ $experience->entreprisename }} <br>
                                ({{ \Carbon\Carbon::parse($experience->startdate)->format('d/m/Y') }} - {{ $experience->enddate ? \Carbon\Carbon::parse($experience->enddate)->format('d/m/Y') : 'Présent' }})
                               
                               <br>
                               <p>{{$experience->description}}</p>
                            </div>
                        @endforeach
                     </div>
                  
                    
                    <div class="mt-7">
                        <h2>Éducation</h2>
                        @foreach ($cv->educations as $education)
                            <div>
                                <strong>{{ $education->diplome }}</strong> à {{ $education->école }} <br>
                                ({{ \Carbon\Carbon::parse($education->startdate)->format('d/m/Y') }} - {{ $education->enddate ? \Carbon\Carbon::parse($education->enddate)->format('d/m/Y') : 'Présent' }}) <br>
                                {{ $education->description }}
                            </div>
                        @endforeach
                    </div>
                  

                     <div class="mt-7">
                        <h2>langage</h2>
                        <p>niveaux français</p>  <strong>{{ $cv->french_level  }}</strong> 
            
                       <p> nivaux anglais</p> <strong> {{ $cv->english_level  }}</strong>
                             <br>
                     </div>

                    <a href="{{ route('devs.show', ['dev' => $dev->id]) }}" class="mt-3 btn btn-secondary">Back to list</a>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    h2 {
    font-size: 1.5rem;
    color: #E8751A;
    font-weight: normal;
    margin-bottom: 20px;
}
</style>
@endsection
