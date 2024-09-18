{{-- resources/views/experiences/index.blade.php --}}

@extends('layouts.app')

@section('title', 'Liste des Expériences')

@section('content')
<div class="container">
    <h1>Liste des Expériences</h1>
    <a href="{{ route('experiences.create') }}" class="btn btn-primary">Ajouter une nouvelle expérience</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Nom de l'Entreprise</th>
                <th>Date de Début</th>
                <th>Date de Fin</th>
                <th>Description</th>
                <th>Compétences</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($experiences as $experience)
            <tr>
                <td>{{ $experience->title }}</td>
                <td>{{ $experience->entreprisename }}</td>
                <td>{{ \Carbon\Carbon::parse($experience->startdate)->format('d/m/Y') }}</td>
                <td>{{ $experience->enddate ? \Carbon\Carbon::parse($experience->enddate)->format('d/m/Y') : 'En cours' }}</td>
                
                <td>{{ $experience->description }}</td>
                <td>{{ $experience->skills->pluck('name')->join(', ') }}</td>
                <td>
                    <a href="{{ route('experiences.show', $experience->id) }}" class="btn btn-info">show</a>
                    <a href="{{ route('experiences.edit', $experience->id) }}" class="btn btn-primary">edit</a>
                    <form action="{{ route('experiences.destroy', $experience->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" >delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
