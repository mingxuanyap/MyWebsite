<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css
    " rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="tw-font-sans tw-antialiased">
    <div class="tw-min-h-screen tw-bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="tw-bg-white tw-shadow">
                <div class="tw-max-w-7xl tw-mx-auto tw-py-6 tw-px-4 sm:tw-px-6 lg:tw-px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <script>
        function display_image(input) {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgElement = document.getElementById('profile_picture_preview');
                    imgElement.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
        document.getElementById('add_education').addEventListener('click', function() {
            // Clone the first education card
            var educationCard = document.querySelector('.education_card');
            var newEducationCard = educationCard.cloneNode(true);
            // Clear the input values in the cloned card
            newEducationCard.querySelectorAll('input, textarea').forEach(input => input.value = '');
            // Show the remove button in the cloned card
            newEducationCard.querySelector('.remove_education').classList.remove('tw-hidden');
            // Append the cloned card to the education section
            document.querySelector('.education_section').appendChild(newEducationCard);
            // Add event listener to the new remove button
            newEducationCard.querySelector('.remove_education').addEventListener('click', function() {
                this.closest('.education_card').remove();
            });
        });

        // Add event listener to the initial remove button (hidden by default)
        document.querySelectorAll('.remove_education').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.education_card').remove();
            });
        });

        document.getElementById('add_experience').addEventListener('click', function() {
            // Clone the first experience card
            var experienceCard = document.querySelector('.experience_card');
            var newExperienceCard = experienceCard.cloneNode(true);
            // Clear the input values in the cloned card
            newExperienceCard.querySelectorAll('input').forEach(input => input.value = '');
            newExperienceCard.querySelectorAll('textarea').forEach(textarea => textarea.value = '');
            // Show the remove button in the cloned card
            newExperienceCard.querySelector('.remove_experience').classList.remove('tw-hidden');
            // Append the cloned card to the experience section
            document.querySelector('.experience_section').appendChild(newExperienceCard);
            // Add event listener to the new remove button
            newExperienceCard.querySelector('.remove_experience').addEventListener('click', function() {
                this.closest('.experience_card').remove();
            });
        });

        // Add event listener to the initial remove button (hidden by default)
        document.querySelectorAll('.remove_experience').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.experience_card').remove();
            });
        });

        document.getElementById('add_project').addEventListener('click', function() {
            // Clone the first project card
            var projectCard = document.querySelector('.project_card');
            var newProjectCard = projectCard.cloneNode(true);
            // Clear the input values in the cloned card
            newProjectCard.querySelectorAll('input').forEach(input => input.value = '');
            newProjectCard.querySelectorAll('textarea').forEach(textarea => textarea.value = '');
            // Show the remove button in the cloned card
            newProjectCard.querySelector('.remove_project').classList.remove('tw-hidden');
            // Append the cloned card to the project section
            document.getElementById('project_section').appendChild(newProjectCard);
            // Add event listener to the new remove button
            newProjectCard.querySelector('.remove_project').addEventListener('click', function() {
                this.closest('.project_card').remove();
            });
        });

        // Add event listener to the initial remove button
        document.querySelectorAll('.remove_project').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.project_card').remove();
            });
        });

        document.getElementById('add_skill').addEventListener('click', function() {
            // Clone the first skill card
            var skillCard = document.querySelector('.skill_card');
            var newSkillCard = skillCard.cloneNode(true);
            // Clear the input values in the cloned card
            newSkillCard.querySelectorAll('input').forEach(input => input.value = '');
            // Show the remove button in the cloned card
            newSkillCard.querySelector('.remove_skill').classList.remove('tw-hidden');
            // Append the cloned card to the skill section
            document.querySelector('.skill_section').appendChild(newSkillCard);
            // Add event listener to the new remove button
            newSkillCard.querySelector('.remove_skill').addEventListener('click', function() {
                this.closest('.skill_card').remove();
            });
        });

        // Add event listener to the initial remove button (hidden by default)
        document.querySelectorAll('.remove_skill').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.skill_card').remove();
            });
        });

        document.getElementById('add_language').addEventListener('click', function() {
            // Clone the first language card
            var languageCard = document.querySelector('.language_card');
            var newLanguageCard = languageCard.cloneNode(true);
            // Clear the select values in the cloned card
            newLanguageCard.querySelectorAll('select').forEach(select => select.selectedIndex = 0);
            // Show the remove button in the cloned card
            newLanguageCard.querySelector('.remove_language').classList.remove('tw-hidden');
            // Append the cloned card to the language section
            document.querySelector('.language_section').appendChild(newLanguageCard);
            // Add event listener to the new remove button
            newLanguageCard.querySelector('.remove_language').addEventListener('click', function() {
                this.closest('.language_card').remove();
            });
        });

        // Add event listener to the initial remove button (hidden by default)
        document.querySelectorAll('.remove_language').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.language_card').remove();
            });
        });
    </script>
    <script src="
        https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js
        "></script>

    @if (Session::has('message'))
        <script>
            Swal.fire({
                title: "Success",
                text: "Resume created successfully!",
                icon: "success"
            });
        </script>
    @endif
</body>

</html>
