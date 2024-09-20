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
                            <div class="relative flex items-center font-[sans-serif] max-w-md mx-auto mt-4">
                                <label class="text-[13px] bg-white text-[#333] absolute px-2 top-[-10px] left-[18px]">
                                    Nom</label>
                          
                                <input type="text" placeholder="Entrez le nom"id="name" name="name"
                                  class="pl-4 pr-12 py-3.5 bg-white text-[#333] w-full text-sm border-2 border-gray-300 focus:border-[#333] rounded outline-none" required />
                          
                                
                              </div>
                              <div class="relative flex items-center font-[sans-serif] max-w-md mx-auto mt-4">
                                <label class="text-[13px] bg-white text-[#333] absolute px-2 top-[-10px] left-[18px]">
                                    Prénom</label>
                          
                                <input type="text" placeholder="Entrez le Prénom" id="firstname" name="firstname"
                                  class="pl-4 pr-12 py-3.5 bg-white text-[#333] w-full text-sm border-2 border-gray-300 focus:border-[#333] rounded outline-none" required />
                          
                                
                              </div>
                              <div class="relative flex items-center font-[sans-serif] max-w-md mx-auto mt-4">
                                <label for="email" class="text-[13px] bg-white text-[#333] absolute px-2 top-[-10px] left-[18px]">
                                    Email</label>
                          
                                <input for="phone" type="email" placeholder="Entrez le Email" id="email" name="email"
                                  class="pl-4 pr-12 py-3.5 bg-white text-[#333] w-full text-sm border-2 border-gray-300 focus:border-[#333] rounded outline-none" required />
                          
                                
                              </div>
                              <div class="relative flex items-center font-[sans-serif] max-w-md mx-auto mt-4">
                                <label class="text-[13px] bg-white text-[#333] absolute px-2 top-[-10px] left-[18px]">
                                    Téléphone</label>
                          
                                <input type="number" placeholder="Entrez le Téléphone" id="phone" name="phone"
                                  class="pl-4 pr-12 py-3.5 bg-white text-[#333] w-full text-sm border-2 border-gray-300 focus:border-[#333] rounded outline-none" required />
                          
                                
                              </div>
                              <div class="relative flex items-center font-[sans-serif] max-w-md mx-auto mt-4">
                                <label for="address" class="text-[13px] bg-white text-[#333] absolute px-2 top-[-10px] left-[18px]">
                                    Adresse</label>
                          
                                <input type="text" placeholder="Entrez le Adresse" id="address" name="address"
                                  class="pl-4 pr-12 py-3.5 bg-white text-[#333] w-full text-sm border-2 border-gray-300 focus:border-[#333] rounded outline-none" required />
                          
                                
                              </div>
                              <div class="relative flex items-center font-[sans-serif] max-w-md mx-auto mt-4">
                                <label class="text-[13px] bg-white text-[#333] absolute px-2 top-[-10px] left-[18px]">
                                    Présentation</label>
                          
                                <textarea type="text" placeholder="Entrez le Présentation" id="presentation" name="presentation"
                                  class="pl-4 pr-12 py-3.5 bg-white text-[#333] w-full text-sm border-2 border-gray-300 focus:border-[#333] rounded outline-none" required ></textarea>
                          
                                
                              </div>
                              <div class="relative flex items-center font-[sans-serif] max-w-md mx-auto mt-4">
                                <label class="text-[13px] bg-white text-[#333] absolute px-2 top-[-10px] left-[18px]">
                                    Photo</label>
                          
                                <input type="file" placeholder="Entrez le Téléphone" id="photo" name="photo"
                                  class="pl-4 pr-12 py-3.5 bg-white text-[#333] w-full text-sm border-2 border-gray-300 focus:border-[#333] rounded outline-none" required />
                              </div>
                             
                      
                            <div class="text-center">
                                <button type="submit"
        class="px-5 py-2.5 mt-2 rounded-lg text-white text-sm tracking-wider font-medium border border-current outline-none bg-orange-700 hover:bg-orange-800 active:bg-orange-700">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
