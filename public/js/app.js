document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM fully loaded and parsed');

    let groupCounters = {
        'education-form-group': document.querySelectorAll('.education-form-group').length,
        'experience-form-group': document.querySelectorAll('.experience-form-group').length,
        'skill-form-group': document.querySelectorAll('.skill-form-group').length,
    };

    function addFormGroup(containerId, className) {
        const container = document.getElementById(containerId);
        if (!container) {
            console.error('Container not found: ' + containerId);
            return;
        }
        const formGroup = container.querySelector('.' + className).cloneNode(true);
        formGroup.querySelectorAll('input, select, textarea').forEach(input => {
            input.value = '';
            // Reset any IDs to avoid duplication
            if (input.id) {
                input.id = '';
            }
            // Increment name indices to avoid conflicts
            // Ensure uniqueness by using the group counter for each class
            input.name = input.name.replace(/\[\d+\]/, `[${groupCounters[className]}]`);
        });

        // Increment the counter for the added group
        groupCounters[className]++;

        // Add a remove button to the cloned form group if it doesn't exist
        if (!formGroup.querySelector('.remove-' + className)) {
            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.textContent = 'Remove ' + className.replace('-form-group', '');
            removeButton.className = 'remove-' + className + ' btn btn-danger';
            removeButton.addEventListener('click', function (event) {
                removeFormGroup(event, className);
            });

            formGroup.appendChild(removeButton);
        }

        container.appendChild(formGroup);
    }

    function removeFormGroup(event, className) {
        const formGroup = event.target.closest('.' + className);
        if (formGroup) {
            formGroup.remove();
            // Optionally decrement the counter here if needed
            // Be cautious as this may affect the naming of future adds
        } else {
            console.error('Form group to remove not found:', event.target);
        }
    }

    // Add form groups
    document.getElementById('addEducation').addEventListener('click', function () {
        addFormGroup('educationSection', 'education-form-group');
    });

    document.getElementById('addExperience').addEventListener('click', function () {
        addFormGroup('experienceSection', 'experience-form-group');
    });

    document.getElementById('addSkill').addEventListener('click', function () {
        addFormGroup('skillSection', 'skill-form-group');
    });

    // Remove form groups
    document.addEventListener('click', function(event) {
        if (event.target.matches('.remove-education-form-group')) {
            removeFormGroup(event, 'education-form-group');
        } else if (event.target.matches('.remove-experience-form-group')) {
            removeFormGroup(event, 'experience-form-group');
        } else if (event.target.matches('.remove-skill-form-group')) {
            removeFormGroup(event, 'skill-form-group');
        }
    });
});
