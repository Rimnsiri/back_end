@extends('layouts.app')

@section('content')
<div>
    <div>
        <section class=" dark:bg-gray-900">
            <div class="p-4 mx-auto max-w-screen-2xl md:p-6 2xl:p-10">
                <div class="card-header">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit CV</h2>
                </div>
                <div class="card-body d-flex flex-column align-items-center">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('cvs.update', $cv->id) }}" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-9 sm:grid-cols-2">
                            <div class="flex flex-col gap-9">
                                <div
                                    class="rounded-[5px] border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-9">
                                    <div class="mt-7">
                                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Information
                                            personnelle</h2>
                                    </div>
                                    <div class="grid grid-cols-2 gap-6 mb-3">
                                        <div class="mb-3 form-check">
                                            <input type="radio" class="form-check-input" name="ispublic" value="1"
                                                id="publicCV" {{ $cv->ispublic ? 'checked' : '' }}>
                                            <label class="form-check-label" for="publicCV">CV public</label>
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="radio" class="form-check-input" name="ispublic" value="0"
                                                id="privateCV" {{ !$cv->ispublic ? 'checked' : '' }}>
                                            <label class="form-check-label" for="privateCV">CV privé</label>
                                        </div>
                                        <div class="w-full">
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                                            <input type="text" id="name" name="name" value="{{ $cv->name }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required>
                                        </div>
                                        <div class="w-full">
                                            <label for="firstname"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prénom</label>
                                            <input type="text" id="firstname" value="{{ $cv->firstname }}"
                                                name="firstname"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required>
                                        </div>

                                        <div class="w-full">
                                            <label for="title"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                            <input type="text" id="title" name="title" value="{{ $cv->title }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required>
                                        </div>
                                        <div class="w-full">
                                            <label for="email"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                            <input type="email" id="email" value="{{ $cv->email }}" name="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required>
                                        </div>
                                        <div class="w-full">
                                            <label for="phone"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Téléphone</label>
                                            <input type="number" id="phone" value="{{ $cv->phone }}" name="phone"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required>
                                        </div>
                                        <div class="w-full">
                                            <label for="address"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                            <input type="text" id="address" value="{{ $cv->address }}" name="address"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required>
                                        </div>
                                        <div class="w-full">
                                            <label for="tjm"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">TJM</label>
                                            <input type="number" id="tjm" name="tjm" value="{{ $cv->tjm }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required>
                                        </div>

                                        <div class="w-full">
                                            <div class="mb-3">
                                                <label for="niveau"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Niveau
                                                    Développeur</label>
                                                <select name="niveau" id="niveau"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option value="">Select niveau</option>
                                                    <option value="débutant" {{ $cv->niveau == 'débutant' ? 'selected' :
                                                        '' }}>
                                                        Débutant
                                                    </option>
                                                    <option value="sénior" {{ $cv->niveau == 'sénior' ? 'selected' : ''
                                                        }}>sénior
                                                    </option>
                                                    <option value="expert" {{ $cv->niveau == 'expert' ? 'selected' : ''
                                                        }}>Expert
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <label for="french_level"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Niveau
                                                de français</label>
                                            <select
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                id="french_level" name="french_level">
                                                <option value="">Sélectionnez un niveau</option>
                                                <option value="A1" {{ $cv->french_level == 'A1' ? 'selected' : '' }}>A1
                                                </option>
                                                <option value="A2" {{ $cv->french_level == 'A2' ? 'selected' : '' }}>A2
                                                </option>
                                                <option value="B1" {{ $cv->french_level == 'B1' ? 'selected' : '' }}>B1
                                                </option>
                                                <option value="B2" {{ $cv->french_level == 'B2' ? 'selected' : '' }}>B2
                                                </option>
                                                <option value="C1" {{ $cv->french_level == 'C1' ? 'selected' : '' }}>C1
                                                </option>
                                                <option value="C2" {{ $cv->french_level == 'C2' ? 'selected' : '' }}>C2
                                                </option>
                                            </select>
                                        </div>

                                        {{-- English Level --}}
                                        <div class="w-full">
                                            <label for="english_level"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Niveau
                                                d'anglais</label>
                                            <select
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                id="english_level" name="english_level">
                                                <option value="">Sélectionnez un niveau</option>
                                                <option value="A1" {{ $cv->english_level == 'A1' ? 'selected' : '' }}>A1
                                                </option>
                                                <option value="A2" {{ $cv->english_level == 'A2' ? 'selected' : '' }}>A2
                                                </option>
                                                <option value="B1" {{ $cv->english_level == 'B1' ? 'selected' : '' }}>B1
                                                </option>
                                                <option value="B2" {{ $cv->english_level == 'B2' ? 'selected' : '' }}>B2
                                                </option>
                                                <option value="C1" {{ $cv->english_level == 'C1' ? 'selected' : '' }}>C1
                                                </option>
                                                <option value="C2" {{ $cv->english_level == 'C2' ? 'selected' : '' }}>C2
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            
                                            <label for="photo" class="block mb-2 font-bold text-gray-700">Changer la photo</label>
                                            <input type="file" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-blue-700 hover:file:bg-violet-100" id="photo" name="photo">
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="description"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                            <textarea
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                id="description" name="description"
                                                rows="3">{{ $cv->description }}</textarea>
                                        </div>
                                       

                                        
                                    </div>

                                </div>
                            </div>


                            {{-- Suppose you have a method to get the first experience just for simplification --}}
                            <div class="flex flex-col gap-9">
                                <div
                                    class="rounded-[5px] border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-9">
                                    <div class="mt-7">
                                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white"> Edit
                                            Experience</h2>
                                    </div>
                                    <div id="accordion-color" data-accordion="collapse" data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
                                        @foreach ($cv->experiences as $index => $experience)
                                        <div class="experience-section" id="experience-{{ $experience->id }}">
                                            <h2 id="accordion-color-heading-{{ $experience->id }}" >
                                                <button type="button" class="flex items-center justify-between w-full gap-3 p-3 font-medium text-gray-500 border border-b-0 border-gray-200 rtl:text-right rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800" 
                                                        data-accordion-target="#accordion-color-body-{{ $experience->id }}" 
                                                        aria-expanded="false" 
                                                        aria-controls="accordion-color-body-{{ $experience->id }}"
                                                        >
                                                    <span class="text-sm"> {{ $experience->title }} - {{ $experience->entreprisename }}</span>
                                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                                    </svg>
                                                </button>
                                            </h2>
                                            <div id="accordion-color-body-{{ $experience->id }}" class="hidden" aria-labelledby="accordion-color-heading-{{ $experience->id }}">
                                                <div class="rounded-[5px] border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-9">
                                                    <div class="grid grid-cols-2 gap-6 mb-3">
                                                        <input type="hidden" name="experiences[{{ $experience->id }}][id]" value="{{ $experience->id }}">
                                                        <div class="w-full">
                                                            <label for="experience_title_{{ $experience->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Experience Title</label>
                                                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" id="experience_title_{{ $experience->id }}" name="experiences[{{ $experience->id }}][title]" value="{{ $experience->title }}" placeholder="Experience title">
                                                        </div>
                                                        <div class="w-full">
                                                            <label for="experience_entreprisename_{{ $experience->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company Name</label>
                                                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" id="experience_entreprisename_{{ $experience->id }}" name="experiences[{{ $experience->id }}][entreprisename]" value="{{ $experience->entreprisename }}" placeholder="Company name">
                                                        </div>
                                                        <div class="w-full">
                                                            <label for="startdate_{{ $experience->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date</label>
                                                            <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" id="startdate_{{ $experience->id }}" name="experiences[{{ $experience->id }}][startdate]" value="{{ \Carbon\Carbon::parse($experience->startdate)->format('Y-m-d') }}">
                                                        </div>
                                                        <div class="w-full">
                                                            <label for="enddate_{{ $experience->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date (optional)</label>
                                                            <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" id="enddate_{{ $experience->id }}" name="experiences[{{ $experience->id }}][enddate]" value="{{ $experience->enddate ? \Carbon\Carbon::parse($experience->enddate)->format('Y-m-d') : '' }}">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input ongoing-checkbox" id="experiences[{{ $experience->id }}][is_current]" name="experiences[{{ $experience->id }}][is_current]" {{ $experience->enddate === null ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="experiences[{{ $experience->id }}][is_current]">En Cours</label>
                                                            </div>
                                                        </div>
                                                        <div class="sm:col-span-2">
                                                            <label for="experience_description_{{ $experience->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                                            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" id="experience_description_{{ $experience->id }}" name="experiences[{{ $experience->id }}][description]" rows="3">{{ $experience->description }}</textarea>
                                                        </div>
                                                        <div class="sm:col-span-2">
                                                            <label for="technologies_{{ $experience->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Technologies Utilisées</label>
                                                            <div id="selectedTechnologies_{{ $experience->id }}" class="mb-2">
                                                                @foreach ($experience->skills as $skill)
                                                                    <span class="bg-white badge text-dark me-2" style="border: 1px solid #ccc;">
                                                                        {{ $skill->name }}
                                                                        <span class="ms-1" style="cursor: pointer;" onclick="removeExistingSkill('{{ $experience->id }}', '{{ $skill->id }}')">&times;</span>
                                                                    </span>
                                                                @endforeach
                                                            </div>
                                                            <div class="dropdown">
                                                                <button class=" px-8 py-2.5 bg-blue-500 text-sm text-white hover:bg-blue-600 rounded-sm dropdown-toggle" type="button" id="dropdownMenuButton_{{ $experience->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    Sélectionnez les technologies
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_{{ $experience->id }}" style="max-height: 300px; overflow-y: auto;">
                                                                    <input type="text" id="skillSearch_{{ $experience->id }}" class="form-control" placeholder="Rechercher une technologie" onkeyup="filterSkills('{{ $experience->id }}')">
                                                                    @foreach ($skills->sortBy('name') as $skill)
                                                                        <div class="form-check" style="margin-left: 5px;">
                                                                            <input class="form-check-input" type="checkbox" id="technology_{{ $experience->id }}_{{ $skill->id }}" name="experiences[{{ $experience->id }}][technologies][]" value="{{ $skill->id }}" {{ in_array($skill->id, $experience->skills->pluck('id')->toArray()) ? 'checked' : '' }} onchange="handleSkillSelection('{{ $experience->id }}', '{{ $skill->id }}', '{{ $skill->name }}')">
                                                                            <label class="form-check-label" for="technology_{{ $experience->id }}_{{ $skill->id }}">{{ $skill->name }}</label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn mt-7  remove-experience" data-experience-id="{{ $experience->id }}"> 
                                                          <svg class="w-6 h-6 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                          </svg>
                                                       </button>

                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                           
                                        @endforeach
                                    </div>
                                    

                                    <input type="hidden" name="experiences_to_delete" id="experiences_to_delete">

                                    {{-- Formulaire pour ajouter une nouvelle expérience (initiallement caché) --}}
                                    <div class="experience-form-container" style="display: none;">
                                        <div class="experience-section">
                                            <div
                                                class="rounded-[5px] border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-9">
                                                <div class="mt-7">
                                                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                                                        Nouvelle Expérience</h2>
                                                </div>
                                                <div class="grid grid-cols-2 gap-6 mb-3">

                                                    <div class="w-full">
                                                        <label for="experience_title"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Experience
                                                            Title</label>
                                                        <input type="text" name="new_experience[title]"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="Experience title">
                                                    </div>
                                                    <div class="w-full">
                                                        <label for="experience_entreprisename"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company
                                                            Name</label>
                                                        <input type="text"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            name="new_experience[entreprisename]"
                                                            placeholder="Company name">
                                                    </div>
                                                    <div class="w-full">
                                                        <label for="experience_startdate"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start
                                                            Date</label>
                                                        <input type="date"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            name="new_experience[startdate]">
                                                    </div>
                                                    <div class="w-full">
                                                        <label for="experience_enddate"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End
                                                            Date</label>
                                                        <input type="date"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            name="new_experience[enddate]">
                                                    </div>
                                                    <div class="sm:col-span-2">
                                                        <label for="experience_description"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                                        <textarea
                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            name="new_experience[description]" rows="3"
                                                            placeholder="Description of the experience"></textarea>
                                                    </div>
                                                    <div class="sm:col-span-2">
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
                                                    <button type="button"
                                                        class="btn mt-7  cancel-experience">
                                                          <svg class="w-6 h-6 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                                          </svg>
                                                        </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <button type="button" class="btn   add-experience flex items-center gap-2">
                                      <svg class="w-6 h-6 text-blue-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                      </svg> 
                                      <span class="text-blue-600 dark:text-white">Ajouter Experience</span>
                                    </button>
                                </div>

                            </div>



                            <div class="flex flex-col gap-9">
                                <div
                                    class="rounded-[5px] border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-9">
                                    <div class="mb-3">
                                        {{-- Section des compétences dynamiques --}}
                                        <div class="mt-3">
                                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                                                Compétences</h2>
                                        </div>
                                        <div id="accordion-skills" data-accordion="collapse"
                                            data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
                                            @foreach ($cv->skills as $index => $skill)
                                            <div class="skill-form-group">
                                                <h2 id="accordion-skills-heading-{{ $index }}">
                                                    <button type="button"
                                                        class="flex items-center justify-between w-full gap-3 p-2 font-medium text-gray-500 border border-b-0 border-gray-200 rtl:text-right focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800"
                                                        data-accordion-target="#accordion-skills-body-{{ $index }}"
                                                        aria-expanded="false"
                                                        aria-controls="accordion-skills-body-{{ $index }}">
                                                        <span class="text-sm">{{ $skill->name }}</span>
                                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 10 6">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                                        </svg>
                                                    </button>
                                                </h2>
                                                <div id="accordion-skills-body-{{ $index }}" class="hidden"
                                                    aria-labelledby="accordion-skills-heading-{{ $index }}">
                                                    <div
                                                        class="rounded-[5px] border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-9">
                                                        <div class="grid grid-cols-2 gap-6 mb-3">
                                                            <div class="w-full">
                                                                <label for="skills[{{ $skill->id }}][id]"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom
                                                                    de la compétence</label>
                                                                <select name="skills[{{ $skill->id }}][id]"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    <option value="">Sélectionnez une compétence
                                                                    </option>
                                                                    @foreach ($skills as $skillOption)
                                                                    <option value="{{ $skillOption->id }}" {{ $skillOption->
                                                                        id == $skill->id ? 'selected' : '' }}>
                                                                        {{ $skillOption->name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="w-full">
                                                                <label for="skills[{{ $skill->id }}][nbrmonth]"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                                                                    de mois</label>
                                                                <input type="number"
                                                                    name="skills[{{ $skill->id }}][nbrmonth]"
                                                                    value="{{ $skill->pivot->nbrmonth }}"
                                                                    placeholder="Nombre de mois"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                            </div>
                                                            <div class="w-full">
                                                                <input type="hidden"
                                                                    name="skills[{{ $skill->id }}][isprincipal]" value="0">
                                                                <input type="checkbox"
                                                                    name="skills[{{ $skill->id }}][isprincipal]" value="1"
                                                                    {{ $skill->pivot->isprincipal ? 'checked' : '' }}>
                                                                <label class="form-check-label">Compétence principale
                                                                    ?</label>
                                                            </div>
                                                            <div class="w-full">
                                                                <input type="hidden"
                                                                    name="skills[{{ $skill->id }}][isontop]" value="0">
                                                                <input type="checkbox"
                                                                    name="skills[{{ $skill->id }}][isontop]" value="1" {{
                                                                    $skill->pivot->isontop ? 'checked' : '' }}>
                                                                <label class="form-check-label">Is on top?</label>
                                                            </div>
                                                            <button type="button" class="btn mt-7  remove-skill"
                                                                data-skill-id="{{ $skill->id }}">
                                                                <svg class="w-6 h-6 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                                </svg>
                                                            </button>
                                                        </div>
    
                                                    </div>
                                                </div>
                                            </div> 
                                            @endforeach
                                        </div>
                                    </div>
                                    <input type="hidden" name="skills_to_delete" id="skills_to_delete" value="">

                                    <div class="skill-form-container" style="display: none;">
                                        <div class="skill-section">
                                            <div
                                                class="rounded-[5px] border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-9">
                                                <div class="mt-3">
                                                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                                                        Nouvelle Compétence</h2>
                                                </div>
                                                <div class="grid grid-cols-2 gap-6 mb-3">
                                                    <div class="mb-3">
                                                        <label for="new_skills[0][new_skill_id]"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom
                                                            de la
                                                            compétence</label>
                                                        <select name="new_skills[0][new_skill_id]"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                            <option value="">Sélectionnez une compétence</option>
                                                            @foreach ($skills as $skillOption)
                                                            <option value="{{ $skillOption->id }}">
                                                                {{ $skillOption->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="new_skills[0][nbrmonth]"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                                                            de mois</label>
                                                        <input type="number"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            name="new_skills[0][nbrmonth]" placeholder="Nombre de mois">
                                                    </div>
                                                    <div class="mb-3 form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="new_skills[0][isprincipal]" value="1">
                                                        <label class="form-check-label"
                                                            for="new_skills[0][isprincipal]">Compétence
                                                            principale ?</label>
                                                    </div>
                                                    <div class="mb-3 form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="new_skills[0][isontop]" value="1">
                                                        <label class="form-check-label" for="new_skills[0][isontop]">is
                                                            ontop?</label>
                                                    </div>


                                                    <button type="button" class="btn mt-7  cancel-skill">
                                                        <svg class="w-6 h-6 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                                      </svg>
                                                    </button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>



                                    <button type="button" class="btn add-skill flex items-center gap-2">
                                      <svg class="w-6 h-6 text-blue-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                      </svg>
                                      <span class="text-blue-600 dark:text-white">Ajouter compétence</span>
                                    </button>
                                </div>

                            </div>





                            <div class="flex flex-col gap-9">
                                <div
                                    class="rounded-[5px] border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-9">
                                    <div class="mb-3">
                                        <div class="mt-7">
                                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Education
                                            </h2>
                                        </div>

                                        <div id="accordion-education" data-accordion="collapse"
                                            data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
                                        @foreach ($cv->educations as $index => $education)
                                        <div id="education_section_{{ $education->id }}">
                                            <h2 id="accordion-education-heading-{{ $education->id }}">
                                                <button type="button"
                                                    class="flex items-center justify-between w-full gap-3 p-3 font-medium text-gray-500 border border-b-0 border-gray-200 rtl:text-right focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800"
                                                    data-accordion-target="#accordion-education-body-{{ $index }}"
                                                    aria-expanded="false"
                                                    aria-controls="accordion-education-body-{{ $index }}">
                                                    <span class="text-sm">Diploma: {{ $education->diplome }} -
                                                        {{ $education->école }}</span>
                                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 10 6">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                                    </svg>
                                                </button>
                                            </h2>
                                            <div id="accordion-education-body-{{ $index }}" class="hidden"
                                                aria-labelledby="accordion-education-heading-{{ $index }}">
                                                <div
                                                    class="rounded-[5px] border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-9">
                                                    <div class="grid grid-cols-2 gap-6 mb-3">
                                                        <input type="hidden" name="educations[{{ $index }}][id]"
                                                            value="{{ $education->id }}">
                                                        <div class="w-full">
                                                            <label for="educations[{{ $index }}][diplome]"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diploma</label>
                                                            <input type="text"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                name="educations[{{ $index }}][diplome]"
                                                                value="{{ $education->diplome }}" required>
                                                        </div>

                                                        <div class="w-full">
                                                            <label for="educations[{{ $index }}][école]"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">School</label>
                                                            <input type="text"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                name="educations[{{ $index }}][école]"
                                                                value="{{ $education->école }}" required>
                                                        </div>

                                                        <div class="w-full">
                                                            <label for="educations[{{ $index }}][startdate]"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start
                                                                Date</label>
                                                            <input type="date"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                name="educations[{{ $index }}][startdate]"
                                                                value="{{ \Carbon\Carbon::parse($education->startdate)->format('Y-m-d') }}"
                                                                required>
                                                        </div>

                                                        <div class="w-full">
                                                            <label for="educations[{{ $index }}][enddate]"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End
                                                                Date (optional)</label>
                                                            <input type="date"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                name="educations[{{ $index }}][enddate]"
                                                                value="{{ $education->enddate ? \Carbon\Carbon::parse($education->enddate)->format('Y-m-d') : '' }}">

                                                            <div class="form-check">
                                                                <input type="checkbox"
                                                                    class="form-check-input ongoing-checkbox"
                                                                    id="educations[{{ $index }}][is_current]"
                                                                    name="educations[{{ $index }}][is_current]" {{
                                                                    $education->enddate === null ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="educations[{{ $index }}][is_current]">En
                                                                    Cours</label>
                                                            </div>
                                                        </div>

                                                        <div class="sm:col-span-2">
                                                            <label for="educations[{{ $index }}][description]"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                                            <textarea
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                name="educations[{{ $index }}][description]" rows="5"
                                                                required>{{ $education->description }}</textarea>
                                                        </div>

                                                        <button type="button" class="btn  remove-education"
                                                            data-education-id="{{ $education->id }}">
                                                            <svg class="w-6 h-6 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                            </svg>
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        </div>

                                    </div>
                                    <input type="hidden" name="educations_to_delete" id="educations_to_delete" value="">

                                    <div class="education-form-container" style="display: none;">
                                        <div class="education-section">
                                            <div class="mt-7">
                                                <h2>Nouvelle Éducation</h2>
                                            </div>
                                            <div class="rounded-[5px] border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark p-9">
                                                <div class="grid grid-cols-2 gap-6 mb-3">
                                                    <div class="w-full">
                                                        <label for="diplome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diplôme</label>
                                                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            name="new_educations[0][diplome]" placeholder="Diplôme">
                                                    </div>
                                                    <div class="w-full">
                                                        <label for="ecole" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">École</label>
                                                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="new_educations[0][école]"
                                                            placeholder="École">
                                                    </div>
                                                    <div class="w-full">
                                                        <label for="startdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de début</label>
                                                        <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            name="new_educations[0][startdate]">
                                                    </div>
                                                    <div class="w-full">
                                                        <label for="enddate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de fin
                                                            (optionnel)</label>
                                                        <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            name="new_educations[0][enddate]">
                                                            <input type="hidden" name="education[0][is_current]" value="0">
                                                            <div class="mt-3 form-check">
                                                                <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 ongoing-education" type="checkbox"
                                                                    name="education[0][is_current]" id="is_current_0" value="1">
                                                                <label class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300" for="is_current_0">En cours</label>
                                                            </div>
                                                    </div>
                                                    <div class="sm:col-span-2">
                                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                                        <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="new_educations[0][description]"
                                                            rows="3" placeholder="Description de l'éducation"></textarea>
                                                    </div>
                                                    <!-- Ajoutez un champ caché pour le cv_id si nécessaire -->
                                                    <input type="hidden" name="cv_id" value="{{ $cv->id }}">
                                                    <button type="button" class="btn mt-7  cancel-education ">
                                                    <svg class="w-6 h-6 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                                    </svg>
                                                    
                                                    </button>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>






                                    <button type="button" class="btn  add-education flex items-center gap-2">
                                      <svg class="w-6 h-6 text-blue-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                      </svg> 
                                      <span class="text-blue-600 dark:text-white">Ajouter Education</span>
                                    </button>
                                </div>

                            </div>


                            {{-- Edit Language Levels --}}

                            <div class="mt-7">
                                <button type="submit" class="btn btn-primary">Update CV</button>
                            </div>

                        </div>


                    </form>
                </div>
            </div>
            </sect>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
            const accordionButtons = document.querySelectorAll("[data-accordion-target]");

            accordionButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const targetId = this.getAttribute("data-accordion-target");
                    const target = document.querySelector(targetId);

                    const isExpanded = this.getAttribute("aria-expanded") === "true";
                    this.setAttribute("aria-expanded", !isExpanded);

                    // Toggle visibility
                    if (!isExpanded) {
                        target.classList.remove("hidden");
                    } else {
                        target.classList.add("hidden");
                    }
                    const icon = this.querySelector("[data-accordion-icon]");
                    icon.classList.toggle("rotate-180");
                });
            });
        });
</script>

<script>
    // Fonction pour ajouter une nouvelle compétence
        function addNewSkill() {
            var container = document.querySelector('.skill-form-container');
            var clone = container.cloneNode(true);
            clone.style.display = 'block';
            document.querySelector('.skill-form-container').parentNode.insertBefore(clone, document.querySelector(
                '.skill-form-container').nextSibling);
        }

        // Fonction pour annuler l'ajout d'une nouvelle compétence
        function cancelSkill(event) {
            event.target.closest('.skill-section').remove();
        }

        // Écouteur d'événement pour le bouton d'ajout de compétence
        document.addEventListener('DOMContentLoaded', function() {
            const addButton = document.querySelector('.add-skill');

            addButton.addEventListener('click', function() {
                addNewSkill();
            });
        });

        // Écouteur d'événement pour le bouton "Annuler" du formulaire de compétence cloné
        document.addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('cancel-skill')) {
                cancelSkill(event);
            }
        });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
            const removeButtons = document.querySelectorAll('.remove-skill');

            removeButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const skillId = button.getAttribute('data-skill-id');
                    const skillsToDeleteInput = document.querySelector('#skills_to_delete');
                    const skillsToDelete = skillsToDeleteInput.value.split(',');
                    skillsToDelete.push(skillId);
                    skillsToDeleteInput.value = skillsToDelete.join(',');
                    button.closest('.skill-form-group').remove();
                });
            });
        });
</script>


<script>
   document.addEventListener('DOMContentLoaded', function() {
    // Gestionnaire d'événements pour chaque bouton de suppression d'expérience
    document.querySelectorAll('.remove-experience').forEach(button => {
        button.addEventListener('click', function() {
            // Obtenez l'ID de l'expérience à partir de l'attribut data-experience-id du bouton cliqué
            let experienceId = this.getAttribute('data-experience-id');

            // Récupérez l'élément input caché qui contient les IDs des expériences à supprimer
            let experiencesToDelete = document.getElementById('experiences_to_delete');

            // Ajoutez l'ID de l'expérience à supprimer au champ caché
            if (experiencesToDelete) {
                if (experiencesToDelete.value) {
                    experiencesToDelete.value += ',' + experienceId;
                } else {
                    experiencesToDelete.value = experienceId;
                }
            } else {
                console.error("Element with ID 'experiences_to_delete' not found.");
            }

            // Masquez visuellement la section d'expérience dans l'interface utilisateur
            let experienceSection = document.getElementById('accordion-color-body-' + experienceId);
            let experienceHeader = document.getElementById('accordion-color-heading-' + experienceId); // Nouvellement ajouté

            if (experienceSection) {
                experienceSection.style.display = 'none';
            }

            // Masquez également l'en-tête correspondant
            if (experienceHeader) {
                experienceHeader.style.display = 'none'; 
            }
        });
    });
});

</script>

<script>
    // Fonction pour supprimer une éducation
        function removeEducation(educationId) {
            // Ajoutez l'ID de l'éducation à supprimer à la liste des éducations à supprimer
            var educationsToDelete = document.getElementById('educations_to_delete');
            var value = educationsToDelete.value;
            if (value !== '') {
                value += ',' + educationId;
            } else {
                value = educationId;
            }
            educationsToDelete.value = value;

            // Supprimez la section d'éducation du DOM
            var educationSection = document.getElementById('education_section_' + educationId);
    if (educationSection) {
        educationSection.parentNode.removeChild(educationSection);
    }
        }

        // Écouteur d'événement pour le bouton de suppression d'éducation
        document.addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('remove-education')) {
                var educationId = event.target.getAttribute('data-education-id');
                removeEducation(educationId);
            }
        });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
            const addButton = document.querySelector('.add-experience');

            addButton.addEventListener('click', function() {
                const experienceFormContainer = document.querySelector('.experience-form-container');
                const newExperienceForm = experienceFormContainer.cloneNode(
                    true); // Clone le conteneur du formulaire
                newExperienceForm.style.display = 'block'; // Rend le formulaire cloné visible

                // Réinitialisez les valeurs des champs de formulaire dans le formulaire cloné
                newExperienceForm.querySelectorAll('input, textarea, select').forEach(function(input) {
                    if (input.type !== 'checkbox') {
                        input.value = ''; // Réinitialiser les champs texte
                    } else {
                        input.checked = false; // Décocher les cases à cocher
                    }
                    if (input.required) {
                        input.removeAttribute(
                            'required'
                        ); // Retirer l'attribut 'required' pour éviter l'erreur de formulaire non focusable
                    }
                });

                // Générez un nouvel index pour les champs du nouveau formulaire
                const newIndex = document.querySelectorAll('.experience-section').length;

                // Mettez à jour les attributs 'name' et 'id' et l'attribut 'for' des labels dans le formulaire cloné
                newExperienceForm.querySelectorAll('input, textarea, select, label').forEach(function(el) {
                    if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA' || el.tagName ===
                        'SELECT') {
                        const nameAttribute = el.name.replace(/\[\d+\]/, '[' + newIndex + ']');
                        el.name = nameAttribute;
                        // Si l'élément a un attribut 'id', mettez-le également à jour
                        if (el.id) {
                            const newId = el.id.replace(/_\d+/, '_' + newIndex);
                            el.id = newId;
                        }
                    } else if (el.tagName === 'LABEL' && el.htmlFor) {
                        const newForAttribute = el.htmlFor.replace(/_\d+/, '_' + newIndex);
                        el.htmlFor = newForAttribute;
                    }
                });

                // Insérez le nouveau formulaire cloné avant le bouton "Ajouter Expérience"
                addButton.before(newExperienceForm);

                // Ajoutez un gestionnaire d'événements pour le bouton "Annuler" du nouveau formulaire
                const cancelButton = newExperienceForm.querySelector('.cancel-experience');
                cancelButton.addEventListener('click', function() {
                    newExperienceForm.remove(); // Supprime le formulaire cloné du DOM
                });
            });
        });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
            const addEducationButton = document.querySelector('.add-education');

            addEducationButton.addEventListener('click', function() {
                const educationFormContainer = document.querySelector('.education-form-container');
                const newEducationForm = educationFormContainer.cloneNode(true);
                newEducationForm.style.display = 'block';

                const newIndex = document.querySelectorAll('.education-section').length;

                newEducationForm.querySelectorAll('input, textarea, select').forEach(function(input) {
                    if (input.type !== 'checkbox') {
                        input.value = '';
                    } else {
                        input.checked = false;
                    }
                    if (input.required) {
                        input.removeAttribute('required');
                    }
                });

                newEducationForm.querySelectorAll('input, textarea, select, label').forEach(function(el) {
                    if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA' || el.tagName ===
                        'SELECT') {
                        const nameAttribute = el.name.replace(/\[\d+\]/, '[' + newIndex + ']');
                        el.name = nameAttribute;
                        if (el.id) {
                            const newId = el.id.replace(/_\d+/, '_' + newIndex);
                            el.id = newId;
                        }
                    } else if (el.tagName === 'LABEL' && el.htmlFor) {
                        const newForAttribute = el.htmlFor.replace(/_\d+/, '_' + newIndex);
                        el.htmlFor = newForAttribute;
                    }
                });

                addEducationButton.before(newEducationForm);

                const cancelEducationButton = newEducationForm.querySelector('.cancel-education');
                cancelEducationButton.addEventListener('click', function() {
                    newEducationForm.remove();
                });
            });
        });
</script>

<script>
    function toggleEndDate(experienceId) {
            var endDateInput = document.getElementById('enddate_' + experienceId);
            var enCoursCheckbox = document.getElementById('en_cours_' + experienceId);

            if (enCoursCheckbox.checked) {
                endDateInput.disabled = true;
                endDateInput.value = ''; // Effacer la valeur de la date de fin si "En cours" est sélectionné
            } else {
                endDateInput.disabled = false;
            }
        }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
            var dropdownToggle = document.getElementById('dropdownMenuButton');
            var dropdownMenu = document.querySelector('.dropdown-menu');

            dropdownToggle.addEventListener('click', function() {
                dropdownMenu.classList.toggle('show');
            });

            // Ferme la dropdown si on clique en dehors
            window.addEventListener('click', function(e) {
                if (!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        });
</script>
<script>
    let selectedSkills = [];

        // Gérer la sélection ou la désélection de technologies dans le dropdown
        function handleSkillSelection(experienceId, skillId, skillName) {
            const checkbox = document.getElementById('technology_' + experienceId + '_' + skillId);

            if (checkbox.checked) {
                // Ajouter la technologie à la liste si elle est cochée
                selectedSkills.push({
                    id: skillId,
                    name: skillName
                });
            } else {
                // Retirer la technologie de la liste si elle est décochée
                selectedSkills = selectedSkills.filter(skill => skill.id !== skillId);
            }

            updateButtonLabel(experienceId);
        }

        // Met à jour le label du bouton avec les technologies sélectionnées
        function updateButtonLabel(experienceId) {
            const button = document.getElementById('dropdownMenuButton_' + experienceId);
            button.innerHTML = ''; // Effacer le contenu précédent

            if (selectedSkills.length > 0) {
                // Crée les badges pour les technologies sélectionnées
                selectedSkills.forEach(skill => {
                    const skillBadge = document.createElement('span');
                    skillBadge.className = 'badge bg-white text-dark me-2'; // Classes Bootstrap pour style
                    skillBadge.style.border = "1px solid #ccc"; // Ajout d'une bordure
                    skillBadge.innerHTML =
                        `${skill.name} <span class="ms-1" style="cursor: pointer;" onclick="removeSkill('${experienceId}', '${skill.id}')">&times;</span>`;

                    button.appendChild(skillBadge);
                });
            } else {
                // Si aucune technologie n'est sélectionnée, remettre le texte par défaut
                button.innerHTML = 'Sélectionnez les technologies';
            }
        }

        // Fonction pour retirer une technologie en cliquant sur le "x"
        function removeSkill(experienceId, skillId) {
            // Décoche la case correspondante
            document.getElementById('technology_' + experienceId + '_' + skillId).checked = false;

            // Supprime la technologie de la liste
            selectedSkills = selectedSkills.filter(skill => skill.id !== skillId);

            // Met à jour l'affichage
            updateButtonLabel(experienceId);
        }

        // Fonction pour retirer une technologie déjà enregistrée (existante dans la base de données)
        function removeExistingSkill(experienceId, skillId) {
            // Décoche la case correspondante
            document.getElementById('technology_' + experienceId + '_' + skillId).checked = false;

            // Supprimer visuellement la technologie de la liste affichée initialement
            const selectedDiv = document.getElementById('selectedTechnologies_' + experienceId);
            const skillBadge = selectedDiv.querySelector(
                `span[onclick="removeExistingSkill('${experienceId}', '${skillId}')"]`).parentElement;
            selectedDiv.removeChild(skillBadge);
        }

        // Fonction pour filtrer les technologies dans le dropdown
        function filterSkills(experienceId) {
            const searchValue = document.getElementById('skillSearch_' + experienceId).value.toLowerCase();
            const dropdownMenu = document.querySelector('#dropdownMenuButton_' + experienceId)
                .nextElementSibling; // Trouve le dropdown associé
            const options = dropdownMenu.querySelectorAll(
                '.form-check'); // Sélectionne tous les éléments form-check dans ce dropdown

            options.forEach(option => {
                const label = option.querySelector('label').textContent.toLowerCase();
                if (label.includes(searchValue)) {
                    option.style.display = ''; // Affiche l'option
                } else {
                    option.style.display = 'none'; // Cache l'option
                }
            });
        }
</script>

<style>
    .dropdown-menu {
        max-height: 200px;
        overflow-y: auto;
        display: none;
    }

    .dropdown-menu.show {
        display: block;
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

    }

    /* Personnaliser les titres des sections */
    h2 {
        font-size: 1.5rem;
        color: #E8751A;
        font-weight: normal;
        margin-bottom: 20px;
    }
</style>
@endsection