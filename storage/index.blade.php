{{-- resources/views/backend/skills/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <div class="p-2"><a href="{{ route('skills.create') }}" class="btn btn-primary ">Ajouter un Skill</a>
            </div>
            
                    <div class="p-2 text-center flex-grow-1">
                        <h1>Skill List</h1> 
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
                        <div class="container d-flex justify-content-center">
                            <table class="table mt-2 table-bordered " style="width: 60%">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($skills as $skill)
                                        <tr>
                                            <th scope="row">{{ $skill->id }}</th>
                                            <td>{{ $skill->name }}</td>
                                            <td>
                                                @if($skill->image)
                                                    <img src="{{ Storage::url($skill->image) }}" width="50" height="50" class="img-fluid" alt="Skill Image">
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <form action="{{ route('skills.destroy', $skill->id) }}" method="POST"  style="display: inline-block;" id="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger" onclick="confirmDelete()"><i class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                       
                    
                
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
            document.getElementById('delete-form').submit();
        }
    });
}
    </script>
@endsection
