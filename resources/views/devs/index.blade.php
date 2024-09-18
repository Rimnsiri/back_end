@extends('layouts.app')

@section('title', 'Liste des développeurs')

@section('content')
<div class="container">
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <!-- Colonne pour le bouton, aligné à gauche -->
        <div class="p-2 ">
            <a href="{{ route('devs.create') }}" ><button class="button">Ajouter Développeurs</button>
            </a>
        </div>
        <!-- Colonne pour le titre, centré par rapport à l'espace disponible -->
        <div class="p-2 text-center flex-grow-1">
            <h1>Liste des Développeurs</h1>
        </div>
        <!-- Colonne vide pour équilibrer le flex à droite -->
        <div class="p-2 flex-grow-1"></div>
    </div>

    
    @if (session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>

    <script type="text/javascript">
        setTimeout(function() {
            $('#success-alert').fadeOut('slow');
        }, 3000); // 3 secondes
    </script>
    @endif
    <div class="row">
        <div class="p-2 col-md-2 ml-1 " >
            <form action="{{ route('devs.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control rounded-2" placeholder="Rechercher par prénom" >
                    <span class="input-group-btn">
                        <button class="button" type="submit"><i class="fas fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
        <div class=" col-md-8 offset-md-1 d-flex ">
         
            <table  class="min-w-full divide-y divide-gray-200 overflow-x-auto" style="width: 80%">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prénom</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($devs as $dev)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $dev->id }}</td>
                        <td>{{ $dev->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $dev->firstname }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="{{ asset('storage/photos/' . $dev->photo) }}" alt="Photo de {{ $dev->name }}" style="width: 70px; height: auto;">
                            </div>
                            
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('devs.show', $dev->id) }}" class="ml-2 text-green-600 hover:text-green-900"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('devs.edit', $dev->id) }}" class="text-indigo-600 hover:text-indigo-900"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('devs.destroy', $dev->id) }}" method="POST" style="display: inline-block;" id="delete-form" >
                                @csrf
                                @method('DELETE')
                                <a type="button" class="ml-2 text-red-600 hover:text-red-900" onclick="confirmDelete()"><i class="fa-solid fa-trash"></i></a>
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

<style>
button {
  border: none;
  display: flex;
  padding: 0.75rem 1.5rem;
  background-color: #488aec;
  color: #ffffff;
  font-size: 0.75rem;
  line-height: 1rem;
  font-weight: 700;
  cursor: pointer;
  text-align: center;
  text-transform: uppercase;
  vertical-align: middle;
  align-items: center;
  border-radius: 0.5rem;
  user-select: none;
  gap: 0.75rem;
  box-shadow: 0 4px 6px -1px #488aec31, 0 2px 4px -1px #488aec17;
  transition: all 0.6s ease;
}

button:hover {
  box-shadow: 0 10px 15px -3px #488aec4f, 0 4px 6px -2px #488aec17;
}

button:focus,
button:active {
  opacity: 0.85;
  box-shadow: none;
}

button svg {
  width: 1.25rem;
  height: 1.25rem;
}

</style>
@endsection
