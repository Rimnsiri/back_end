{{-- resources/views/cvs/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('cvs.create') }}" class="!mt-8 px-8 py-2.5 bg-blue-500 text-sm text-white hover:bg-blue-600 rounded-sm">Ajouter un cv</a>
                <table class="min-w-full mt-5 divide-y divide-gray-200">
                    <thead class="bg-gray-300 whitespace-nowrap">
                        <tr>
                            <th class="px-4 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">Nom</th>
                            <th class="px-4 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">Address</th>
                            <th class="px-4 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">Tjm</th>
                            <th class="px-4 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">Niveau</th>
                            <th class="px-4 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody  class="bg-white divide-y divide-gray-200 whitespace-nowrap">
                        @foreach ($cvs as $cv)
                            <tr>
                                <td class="p-4 text-sm">
                                    <div class="flex items-center cursor-pointer w-max">
                                      <img src="{{ asset('storage/' . $cv->photo) }}" class="rounded-full w-9 h-9 shrink-0" />
                                      <div class="ml-4">
                                        <p class="text-sm text-black">{{$cv->name}} {{$cv->firstname}}</p>
                                        <p class="text-xs text-gray-500">{{$cv->email}}</p>
                                      </div>
                                    </div>
                                  </td>
                                <td class="px-4 py-4 text-sm text-gray-800">{{ $cv->address }}</td> {{-- Assurez-vous que le modèle Dev a une propriété 'name' --}}
                                <td class="px-4 py-4 text-sm text-gray-800">{{ $cv->tjm }}</td>
                                <td class="px-4 py-4 text-sm text-gray-800">{{$cv->niveau}}</td>
                                <td class="px-4 py-4 text-sm text-gray-800">
                                    <a href="{{ route('cvs.show', $cv->id) }}" class="ml-2 text-green-600 hover:text-green-900"><i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('cvs.edit', $cv->id) }}" class="text-indigo-600 hover:text-indigo-900"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('cvs.destroy', $cv->id) }}" method="POST"
                                        style="display:inline-block;" id="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="ml-2 text-red-600 hover:text-red-900"
                                            onclick="confirmDelete()"><i class="fa-solid fa-trash"></i></button>
                                    </form>
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
