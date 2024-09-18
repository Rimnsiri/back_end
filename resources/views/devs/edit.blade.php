@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Modifier un développeur</h2>
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

                        <form action="{{ route('devs.update', $dev->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control form-control-sm" id="name" name="name"
                                    value="{{ $dev->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="firstname">Prénom</label>
                                <input type="text" class="form-control form-control-sm" id="firstname" name="firstname"
                                    value="{{ $dev->firstname }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control form-control-sm" id="email" name="email"
                                    value="{{ $dev->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Téléphone</label>
                                <input type="text" class="form-control form-control-sm" id="phone" name="phone"
                                    value="{{ $dev->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Adresse</label>
                                <input type="text" class="form-control form-control-sm" id="address" name="address"
                                    value="{{ $dev->address }}">
                            </div>
                            <div class="form-group">
                                <label for="presentation">Présentation</label>
                                <textarea class="form-control form-control-sm" id="presentation" name="presentation" required>{{ $dev->presentation }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="photo">Photo actuelle</label>
                                <br>
                                <img src="{{ asset('storage/photos/' . $dev->photo) }}" alt="Photo de {{ $dev->name }}"
                                    style="width: 70px; height: auto;">
                                <br>
                                <label for="photo">Changer la photo</label>
                                <input type="file" class="form-control-file" id="photo" name="photo">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
