@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="p-2 text-center flex-grow-1">
                    <h1>Liste des tests</h1> 
                </div>
                <div class="mt-3 text-center">
                    <a href="{{ route('tests.accepted') }}" class="mr-2 btn btn-primary">Tests acceptés</a>
                    <a href="{{ route('tests.rejected') }}" class="btn btn-danger">Tests rejetés</a>
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

                <div class="container">
                    @foreach ($tests as $test)
                        <div class="p-3 mb-3 border row">
                            <div class="col-md-6">
                                <h2><strong>Nom:</strong> {{ $test->nom }}</h2>
                             <p><strong>Description :</strong> {{ $test->description }}</p>
                             <p><strong>Durée estimée :</strong> {{ $test->duree_estimee }}</p>
                             <p><strong>Catégorie :</strong> {{ $test->categorie }}</p>
                             <p><strong>Niveau :</strong> {{ $test->niveau }}</p>
                             <p><strong>Date de création :</strong> {{ $test->date_creation }}</p>
                             <p><strong>Mot clé :</strong> {{ $test->company_password	 }}</p>
                             <p><strong>id entreprise </strong> {{ $test->compteentrepris_id	 }}</p>
                             <p><strong>Fichier PDF :</strong></p>
                             @if($test->fichier_pdf)
                                 <div class="pdf-viewer">
                                     <embed src="{{ asset('storage/tests/' . $test->fichier_pdf) }}" type="application/pdf" width="100%" height="500px">
                                 </div>
                             @else
                                 <p>Aucun fichier PDF trouvé</p>
                             @endif

                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('tests.accept', $test->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button>
                                </form>
                                
                                <form action="{{ route('tests.reject', $test->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
