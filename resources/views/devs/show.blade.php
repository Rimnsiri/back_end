@extends('layouts.app')

@section('title', 'Détails du développeur')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1 class="mb-5">Détails du Développeur : {{ $dev->name }}</h1>
            <img class="card-img-top" src="{{ asset('storage/photos/' . $dev->photo) }}" alt="Photo de {{ $dev->name }}" style="width: 200px;  border-radius: 10px; margin-left:650px">
            <div class="card mx-auto mt-2" style="width: 50rem; border: 1px solid #000; border-radius: 5px;">
                
                <h1 class=" mt-7 text-left ml-5" > <strong>Informations personnelle</strong> </h1>
                <div class="card-body text-left">
                    <h5 class="card-text"> Nom: {{ $dev->name }} </h5>
                    <h5 class="card-text">Prénom: {{ $dev->firstname }}</h5>
                    <p class="card-text">présentation: {{$dev->presentation}}</p>
                    <p class="card-text">Email: {{$dev->email}}</p>
                    <p class="card-text">téléphone: {{$dev->phone}}</p>
                    <p class="card-text">Adresse: {{$dev->address}}</p>
                    
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="mt-5"><strong>Liste CVs du Développeur</strong></h2>
                    <a href="{{ route('cvs.create', ['dev_id' => $dev->id]) }}" class="btn btn-success mt-3" style="margin-left: 550px"> <i class="fa-solid fa-plus"></i>Ajouter CV</a>


                    <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th> 
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ispublic</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($dev->cvs as $cv)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $cv->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $cv->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $cv->description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{$cv->ispublic}}</td>
                                <td>
                                    <a href="{{ route('cvs.show', $cv->id) }}" class="ml-2 text-green-600 hover:text-green-900"><i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('cvs.edit', $cv->id) }}" class="text-indigo-600 hover:text-indigo-900"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('cvs.destroy', $cv->id) }}" method="POST" style="display:inline-block;" id="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="ml-2 text-red-600 hover:text-red-900" onclick="confirmDelete()"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="mt-7">
                <a href="{{ route('devs.index') }}" class="btn btn-primary"> <i class="fa-solid fa-backward"></i>Retour </a>
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
