@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit CV</h1>
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

                            <div class="mb-3 form-check">
                                <input type="radio" class="form-check-input" name="ispublic" value="1" id="publicCV" {{ $cv->ispublic ? 'checked' : '' }}>
                                <label class="form-check-label" for="publicCV">CV public</label>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="radio" class="form-check-input" name="ispublic" value="0" id="privateCV" {{ !$cv->ispublic ? 'checked' : '' }}>
                                <label class="form-check-label" for="privateCV">CV privé</label>
                            </div>
                            
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $cv->title }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ $cv->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tjm">TJM</label>
                                <input type="number" class="form-control " id="tjm" name="tjm"
                                    value="{{ $cv->tjm }}" required>
                            </div>

                            <div class="mb-3">
                                <div class="mt-7">
                                    <h2>
                                        Edit Niveau Développeur
                                    </h2>
                                </div>
                                <div class="mb-3">
                                    <label for="niveau" class="form-label">Niveau Développeur</label>
                                    <select name="niveau" id="niveau" class="form-control">
                                        <option value="">Select niveau</option>
                                        <option value="débutant" {{ $cv->niveau == 'débutant' ? 'selected' : '' }}>Débutant
                                        </option>
                                        <option value="sénior" {{ $cv->niveau == 'sénior' ? 'selected' : '' }}>sénior
                                        </option>
                                        <option value="expert" {{ $cv->niveau == 'expert' ? 'selected' : '' }}>Expert
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="dev_id" class="form-label">Developer</label>
                                <select class="form-control" id="dev_id" name="dev_id" required>
                                    <option value="">Select a Developer</option>
                                    @foreach ($devs as $dev)
                                        <option value="{{ $dev->id }}" {{ $cv->dev_id == $dev->id ? 'selected' : '' }}>
                                            {{ $dev->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Suppose you have a method to get the first experience just for simplification --}}

                            @foreach ($cv->experiences as $index => $experience)
                                <div class="experience-section" id="experience_section_{{ $experience->id }}">
                                    <input type="hidden" name="experiences[{{ $experience->id }}][id]"
                                        value="{{ $experience->id }}">
                                    {{-- Autres champs d'expérience --}}
                                    <div class="mt-7">
                                        <h2> Edit Experience</h2>
                                    </div>
                                    <div class="mb-3">
                                        <label for="experience_title_{{ $experience->id }}" class="form-label">Experience
                                            Title</label>
                                        <input type="text" class="form-control"
                                            id="experience_title_{{ $experience->id }}"
                                            name="experiences[{{ $experience->id }}][title]"
                                            value="{{ $experience->title }}" placeholder="Experience title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="experience_entreprisename_{{ $experience->id }}"
                                            class="form-label">Company Name</label>
                                        <input type="text" class="form-control"
                                            id="experience_entreprisename_{{ $experience->id }}"
                                            name="experiences[{{ $experience->id }}][entreprisename]"
                                            value="{{ $experience->entreprisename }}" placeholder="Company name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="startdate_{{ $experience->id }}" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="startdate_{{ $experience->id }}"
                                            name="experiences[{{ $experience->id }}][startdate]"
                                            value="{{ \Carbon\Carbon::parse($experience->startdate)->format('Y-m-d') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="enddate_{{ $experience->id }}" class="form-label">End Date</label>
                                        <input type="date" class="form-control" id="enddate_{{ $experience->id }}"
                                            name="experiences[{{ $experience->id }}][enddate]"
                                            value="{{ \Carbon\Carbon::parse($experience->enddate)->format('Y-m-d') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="experience_description_{{ $experience->id }}"
                                            class="form-label">Description</label>
                                        <textarea class="form-control" id="experience_description_{{ $experience->id }}"
                                            name="experiences[{{ $experience->id }}][description]" rows="3">{{ $experience->description }}</textarea>
                                    </div>
                                    
                                  

                                    {{-- Bouton de suppression pour l'expérience --}}
                                    <button type="button" class="btn mt-7 btn-danger remove-experience"
                                        data-experience-id="{{ $experience->id }}"><i class="fa-solid fa-trash"></i></button>

                                </div>
                            @endforeach
                            <input type="hidden" name="experiences_to_delete" id="experiences_to_delete">

                            {{-- Formulaire pour ajouter une nouvelle expérience (initiallement caché) --}}
                            <div class="experience-form-container" style="display: none;">
                                <div class="experience-section">
                                    <div class="mt-7">
                                        <h2>Nouvelle Expérience</h2>
                                    </div>
                                    <div class="mb-3">
                                        <label for="experience_title" class="form-label">Experience Title</label>
                                        <input type="text" class="form-control" name="new_experience[title]"
                                            placeholder="Experience title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="experience_entreprisename" class="mt-2 form-label">Company
                                            Name</label>
                                        <input type="text" class="form-control" name="new_experience[entreprisename]"
                                            placeholder="Company name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="experience_startdate" class="mt-2 form-label">Start Date</label>
                                        <input type="date" class="form-control" name="new_experience[startdate]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="experience_enddate" class="mt-2 form-label">End Date</label>
                                        <input type="date" class="form-control" name="new_experience[enddate]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="experience_description" class="mt-2 form-label">Description</label>
                                        <textarea class="form-control" name="new_experience[description]" rows="3"
                                            placeholder="Description of the experience"></textarea>
                                    </div>

                                    <button type="button" class="btn mt-7 btn-danger cancel-experience"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                            </div>


                            <button type="button" class="btn mt-7 btn-primary add-experience"><i class="fa-solid fa-plus"></i> Expérience</button>
                            <div class="mb-3">
                                {{-- Section des compétences dynamiques --}}
                                <div class="mt-3">
                                    <h2>Compétences</h2>
                                </div>
                                @foreach ($cv->skills as $skill)
                                    <div class="skill-form-group" id="skill_section_{{ $skill->id }}">
                                        <div class="skill-form-group">
                                            <div class="mb-3">
                                                <label for="skills[{{ $skill->id }}][id]" class="form-label">Nom de la
                                                    compétence</label>
                                                <select name="skills[{{ $skill->id }}][id]" class="form-control">
                                                    <option value="">Sélectionnez une compétence</option>
                                                    @foreach ($skills as $skillOption)
                                                        <option value="{{ $skillOption->id }}"
                                                            {{ $skillOption->id == $skill->id ? 'selected' : '' }}>
                                                            {{ $skillOption->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="skills[{{ $skill->id }}][nbrmonth]"
                                                    class="form-label">Nombre de mois</label>
                                                <input type="number" name="skills[{{ $skill->id }}][nbrmonth]"
                                                    value="{{ $skill->pivot->nbrmonth }}" placeholder="Nombre de mois"
                                                    class="form-control">
                                            </div>
                                            <div class="mb-3 form-check">
                                                <input type="hidden" name="skills[{{ $skill->id }}][isprincipal]"
                                                    value="0">
                                                <input type="checkbox" name="skills[{{ $skill->id }}][isprincipal]"
                                                    value="1" {{ $skill->pivot->isprincipal ? 'checked' : '' }}>
                                                <label class="form-check-label">Compétence principale ?</label>
                                            </div>
                                            <button type="button" class="btn mt-7 btn-danger remove-skill"
                                                data-skill-id="{{ $skill->id }}"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <input type="hidden" name="skills_to_delete" id="skills_to_delete" value="">


                            <!-- Formulaire caché pour une nouvelle compétence -->
                            <!-- Formulaire caché pour une nouvelle compétence -->
                            <div class="skill-form-container" style="display: none;">
                                <div class="skill-section">
                                    <div class="mt-3">
                                        <h2>Nouvelle Compétence</h2>
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_skills[0][new_skill_id]" class="form-label">Nom de la
                                            compétence</label>
                                        <select name="new_skills[0][new_skill_id]" class="form-control">
                                            <option value="">Sélectionnez une compétence</option>
                                            @foreach ($skills as $skillOption)
                                                <option value="{{ $skillOption->id }}">{{ $skillOption->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_skills[0][nbrmonth]" class="form-label">Nombre de mois</label>
                                        <input type="number" class="form-control" name="new_skills[0][nbrmonth]"
                                            placeholder="Nombre de mois">
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" name="new_skills[0][isprincipal]"
                                            value="1">
                                        <label class="form-check-label" for="new_skills[0][isprincipal]">Compétence
                                            principale ?</label>
                                    </div>
                                    <button type="button" class="btn mt-7 btn-danger cancel-skill"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                            </div>



                            <button type="button" class="btn btn-primary add-skill"><i class="fa-solid fa-plus"></i> Compétence</button>




                            <div class="mb-3">
                                <div class="mt-7">
                                    <h2>Education</h2>
                                </div>
                                @foreach ($cv->educations as $index => $education)
                                    <div class="education-section" id="education_section_{{ $education->id }}">
                                        <input type="hidden" name="educations[{{ $index }}][id]"
                                            value="{{ $education->id }}">

                                        <label for="educations[{{ $index }}][diplome]"
                                            class="form-label">Diploma</label>
                                        <input type="text" class="form-control"
                                            name="educations[{{ $index }}][diplome]"
                                            value="{{ $education->diplome }}" required>

                                        <label for="educations[{{ $index }}][école]"
                                            class="form-label">School</label>
                                        <input type="text" class="form-control"
                                            name="educations[{{ $index }}][école]"
                                            value="{{ $education->école }}" required>

                                        <label for="educations[{{ $index }}][startdate]" class="form-label">Start
                                            Date</label>
                                        <input type="date" class="form-control"
                                            name="educations[{{ $index }}][startdate]"
                                            value="{{ \Carbon\Carbon::parse($education->startdate)->format('Y-m-d') }}"
                                            required>

                                        <label for="educations[{{ $index }}][enddate]" class="form-label">End Date
                                            (optional)
                                        </label>
                                        <input type="date" class="form-control"
                                            name="educations[{{ $index }}][enddate]"
                                            value="{{ \Carbon\Carbon::parse($education->enddate)->format('Y-m-d') }}">

                                        <label for="educations[{{ $index }}][description]"
                                            class="form-label">Description</label>
                                        <textarea class="form-control" name="educations[{{ $index }}][description]" rows="3" required>{{ $education->description }}</textarea>
                                        <button type="button" class="btn btn-danger remove-education"
                                            data-education-id="{{ $education->id }}"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                @endforeach
                            </div>
                            <input type="hidden" name="educations_to_delete" id="educations_to_delete" value="">

                            <div class="education-form-container" style="display: none;">
                                <div class="education-section">
                                    <div class="mt-7">
                                        <h2>Nouvelle Éducation</h2>
                                    </div>
                                    <div class="mb-3">
                                        <label for="diplome" class="form-label">Diplôme</label>
                                        <input type="text" class="form-control" name="new_educations[0][diplome]"
                                            placeholder="Diplôme">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ecole" class="mt-2 form-label">École</label>
                                        <input type="text" class="form-control" name="new_educations[0][école]"
                                            placeholder="École">
                                    </div>
                                    <div class="mb-3">
                                        <label for="startdate" class="mt-2 form-label">Date de début</label>
                                        <input type="date" class="form-control" name="new_educations[0][startdate]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="enddate" class="mt-2 form-label">Date de fin (optionnel)</label>
                                        <input type="date" class="form-control" name="new_educations[0][enddate]">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="mt-2 form-label">Description</label>
                                        <textarea class="form-control" name="new_educations[0][description]" rows="3"
                                            placeholder="Description de l'éducation"></textarea>
                                    </div>
                                    <!-- Ajoutez un champ caché pour le cv_id si nécessaire -->
                                    <input type="hidden" name="cv_id" value="{{ $cv->id }}">
                                    <button type="button" class="btn mt-7 btn-danger cancel-education"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                            </div>






                            <button type="button" class="btn  btn-primary add-education"><i class="fa-solid fa-plus"></i> Education</button>

                            {{-- Edit Language Levels --}}
                            <div class="mb-3">
                                <div class="mt-7">
                                    <h2>Edit Language Levels</h2>
                                </div>


                                {{-- French Level --}}
                                <div class="mb-3">
                                    <label for="french_level" class="form-label">French Level</label>
                                    <select class="form-control" id="french_level" name="french_level">
                                        <option value="">Select a level</option>
                                        <option value="N1" {{ $cv->french_level == 'N1' ? 'selected' : '' }}>N1 -
                                            Beginner</option>
                                        <option value="N2" {{ $cv->french_level == 'N2' ? 'selected' : '' }}>N2 -
                                            Elementary</option>
                                        <option value="N3" {{ $cv->french_level == 'N3' ? 'selected' : '' }}>N3 -
                                            Intermediate</option>
                                        <option value="N4" {{ $cv->french_level == 'N4' ? 'selected' : '' }}>N4 -
                                            Upper Intermediate</option>
                                        <option value="N5" {{ $cv->french_level == 'N5' ? 'selected' : '' }}>N5 -
                                            Advanced</option>
                                    </select>
                                </div>

                                {{-- English Level --}}
                                <div class="mb-3">
                                    <label for="english_level" class="form-label">English Level</label>
                                    <select class="form-control" id="english_level" name="english_level">
                                        <option value="">Select a level</option>
                                        <option value="N1" {{ $cv->english_level == 'N1' ? 'selected' : '' }}>N1 -
                                            Beginner</option>
                                        <option value="N2" {{ $cv->english_level == 'N2' ? 'selected' : '' }}>N2 -
                                            Elementary</option>
                                        <option value="N3" {{ $cv->english_level == 'N3' ? 'selected' : '' }}>N3 -
                                            Intermediate</option>
                                        <option value="N4" {{ $cv->english_level == 'N4' ? 'selected' : '' }}>N4 -
                                            Upper Intermediate</option>
                                        <option value="N5" {{ $cv->english_level == 'N5' ? 'selected' : '' }}>N5 -
                                            Advanced</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-7">
                                <button type="submit" class="btn btn-primary">Update CV</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    let experienceSection = document.getElementById('experience_section_' +
                        experienceId);
                    if (experienceSection) {
                        experienceSection.style.display = 'none';
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
            educationSection.parentNode.removeChild(educationSection);
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
                        'required'); // Retirer l'attribut 'required' pour éviter l'erreur de formulaire non focusable
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
