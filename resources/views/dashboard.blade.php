@php
$totalDevs = \App\Models\Dev::count();
$totalentrepri = \App\Models\Compteentrepri::count();
$totaltestaccept = \App\Models\AcceptedTest::count();
$totaltestrejet = \App\Models\RejectedTest::count();
$totaltest = $totaltestaccept + $totaltestrejet;
@endphp
@extends('layouts.app')


@section('title', 'Dashbord')

@section('content')

<div class="grid w-full grid-cols-1 gap-4 p-20 mt-4 md:grid-cols-2 xl:grid-cols-3">
    <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 ">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">{{\App\Models\Dev::count()}}</span>

                <h3 class="text-base font-normal text-gray-500">Développeurs</h3>
            </div>
            <div class="flex items-center justify-end flex-1 w-0 ml-5 text-base font-bold text-green-500">
                <i class="fa-solid fa-desktop"></i>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
    </div>
    <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 ">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">{{\App\Models\Compteentrepri::count()}} </span>
                <h3 class="text-base font-normal text-gray-500">Entreprises</h3>
            </div>
            <div class="flex items-center justify-end flex-1 w-0 ml-5 text-base font-bold text-green-500">
                <i class="fa-solid fa-landmark"></i>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
    </div>
    <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 ">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">{{$totaltest}}</span>
                <h3 class="text-base font-normal text-gray-500">Tests</h3>
            </div>
            <div class="flex items-center justify-end flex-1 w-0 ml-5 text-base font-bold text-red-500">
                <i class="fa-solid fa-file"></i>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="mx-4 overflow-hidden rounded-lg shadow-lg md:mx-10">
    <table class="w-full table-fixed">
        <thead>
            <tr class="bg-gray-100">
                <th class="w-1/4 px-6 py-4 font-bold text-left text-gray-600 uppercase">id_Dev</th>
                <th class="w-1/4 px-6 py-4 font-bold text-left text-gray-600 uppercase">prénom_dev</th>
                <th class="w-1/4 px-6 py-4 font-bold text-left text-gray-600 uppercase">nom_dev</th>
                <th class="w-1/4 px-6 py-4 font-bold text-left text-gray-600 uppercase">nom_Entreprise</th>
                <th class="w-1/4 px-6 py-4 font-bold text-left text-gray-600 uppercase">Email_Entreprise</th>
                <th class="w-1/4 px-6 py-4 font-bold text-left text-gray-600 uppercase">téléphone</th>
                <th class="w-1/4 px-6 py-4 font-bold text-left text-gray-600 uppercase">message</th>
                <th class="w-1/4 px-6 py-4 font-bold text-left text-gray-600 uppercase">résponse</th>
                <th class="w-1/4 px-6 py-4 font-bold text-left text-gray-600 uppercase">status</th>
                <th class="w-1/4 px-6 py-4 font-bold text-left text-gray-600 uppercase">action</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach($contacts as $contact)
            <tr>
                <td class="px-6 py-4 border-b border-gray-200">{{$contact->dev_id}}</td>
                <td class="px-6 py-4 border-b border-gray-200">{{ $contact->dev->firstname ?? 'N/A' }}</td>
                <td class="px-6 py-4 border-b border-gray-200">{{ $contact->dev->name ?? 'N/A' }}</td>
                <td class="px-6 py-4 border-b border-gray-200">{{ $contact->name }}</td>
                <td class="px-6 py-4 truncate border-b border-gray-200">{{ $contact->email }}</td>
                <td class="px-6 py-4 border-b border-gray-200">{{ $contact->phone }}</td>
                <td class="px-6 py-4 border-b border-gray-200">
                    <span class="px-6 py-4 border-b border-gray-200">{{$contact->message}}</span>
                </td>
                 <td class="px-6 py-4 border-b border-gray-200">
                    <span class="px-6 py-4 border-b border-gray-200">{{$contact->response}}</span>
                </td>
                <td class="px-6 py-4 border-b border-gray-200">{{ $contact->status }}</td>
                <td><a href="#" class="ml-2 text-green-600 hover:text-green-900" onclick="approveMessage({{$contact->id}})"><i class="fa-solid fa-check"></i></a>
                    <a href="#" class="text-red-600 hover:text-red-900" onclick="rejectMessage({{$contact->id}})"><i class="fa-solid fa-x"></i></a>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    function approveMessage(id) {
        // Envoyer une requête Ajax bch ta3ml update mta3 Status bch twali approved 
        axios.put('/contactdevs/' + id + '/approve')
            .then(response => {
                console.log(response.data.message);
            })
            .catch(error => {
                console.error(error);
            });
    }

    function rejectMessage(id) {
        // kyf kyf 
        axios.put('/contactdevs/' + id + '/reject')
            .then(response => {
                console.log(response.data.message);
            })
            .catch(error => {
                console.error(error);
            });
    }
</script>

@endsection
