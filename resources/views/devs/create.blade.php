{{-- resources/views/cvs/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <section class="mt-4 dark:bg-gray-900">
        <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
            <div class="p-0 bg-white block sm:flex items-center justify-between  lg:mt-1.5">
                <div class="w-full mb-1">
                    <div class="mb-4">
                        <nav class="flex mb-5" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                            <li class="inline-flex items-center">
                                <a href="/dashboard" class="inline-flex items-center text-gray-700 hover:text-gray-900">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                Home
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <a href="{{ route('devs.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2">Développeurs</a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2">Ajouter un développeur</a>
                                </div>
                            </li>
                            </ol>
                        </nav>
                    </div>
                    
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <form method="POST" action="{{ route('devs.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-9 sm:grid-cols-2">
                        <div class="flex flex-col gap-9">
                            <div
                                class="rounded-[5px] border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-9">
                                <div class="mt-7">
                                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Information personnelle</h2>
                                </div>
                                <div class="grid grid-cols-2 gap-6 mb-3">
                                    <div class="w-full">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo</label>
                                            <input type="file" placeholder="Entrez le Téléphone" id="photo"
                                            name="photo"
                                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-blue-700 hover:file:bg-violet-100 "
                                            required />
                                    </div><br>
                                    <div class="mb-3 form-check">
                                        <input type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="ispublic" value="1"
                                            id="publicCV">
                                        <label class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300" for="publicCV">CV public</label>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" name="ispublic" value="0"
                                            id="privateCV">
                                        <label class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300" for="privateCV">CV privé</label>
                                    </div>
                                    <div class="w-full ">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                                        <input type="text" id="name" name="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required>
                                    </div>
                                    <div class="w-full">
                                        <label for="firstname"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prénom</label>
                                        <input type="text" id="firstname" name="firstname"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required>
                                    </div>
                                    <div class="w-full">
                                        <label for="title"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                        <input type="text" id="title" name="title"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required>
                                    </div>
    
                                    <div class="w-full">
                                        <label for="email"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                        <input type="email" id="email" name="email"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required>
                                    </div>
                                    <div class="w-full">
                                        <label for="phone"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Téléphone</label>
                                        <input type="number" id="phone" name="phone"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required>
                                    </div>
                                    <div class="w-full">
                                        <label for="address"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                        <input type="text" id="address" name="address"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required>
                                    </div>
                                    <div class="w-full">
                                        <label for="tjm"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TJM</label>
                                        <input type="number"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            id="tjm" name="tjm" required>
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="niveau"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Niveau</label>
                                        <select name="niveau" id="niveau"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option value="">sélectionnez un niveau</option>
                                            <option value="débutant">Débutant</option>
                                            <option value="sénior">Sénior</option>
                                            <option value="expert">Expert</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="french_level"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Niveau de
                                            francais</label>
                                        <select
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            id="french_level" name="french_level">
                                            <option value="">Sélectionnez un niveau</option>
                                            <option value="A1">A1 </option>
                                            <option value="A2">A2 </option>
                                            <option value="B1">B1 </option>
                                            <option value="B2">B2 </option>
                                            <option value="C1">C1 </option>
                                            <option value="C2">C2 </option>
                                        </select>
                                    </div>
                                    <div class="mb-3 ">
                                        <label for="english_level"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Niveau
                                            d'anglais</label>
                                        <select
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            id="english_level" name="english_level">
                                            <option value="">Sélectionnez un niveau</option>
                                            <option value="A1">A1 </option>
                                            <option value="A2">A2 </option>
                                            <option value="B1">B1 </option>
                                            <option value="B2">B2 </option>
                                            <option value="C1">C1 </option>
                                            <option value="C2">C2 </option>
                                        </select>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="description"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                        <textarea rows="5"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            id="description" name="description"></textarea>
                                    </div>
                        
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" name="isontop" value="1"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Is On Top</label>
                                    </div>
                            
                                
                                </div>
                            </div>

                        </div>



                        <div class="flex flex-col gap-9">
                            <div
                                class="rounded-[5px] border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-9">
                                    <div class="mt-7">
                                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Education</h2>
                                    </div>
                                    <div id="educationSection">
                                        <div class="education-form-group">
                                            <div class="grid grid-cols-2 gap-6 mb-3">
                                                <div>
                                                    <label for="education[0][diplome]"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diploma</label>
                                                    <input type="text"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        name="education[0][diplome]" required>
                                                </div>
                                                <div>
                                                    <label for="education[0][école]"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">School</label>
                                                    <input type="text"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        name="education[0][école]" required>
                                                </div>
                                                <div class="w-full">
                                                    <label for="education[0][startdate]"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start
                                                        Date</label>
                                                    <input type="date"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        name="education[0][startdate]" required>
                                                </div>
                                                <div class="w-full">
                                                    <label for="education[0][enddate]"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End
                                                        Date</label>
                                                    <input type="date"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        name="education[0][enddate]">
        
                                                    <input type="hidden" name="education[0][is_current]" value="0">
                                                    <div class="mt-3 form-check">
                                                        <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 ongoing-education" type="checkbox"
                                                            name="education[0][is_current]" id="is_current_0" value="1">
                                                        <label class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300" for="is_current_0">En cours</label>
                                                    </div>
                                                </div>
                                                <div class="sm:col-span-2">
                                                    <label for="education[0][description]" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                                    
                                                    <!-- Conteneur pour l'éditeur Quill -->
                                                    <div id="quill-editor-education-0" class="quill-editor-container"></div>
                                                    
                                                    <!-- Champ caché pour stocker la valeur de l'éditeur Quill -->
                                                    <input type="hidden" name="education[0][description]" id="quill-input-education-0" required>
                                                </div>
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        // Récupérer le conteneur de l'éditeur et le champ caché
                                                        const editorContainer = document.getElementById('quill-editor-education-0');
                                                        const hiddenInput = document.getElementById('quill-input-education-0');
                                                
                                                        if (editorContainer && hiddenInput) {
                                                            // Initialiser Quill
                                                            const quill = new Quill(editorContainer, {
                                                                theme: 'snow',
                                                                modules: {
                                                                    toolbar: [
                                                                        ['bold', 'italic', 'underline'],
                                                                        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                                                                        [{ 'header': [1, 2, 3, false] }],
                                                                        ['link', 'image']
                                                                    ]
                                                                }
                                                            });
                                                
                                                            // Synchroniser le contenu de Quill avec le champ caché à chaque modification
                                                            quill.on('text-change', function() {
                                                                hiddenInput.value = quill.root.innerHTML;
                                                            });
                                                        } else {
                                                            console.error("Impossible de trouver l'éditeur Quill ou le champ caché pour 'description'.");
                                                        }
                                                    });
                                                </script>
                                                <button type="button" class="remove-education btn mt-7">
                                                  <svg class="w-6 h-6 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                                  </svg>
                                                </button>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <div class="mt-11">
                                        <button type="button" id="addEducation"
                                            class="flex items-center gap-2 text-center">
                                            <svg class="w-6 h-6 text-blue-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                              </svg> 
                                              <span class="text-blue-600 dark:text-white">Ajouter Education</span>
                                            </button>
                                    </div>
                              
                            </div>

                        </div>



                        
                        <div
                            class="rounded-[5px] border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-9">
                            <div class="mt-7">
                                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Experience</h2>
                            </div>

                            <div id="experienceSection">
                                <!-- Expérience 1 -->
                                <div class="experience-form-group">
                                    <div class="grid grid-cols-2 gap-6 mb-3">
                                        <div class="w-full">
                                            <label for="experience[0][title]"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Experience
                                                Title</label>
                                            <input type="text"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                name="experience[0][title]" placeholder="Experience title">
                                        </div>
    
                                        <div class="w-full">
                                            <label for="experience[0][entreprisename]"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company
                                                Name</label>
                                            <input type="text"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                name="experience[0][entreprisename]" placeholder="Company name">
                                        </div>
    
                                        <div class="w-full">
                                            <label for="experience[0][startdate]"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start
                                                Date</label>
                                            <input type="date"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                name="experience[0][startdate]">
                                        </div>
    
                                        <div class="w-full">
                                            <label for="experience[0][enddate]"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End
                                                Date</label>
                                            <input type="date"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                name="experience[0][enddate]">
    
                                            <input type="hidden" name="experience[0][is_current]" value="0">
                                            <div class="mt-3 form-check">
                                                <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 ongoing-experience" type="checkbox"
                                                    name="experience[0][is_current]" id="is_current_0" value="1">
                                                <label class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300" for="is_current_0">En cours</label>
                                            </div>
    
    
                                        </div>
    
                                        <div class="sm:col-span-2">
                                            <label for="experience[0][description]" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                            <div id="quill-editor-experience-0" class="quill-editor-container"></div>
                                            <input type="hidden" name="experience[0][description]" id="quill-input-experience-0" required>
                                        </div>
                                      
                                        <div class="mb-3">
                                            <label for="experience[0][skills]"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Technologies
                                                utilisées</label>
                                            <div class="dropdown">
                                                <button class=" px-8 py-2.5 bg-blue-500 text-sm text-white hover:bg-blue-600 rounded-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Sélectionnez les technologies
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                                    style="max-height: 300px; overflow-y: auto;">
                                                    <input type="text" id="skillSearch" class="form-control"
                                                        placeholder="Rechercher une technologie" onkeyup="filterSkills()">
                                                    @foreach ($skills->sortBy('name') as $skill)
                                                        <div class="form-check" style="margin-left: 5px;">
                                                            <input class="form-check-input skill-checkbox" type="checkbox"
                                                                name="experience[0][skills][]" value="{{ $skill->id }}"
                                                                id="skill-{{ $skill->id }}"
                                                                onchange="handleSkillSelection('{{ $skill->id }}', '{{ $skill->name }}')">
                                                            <label class="form-check-label" for="skill-{{ $skill->id }}">
                                                                {{ $skill->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
    
    
    
    
    
                                        <button type="button" class="remove-experience btn ">
                                             <svg class="w-6 h-6 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                          </svg>
                                        </button>
                                    </div>
                                  
                                </div>
                            </div>

                            <!-- Bouton pour ajouter une nouvelle expérience -->
                            <div class="mt-3">
                                <button type="button" id="addExperience" class="flex items-center gap-2 btn">
                                    <svg class="w-6 h-6 text-blue-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                  </svg> 
                                  <span class="text-blue-600 dark:text-white">Ajouter Experience</span></button>
                            </div>
                        </div>



                        <div
                            class="rounded-[5px] border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-9">
                            <div class="mt-7">
                                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Compétences</h2>
                            </div>

                            <div id="skillSection">
                                <div class="skill-form-group">
                                    <div class="grid grid-cols-2 gap-6 mb-3">
                                        <div class="mb-3">
                                            <label for="newSkillName"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                                            <select name="newSkillName[]"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option value="">Sélectionnez une compétence</option>
                                                @foreach ($skills as $skill)
                                                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
    
                                        <div class="mb-3 ">
                                            <label for="newSkillNbrMonth"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de mois</label>
                                            <input type="number" name="newSkillNbrMonth[]" placeholder="Number of months"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="hidden" name="newSkillIsPrincipal[]" value="0">
                                            <input type="checkbox" name="newSkillIsPrincipal[]" value="1"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300" for="newSkillIsPrincipal">principal?</label>
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" name="newSkillIsontop[]" value="1"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Is On Top</label>
                                        </div>
    
    
                                        <button type="button" class="remove-skill btn">
                                            <svg class="w-6 h-6 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                          </svg>
                                        </button>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="mt-7">
                                <button type="button" id="addSkill" class="flex items-center gap-2 btn">
                                    <svg class="w-6 h-6 text-blue-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                  </svg> 
                                  <span class="text-blue-600 dark:text-white">Ajouter Compétance</span></button></button>
                            </div>
                        </div>
                      

                        <div class="mt-10 m-b-3 ">
                            <button type="submit"
                                class="!mt-8 px-8 py-2.5 bg-blue-500 text-sm text-white hover:bg-blue-600 rounded-sm">Create
                                CV</button>
                        </div>

                    </div>


                </form>
            </div>

        </div>

    </section>




    <style>
        .badge {
            background-color: white;
            border-radius: 10px;
            padding: 5px 10px;
            display: inline-flex;
            align-items: center;
            margin: 2px;
            border: 1px solid #ccc;
        }

        .badge .ms-1 {
            color: red;
            margin-left: 5px;
            cursor: pointer;
        }

        .badge:hover .ms-1 {
            color: darkred;
        }

        .container {
            justify-items: center;
            display: flex;
            flex-direction: column;
            /* Stack children vertically */
            justify-content: center;
            /* Center vertically */

            max-width: 80%;
            /* Adjust the width as needed */
            margin: auto;
            /* Center the container horizontally */
        }

        .row {
            min-height: 100vh;
            /* Utilisez 100% de la hauteur de la vue */
            align-items: center;
            /* Centrage vertical des éléments de la rangée */
        }

        /* Réduire la hauteur des inputs et des selects */
        .form-control {
            width: 500px;

        }

        /* Personnaliser les boutons pour qu'ils soient plus fins */
        .btn-info,
        .btn-danger,
        .btn-primary {
            padding: 5px 15px;
            font-size: 0.875rem;
            color: #1D24CA;
        }

        /* Personnaliser les titres des sections */
        h2 {
            font-size: 1.5rem;
            color: #E8751A;
            font-weight: normal;
            margin-bottom: 20px;
        }

        /* Cacher le bouton Remove pour le premier groupe de formulaire */
        .remove-education,
        .remove-experience,
        .remove-skill {
            display: none;
            /* Cache par défaut */
        }

        /* Afficher le bouton Remove pour les groupes ajoutés dynamiquement */
        /* Vous devez ajouter une classe spécifique aux groupes ajoutés dynamiquement, ici 'dynamic-form-group' */
        .dynamic-form-group .remove-education,
        .dynamic-form-group .remove-experience,
        .dynamic-form-group .remove-skill {
            display: inline-block;
            /* Afficher quand un groupe de formulaire est ajouté */
        }

        .dropdown-menu {
            max-height: 200px;
            /* Limite la hauteur de la dropdown */
            overflow-y: auto;
            /* Ajoute un défilement si nécessaire */
            display: none;
            /* Masque le menu par défaut */
        }

        .dropdown-menu.show {
            display: block;
            /* Affiche le menu lorsque la classe "show" est ajoutée */
        }
        .quill-editor-container {
    height: 150px; /* Ajustez cette valeur selon vos besoins */
}
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
