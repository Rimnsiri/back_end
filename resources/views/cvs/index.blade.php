{{-- resources/views/cvs/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>List of CVs</h1>
                <a href="{{ route('cvs.create') }}" class="btn btn-primary">Ajouter un cv</a>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Developer</th>
                            <th>Skills</th>
                            <th>Experiences</th>
                            <th>Éducation</th>
                            <th>French Level</th>
                            <th>English Level</th>
                            <th>Tjm</th>
                            <th>Niveau</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cvs as $cv)
                            <tr>
                                <td>{{ $cv->id }}</td>
                                <td>{{ $cv->title }}</td>
                                <td>{{ $cv->description }}</td>
                                <td>{{ $cv->dev->name }} {{ $cv->dev->firstname }}</td> {{-- Assurez-vous que le modèle Dev a une propriété 'name' --}}
                                <td>
                                    @foreach ($cv->skills as $skill)
                                        <span class="badge bg-secondary">{{ $skill->name }} ({{ $skill->pivot->nbrmonth }}
                                            mois)</span><br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($cv->experiences as $experience)
                                        <div>
                                            <strong>{{ $experience->title }}</strong> <br>
                                             {{ $experience->entreprisename }}
                                            <br>
                                            @if($experience->startdate && $experience->enddate)
                                            ({{ \Carbon\Carbon::parse($experience->startdate)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($experience->enddate)->format('d/m/Y') }})
                                        @elseif($experience->startdate)
                                            ({{ \Carbon\Carbon::parse($experience->startdate)->format('d/m/Y') }} -)
                                        @elseif($experience->enddate)
                                            (- {{ \Carbon\Carbon::parse($experience->enddate)->format('d/m/Y') }})
                                        @else
                                            {{-- Vous pouvez décider de ne rien afficher ou d'afficher un texte spécifique si aucune date n'est disponible --}}
                                        @endif
                                        <br>
                                        
                                          <p>{{$experience->description}}</p>
                                        </div>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($cv->educations as $education)
                                        <div>
                                            <strong>{{ $education->diplome }}</strong> à {{ $education->école }} <br>
                                            ({{ \Carbon\Carbon::parse($education->startdate)->format('d/m/Y') }} -
                                            {{ $education->enddate ? \Carbon\Carbon::parse($education->enddate)->format('d/m/Y') : 'Présent' }})
                                            <br>
                                            {{ $education->description }}
                                        </div>
                                    @endforeach
                                </td>
                                <td>{{ $cv->french_level }}</td>
                                <td>{{ $cv->english_level }}</td>
                                <td>{{ $cv->tjm }}</td>
                                <td>{{$cv->niveau}}</td>
                                <td>
                                    <a href="{{ route('cvs.show', $cv->id) }}" class="btn btn-info">Voir</a>
                                    <a href="{{ route('cvs.edit', $cv->id) }}" class="btn btn-primary">Modifier</a>
                                    <form action="{{ route('cvs.destroy', $cv->id) }}" method="POST"
                                        style="display:inline-block;" id="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger"
                                            onclick="confirmDelete()">Supprimer</button>
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
