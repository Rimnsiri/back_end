{{-- resources/views/cvs/show.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="flex h-screen bg-gray-100">
      
        <div class="container py-8 mx-auto">
            <div class="flex items-center  ml-auto mb-7 space-x-2 sm:space-x-3">
                <a href="{{ route('cvs.downloadPDF', $dev->id) }}" class="px-8 py-2.5 bg-blue-500 text-sm text-white hover:bg-blue-600 rounded-sm">telecharger pdf</a>
            </div>
            <div class="grid grid-cols-4 gap-6 px-4 sm:grid-cols-12">
                <div class="col-span-4 sm:col-span-3">
                    <div class="p-6 bg-white rounded-lg shadow">
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('storage/photos/' . $dev->photo) }}"
                                class="w-32 h-32 mb-4 bg-gray-300 rounded-full shrink-0">

                            </img>
                            <h1 class="text-xl font-bold"> {{ $dev->name }} {{ $dev->firstname }}</h1>
                            <p class="text-gray-700">{{ $dev->title }}</p>
                            <div class="flex flex-wrap justify-center gap-4 mt-6">
                                <a href="#" class="px-4 py-2 text-black rounded ">{{ $dev->tjm }}£</a>
                            </div>
                        </div>
                        <hr class="my-6 border-t border-gray-300">
                        <div class="flex flex-col">
                            <span class="mb-2 font-bold tracking-wider text-gray-700 uppercase">Contact</span>
                            <ul class="grid grid-cols-1 ">
                                    <li class="mb-0"> 
                                        {{ $dev->email }}
                                    </li>
                                    <li class="mb-0"> 
                                        {{ $dev->address }}
                                    </li>
                                    <li class="mb-0"> 
                                        {{ $dev->phone }}
                                    </li>
                            </ul>
                        </div>
                        <hr class="my-6 border-t border-gray-300">
                        <div class="flex flex-col">
                            <span class="mb-2 font-bold tracking-wider text-gray-700 uppercase">Compétences</span>
                            <ul class="grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-2">
                                @foreach ($dev->skills as $skill)
                                    <li class="p-2 mb-0 bg-gray-200 rounded"> 
                                        {{ $skill->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                            <span class="mt-1 mb-2 font-bold tracking-wider text-gray-700 uppercase">langues</span>
                            <p>Français</p> <strong>{{ $dev->french_level }}</strong>

                            <p>Anglais</p> <strong> {{ $dev->english_level }}</strong>
                    </div>
                </div>
                <div class="col-span-4 sm:col-span-9">
                    <div class="p-6 bg-white rounded-lg shadow">
                        <h2 class="mb-4 text-xl font-bold"> Profil Développeur</h2>
                        <p class="text-gray-700">{{ $dev->description }}
                        </p>
                        <h2 class="mt-6 mb-4 text-xl font-bold">Experience</h2>
                        @foreach ($dev->experiences as $experience)
                            <div class="mb-6">
                                <div class="flex flex-wrap justify-between w-full gap-2">
                                    <span class="font-bold text-gray-700">{{ $experience->title }}</span>
                                    <p>
                                        <span class="mr-2 text-gray-700"> {{ $experience->entreprisename }}</span>
                                        <span class="text-gray-700">
                                            ({{ \Carbon\Carbon::parse($experience->startdate)->format('d/m/Y') }} -
                                            {{ $experience->enddate ? \Carbon\Carbon::parse($experience->enddate)->format('d/m/Y') : 'Présent' }})</span>
                                    </p>
                                </div>
                                <p class="mt-2">
                                    {!! $experience->description !!}
                                </p>
                                <strong>Technologies utilisées :</strong>
                                @if ($experience->skills->isNotEmpty())
                                    <div class="flex flex-wrap gap-2 mt-2">
                                        @foreach ($experience->skills as $skill)
                                            <span
                                                class="px-2 py-1 text-gray-700 bg-gray-200 rounded-full">{{ $skill->name }}</span>
                                        @endforeach
                                    </div>
                                @else
                                    <p>Aucune technologie spécifiée pour cette expérience.</p>
                                @endif
                            </div>
                        @endforeach
                        <h2 class="mt-6 mb-4 text-xl font-bold">Éducation</h2>
                        @foreach ($dev->educations as $education)
                            <div class="mb-6">
                                <div class="flex flex-wrap justify-between w-full gap-2">
                                    <span class="font-bold text-gray-700">{{ $education->diplome }}</span>
                                    <p>
                                        <span class="mr-2 text-gray-700"> {{ $education->école }} </span>
                                        <span class="text-gray-700">
                                            ({{ \Carbon\Carbon::parse($education->startdate)->format('d/m/Y') }} -
                                            {{ $education->enddate ? \Carbon\Carbon::parse($education->enddate)->format('d/m/Y') : 'Présent' }})
                                            <br></span>
                                    </p>
                                </div>
                                <p class="mt-2">
                                    {!! $education->description !!}
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
ol, ul {
    list-style-position: inside; /* Pour afficher les puces à l'intérieur de la boîte */
    margin-left: 20px; /* Indentation pour les listes */
}

li {
    margin-bottom: 8px; /* Espacement entre les éléments de liste */
}


</style>