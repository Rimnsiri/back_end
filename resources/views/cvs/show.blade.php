{{-- resources/views/cvs/show.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="flex bg-gray-100 h-screen">
        <div class="container mx-auto py-8">
            <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                <div class="col-span-4 sm:col-span-3">
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex flex-col items-center">
                            <img src="https://randomuser.me/api/portraits/men/94.jpg"
                                class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">

                            </img>
                            <h1 class="text-xl font-bold"> {{ $cv->dev->name }} {{ $cv->dev->firstname }}</h1>
                            <p class="text-gray-700">{{ $cv->title }}</p>
                            <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                <a href="#" class="  text-black py-2 px-4 rounded">{{ $cv->tjm }}£</a>
                            </div>
                        </div>
                        <hr class="my-6 border-t border-gray-300">
                        <div class="flex flex-col">
                            <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Skills</span>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-2">
                                @foreach ($cv->skills as $skill)
                                    <li class="bg-gray-200 p-2 rounded mb-0"> 
                                        {{ $skill->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                            <span class="text-gray-700 uppercase font-bold tracking-wider mb-2 mt-1">langage</span>
                            <p>niveaux français</p> <strong>{{ $cv->french_level }}</strong>

                            <p> nivaux anglais</p> <strong> {{ $cv->english_level }}</strong>
                    </div>
                </div>
                <div class="col-span-4 sm:col-span-9">
                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-xl font-bold mb-4">About Me</h2>
                        <p class="text-gray-700">{{ $cv->description }}
                        </p>
                        <h2 class="text-xl font-bold mt-6 mb-4">Experience</h2>
                        @foreach ($cv->experiences as $experience)
                            <div class="mb-6">
                                <div class="flex justify-between flex-wrap gap-2 w-full">
                                    <span class="text-gray-700 font-bold">{{ $experience->title }}</span>
                                    <p>
                                        <span class="text-gray-700 mr-2"> {{ $experience->entreprisename }}</span>
                                        <span class="text-gray-700">
                                            ({{ \Carbon\Carbon::parse($experience->startdate)->format('d/m/Y') }} -
                                            {{ $experience->enddate ? \Carbon\Carbon::parse($experience->enddate)->format('d/m/Y') : 'Présent' }})</span>
                                    </p>
                                </div>
                                <p class="mt-2">
                                    {{ $experience->description }}
                                </p>
                                <strong>Technologies utilisées :</strong>
                                @if ($experience->skills->isNotEmpty())
                                    <div class="flex flex-wrap gap-2 mt-2">
                                        @foreach ($experience->skills as $skill)
                                            <span
                                                class="text-gray-700 bg-gray-200 rounded-full px-2 py-1">{{ $skill->name }}</span>
                                        @endforeach
                                    </div>
                                @else
                                    <p>Aucune technologie spécifiée pour cette expérience.</p>
                                @endif
                            </div>
                        @endforeach
                        <h2 class="text-xl font-bold mt-6 mb-4">Éducation</h2>
                        @foreach ($cv->educations as $education)
                            <div class="mb-6">
                                <div class="flex justify-between flex-wrap gap-2 w-full">
                                    <span class="text-gray-700 font-bold">{{ $education->diplome }}</span>
                                    <p>
                                        <span class="text-gray-700 mr-2"> {{ $education->école }} </span>
                                        <span class="text-gray-700">
                                            ({{ \Carbon\Carbon::parse($education->startdate)->format('d/m/Y') }} -
                                            {{ $education->enddate ? \Carbon\Carbon::parse($education->enddate)->format('d/m/Y') : 'Présent' }})
                                            <br></span>
                                    </p>
                                </div>
                                <p class="mt-2">
                                    {{ $education->description }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
<style>
    .container {
    max-height: 100vh; 
    overflow-y: auto; 
    padding: 20px; 
}

</style>