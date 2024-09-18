@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Tests acceptés</h1> 
                
                <!-- Affichez la liste des tests acceptés -->
                @foreach ($acceptedTests as $test)
                    <div class="mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Nom :</strong>{{ $test->nom }}</h5>
                            <p class="card-text"><strong>Description :</strong> {{ $test->description }}</p>
                            <p class="card-text"><strong>Durée estimée :</strong> {{ $test->duree_estimee }} minutes</p>
                            <p class="card-text"><strong>Catégorie :</strong> {{ $test->categorie }}</p>
                            <p class="card-text"><strong>Niveau :</strong> {{ $test->niveau }}</p>
                            <p class="card-text"><strong>Date de création :</strong> {{ $test->created_at->format('d/m/Y H:i:s') }}</p>
                            
                            <p><strong>Mot clé :</strong> {{ $test->company_password }}</p>

                            <!-- Afficher le fichier PDF -->
                            <p><strong>Fichier PDF :</strong></p>
                            @if($test->fichier_pdf)
                                <div class="pdf-viewer">
                                    <embed src="{{ asset('storage/tests/' . $test->fichier_pdf) }}" type="application/pdf" width="100%" height="500px">
                                </div>
                            @else
                                <p>Aucun fichier PDF trouvé</p>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
