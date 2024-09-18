

@extends('layouts.app')

@section('content')
    <style>
        /* Styles CSS */
        .custom-table {
            max-width: 1500px; /* Vous pouvez ajuster cette valeur selon vos besoins */
            margin: 0 auto; /* Pour centrer le tableau horizontalement */
        }
    </style>

    <h1 class="mb-4 text-center">Liste des réponses de test</h1>

    <div class="table-responsive">
        <table class="table custom-table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Test ID</th>
                    <th scope="col">dev_Id</th>
                   <th scope="col"> compteentrepris_id</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
                    <th scope="col">Réponse</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reponseTests as $key => $reponseTest)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $reponseTest->id_test }}</td>
                        <td>{{ $reponseTest->id_devp }}</td>
                        <td>{{$reponseTest->compteentrepris_id}}</td>
                        <td>{{ $reponseTest->start_time }}</td>
                        <td>{{ $reponseTest->end_time }}</td>
                        <td>{{ $reponseTest->reponse }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
