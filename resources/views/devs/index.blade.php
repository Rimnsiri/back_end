{{-- resources/views/cvs/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="mt-4 col-md-12">
               
                <div class="p-0 bg-white block sm:flex items-center justify-between  lg:mt-1.5">
                    <div class="w-full mb-1">
                        <div class="mb-4">
                            <nav class="flex mb-5" aria-label="Breadcrumb">
                                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                                <li class="inline-flex items-center">
                                    <a href="/dashboard" class="inline-flex items-center text-gray-700 hover:text-gray-900">
                                    <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                    Home
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2">Développeurs</a>
                                    </div>
                                </li>
                                </ol>
                            </nav>
                        </div>
                         @if (session('success'))
                <div class="flex items-center mt-9 max-sm:mb-2 alert" id="success-alert">
                    <!-- component -->
                    <!-- Global notification live region, render this permanently at the end of the document -->
                    <div aria-live="assertive"
                        class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:items-start sm:p-6">
                        <div class="flex flex-col items-center w-full space-y-4 sm:items-end">
                            <div
                                class="w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-lg pointer-events-auto ring-1 ring-black ring-opacity-5">
                                <div class="p-4">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <svg class="w-6 h-6 text-green-400" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="ml-3 w-0 flex-1 pt-0.5">
                                            <p class="text-sm font-medium text-gray-900">Mise à jour réussie !</p>
                                        </div>
                                        <div class="flex flex-shrink-0 ml-4">
                                            <button type="button"
                                                class="inline-flex text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                <span class="sr-only">Close</span>
                                                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true">
                                                    <path
                                                        d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    setTimeout(function() {
                        $('#success-alert').fadeOut('slow');
                    }, 3000); // 3 secondes
                </script>
            @endif
                        <div class="items-center sm:flex">
                            <div class="items-center hidden mt-2 mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0">
                                <label for="users-search" class="sr-only">Recherche</label>
                                <div class="relative mt-1 lg:w-64 xl:w-96">
                                    <input type="text" id="devs-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Recherche de développeurs" onkeyup="filterDevs()">

                                </div>
                            </div>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const input = document.getElementById('devs-search');
                                    const table = document.getElementById('devs-tbody');
                            
                                    input.addEventListener('keyup', function() {
                                        const filter = input.value.toLowerCase();
                                        const rows = table.getElementsByTagName('tr');
                            
                                        for (let i = 0; i < rows.length; i++) {
                                            const cells = rows[i].getElementsByTagName('td');
                                            let found = false;
                            
                                            for (let j = 0; j < cells.length; j++) {
                                                if (cells[j]) {
                                                    const textValue = cells[j].textContent || cells[j].innerText;
                                                    if (textValue.toLowerCase().indexOf(filter) > -1) {
                                                        found = true;
                                                        break;
                                                    }
                                                }
                                            }
                            
                                            rows[i].style.display = found ? "" : "none";
                                        }
                                    });
                                });
                            </script>
                            <div class="flex items-center  ml-auto space-x-2 sm:space-x-3">
                                <a href="{{ route('devs.create') }}" class="px-8 py-2.5 bg-blue-500 text-sm text-white hover:bg-blue-600 rounded-sm">Ajouter un Développeur</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <table class="min-w-full mt-5 divide-y divide-gray-200">
                    <thead class="bg-gray-300 whitespace-nowrap">
                        <tr>
                            <th class="px-4 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">Nom</th>
                            <th class="px-4 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">Address</th>
                            <th class="px-4 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">Tjm</th>
                            <th class="px-4 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">Niveau</th>
                            <th class="px-4 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">Isontop</th>
                            <th class="px-4 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody  class="bg-white divide-y divide-gray-200 whitespace-nowrap"id="devs-tbody">
                        @foreach ($topDevs as $dev)
                            <tr>
                                <td class="p-4 text-sm">
                                    <div class="flex items-center cursor-pointer w-max">
                                        <img src="{{ asset('storage/photos/' . $dev->photo) }}" class="rounded-full w-9 h-9 shrink-0" />
                                      <div class="ml-4">
                                        <p class="text-sm text-black">{{$dev->name}} {{$dev->firstname}}</p>
                                        <p class="text-xs text-gray-500">{{$dev->email}}</p>
                                      </div>
                                    </div>
                                  </td>
                                <td class="px-4 py-4 text-sm text-gray-800">{{ $dev->address }}</td> {{-- Assurez-vous que le modèle Dev a une propriété 'name' --}}
                                <td class="px-4 py-4 text-sm text-gray-800">{{ $dev->tjm }}</td>
                                <td class="px-4 py-4 text-sm text-gray-800">{{$dev->niveau}}</td>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    <div class="w-[68px] block text-center py-1 border   rounded text-xs {{ $dev->isontop ? ' text-green-500' : '  text-red-500' }}">
                                        {{ $dev->isontop ? 'true' : 'false' }}
                                    </div>
                                </td>
                                
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    <a href="{{ route('devs.show', $dev->id) }}" class="ml-2 text-green-600 hover:text-green-900"><i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('devs.edit', $dev->id) }}" class="text-indigo-600 hover:text-indigo-900"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('devs.destroy', $dev->id) }}" method="POST"
                                        style="display:inline-block;" id="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="ml-2 text-red-600 hover:text-red-900"
                                            onclick="confirmDelete()"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                        <a href="{{ route('cvs.downloadPDF', $dev->id) }}" class=" text-blue-600 hover:text-indigo-900"><i class="fa-solid fa-download"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
            Swal.fire({
                title: 'Êtes-vous sûr?',
                text: "Vous ne pourrez pas revenir en arrière!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer!',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si l'utilisateur confirme, soumettre le formulaire
                    document.getElementById('delete-form').submit();
                }
            });
        }
    </script>
@endsection
