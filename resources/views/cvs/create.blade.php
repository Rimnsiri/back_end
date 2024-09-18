{{-- resources/views/cvs/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card justify-content-center">
                    <h1> <strong>Create New CV</strong></h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body d-flex flex-column align-items-center">
                        <form method="POST" action="{{ route('cvs.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row justify-content-center ">
                                <div class="mb-3 form-check">
                                    <input type="radio" class="form-check-input" name="ispublic" value="1" id="publicCV">
                                    <label class="form-check-label" for="publicCV">CV public</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="radio" class="form-check-input" name="ispublic" value="0" id="privateCV">
                                    <label class="form-check-label" for="privateCV">CV privé</label>
                                </div>
                                
                                <div class="mb-5 ">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>

                                <div class="mb-3 ">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="tjm">TJM</label>
                                    <input type="number" class="form-control " id="tjm" name="tjm" required>
                                </div>

                                <div class="mt-7">
                                    <h2>Niveau Développeur</h2>
                                </div>
                                <div class="form-row">
                                    <div class="mb-3">
                                        <label for="niveau"> Niveau de développeur</label>
                                        <select name="niveau" id="niveau" class="form-control">
                                            <option value="">sélectionnez un niveau</option>
                                            <option value="débutant">Débutant</option>
                                            <option value="sénior">Sénior</option>
                                            <option value="expert">Expert</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- Developer selection --}}

                                @if (!request('dev_id'))
                                    <div class="mb-3">
                                        <label for="dev_id">Developer</label>
                                        <select class="form-control" id="dev_id" name="dev_id" required>
                                            <option value="">Select a Developer</option>
                                            @foreach ($devs as $dev)
                                                <option value="{{ $dev->id }}"
                                                    {{ isset($selectedDevId) && $selectedDevId == $dev->id ? 'selected' : '' }}>
                                                    {{ $dev->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <input type="hidden" name="dev_id" value="{{ request('dev_id') }}">
                                @endif

                                {{-- Dynamic Education Section --}}
                                <div class="mt-7">
                                    <h2>Education</h2>
                                </div>

                                <div id="educationSection">
                                    <div class="education-form-group">
                                        <div class="mb-3 ">
                                            <label for="education[0][diplome]" class="form-label">Diploma</label>
                                            <input type="text" class="form-control" name="education[0][diplome]"
                                                required>
                                        </div>
                                        <div class="mb-3 ">
                                            <label for="education[0][école]" class="form-label">School</label>
                                            <input type="text" class="form-control" name="education[0][école]" required>
                                        </div>
                                        <div class="mb-3 ">
                                            <label for="education[0][startdate]" class="form-label">Start Date</label>
                                            <input type="date" class="form-control" name="education[0][startdate]"
                                                required>
                                        </div>
                                        <div class="mb-3 ">
                                            <label for="education[0][enddate]" class="form-label">End Date</label>
                                            <input type="date" class="form-control" name="education[0][enddate]">
                                        </div>
                                        <div class="mb-3">
                                            <label for="education[0][description]" class="form-label">Description</label>
                                            <textarea class="form-control" name="education[0][description]" rows="3" required></textarea>
                                        </div>
                                        <button type="button" class="remove-education btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                </div>
                                <div class=" mt-7">
                                    <button type="button" id="addEducation" class="btn btn-info"><i class="fa-solid fa-plus"></i> Education</button>
                                </div>


                                {{-- Dynamic Experience Section --}}
                                <!-- Dynamic Experience Section -->
                                <div class="mt-7">
                                    <h2>Experience</h2>
                                </div>
                                
                                <div id="experienceSection">
                                    <!-- Expérience 1 -->
                                    <div class="experience-form-group">
                                        <div class="mb-3">
                                            <label for="experience[0][title]" class="form-label">Experience Title</label>
                                            <input type="text" class="form-control" name="experience[0][title]" placeholder="Experience title" >
                                        </div>
                                
                                        <div class="mb-3">
                                            <label for="experience[0][entreprisename]" class="mt-2 form-label">Company Name</label>
                                            <input type="text" class="form-control" name="experience[0][entreprisename]" placeholder="Company name" >
                                        </div>
                                
                                        <div class="mb-3">
                                            <label for="experience[0][startdate]" class="mt-2 form-label">Start Date</label>
                                            <input type="date" class="form-control" name="experience[0][startdate]" >
                                        </div>
                                
                                        <div class="mb-3">
                                            <label for="experience[0][enddate]" class="mt-2 form-label">End Date</label>
                                            <input type="date" class="form-control" name="experience[0][enddate]">
                                        </div>
                                
                                        <div class="mb-3">
                                            <label for="experience[0][description]" class="mt-2 form-label">Description</label>
                                            <textarea class="form-control" name="experience[0][description]" rows="3" placeholder="Description of the experience" ></textarea>
                                        </div>
                                
                                        <button type="button" class="remove-experience btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                </div>
                                
                                <!-- Bouton pour ajouter une nouvelle expérience -->
                                <div class="mt-7">
                                    <button type="button" id="addExperience" class="btn btn-info"><i class="fa-solid fa-plus"></i> Experience</button>
                                </div>
                                


                                {{-- Dynamic Skill Section --}}
                                <div class="mt-7">
                                    <h2>Skills</h2>
                                </div>

                                <div id="skillSection">
                                    <div class="skill-form-group">
                                        <div class="mb-3">
                                            <label for="newSkillName" class="form-label">Skill Name</label>
                                            <select name="newSkillName[]" class="form-control">
                                                <option value="">Select a Skill</option>
                                                @foreach ($skills as $skill)
                                                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3 ">
                                            <label for="newSkillNbrMonth" class="form-label">Number of Months</label>
                                            <input type="number" name="newSkillNbrMonth[]"
                                                placeholder="Number of months" class="form-control">
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="hidden" name="newSkillIsPrincipal[]" value="0"
                                                class="form-control">
                                            <input type="checkbox" name="newSkillIsPrincipal[]" value="1">
                                            <label class="form-check-label" for="newSkillIsPrincipal">Is Principal
                                                Skill?</label>
                                        </div>
                                        <button type="button" class="remove-skill btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                </div>
                                <div class="mt-7">
                                    <button type="button" id="addSkill" class="btn btn-info"><i class="fa-solid fa-plus"></i> Skill</button>
                                </div>

                                <br>
                                {{-- Language Levels Section --}}
                                <div class="mt-7">
                                    <h2>Languages</h2>
                                </div>

                                <div class="form-row">
                                    {{-- French Language Level --}}
                                    <div class="mb-3 ">
                                        <label for="french_level">Niveau de francais</label>
                                        <select class="form-control" id="french_level" name="french_level">
                                            <option value="">Sélectionnez un niveau</option>
                                            <option value="N1">N1 - Débutant</option>
                                            <option value="N2">N2 - Élémentaire</option>
                                            <option value="N3">N3 - Intermédiaire</option>
                                            <option value="N4">N4 - Intermédiaire supérieur</option>
                                            <option value="N5">N5 - Avancé</option>
                                        </select>
                                    </div>

                                    {{-- English Language Level --}}
                                    <div class="mb-3 ">
                                        <label for="english_level">Niveau d'anglais</label>
                                        <select class="form-control" id="english_level" name="english_level">
                                            <option value="">Sélectionnez un niveau</option>
                                            <option value="N1">N1 - Débutant</option>
                                            <option value="N2">N2 - Élémentaire</option>
                                            <option value="N3">N3 - Intermédiaire</option>
                                            <option value="N4">N4 - Intermédiaire supérieur</option>
                                            <option value="N5">N5 - Avancé</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-10 m-b-3 ">
                                    <button type="submit" class="btn btn-primary">Create CV</button>
                                </div>

                            </div>


                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <style>
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
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
