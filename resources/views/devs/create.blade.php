@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6"> <!-- Réduit la largeur de la colonne de 8 à 6 pour centrer davantage le formulaire -->
                <div class="card">
                    <div class="text-center card-header">
                        <h2>Ajouter un développeur</h2>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('devs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control form-control-sm" id="name" name="name"
                                    required> <!-- form-control-sm pour réduire la taille -->
                            </div>
                            <div class="form-group">
                                <label for="firstname">Prénom</label>
                                <input type="text" class="form-control form-control-sm" id="firstname" name="firstname"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control form-control-sm" id="email" name="email"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Téléphone</label>
                                <input type="text" class="form-control form-control-sm" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="address">Adresse</label>
                                <input type="text" class="form-control form-control-sm" id="address" name="address">
                            </div>
                            <div class="form-group">
                                <label for="presentation">Présentation</label>
                                <textarea class="form-control form-control-sm" id="presentation" name="presentation" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control-file" id="photo" name="photo">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary ">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
