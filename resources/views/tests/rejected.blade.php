@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Tests rejetés</h1> 
                
                <!-- Affichez la liste des tests rejetés -->
                @foreach ($rejectedTests as $test)
                <div class="mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Nom :</strong>{{ $test->nom }}</h5>
                        <p class="card-text"><strong>Description :</strong> {{ $test->description }}</p>
                        <p class="card-text"><strong>Durée estimée :</strong> {{ $test->duree_estimee }} minutes</p>
                        <p class="card-text"><strong>Catégorie :</strong> {{ $test->categorie }}</p>
                        <p class="card-text"><strong>Niveau :</strong> {{ $test->niveau }}</p>
                        <p class="card-text"><strong>Date de création :</strong> {{ $test->created_at->format('d/m/Y H:i:s') }}</p>
                        <!-- Vous pouvez ajouter d'autres champs ici selon vos besoins -->
                    </div>
                </div>
                    <!-- Affichez les détails du test -->
                @endforeach
            </div>
        </div>
    </div>
@endsection
