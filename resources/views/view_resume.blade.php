<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Main CSS File -->
        <link href="assets/css/main.css" rel="stylesheet">

    </head>

    <body class="index-page">

        <header id="header" class="header d-flex flex-column justify-content-center">

            <i class="header-toggle d-xl-none bi bi-list"></i>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i><span>Home</span></a></li>
                    <li><a href="#about"><i class="bi bi-person navicon"></i><span>About</span></a></li>
                    <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i><span>Resume</span></a></li>
                    <li><a href="#skills"><i class="bi bi-list-ol navicon"></i><span>Skill</span></a></li>
                    <li><a href="#languages"><i class="bi bi-translate navicon"></i><span>Language</span></a></li>
                    <li><a href="#projects"><i class="bi bi-hdd-stack navicon"></i><span>Project</span></a></li>
                </ul>
            </nav>

        </header>

        <main class="main">

            <!-- Hero Section -->
            <section id="hero" class="hero section light-background">
                @foreach ($experience_info as $experiences_info)
                    <img src="login-page.jpg" alt="">

                    <div class="container" data-aos="zoom-out">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <h2 class="tw-uppercase">{{ old('full_name', $personal_info->full_name) }}</h2>
                                <p>I'm <span class="typed"
                                        data-typed-items="{{ old('job_title', $experiences_info->job_title ?? '') }}">{{ old('profile_title', $personal_info->profile_title) }}</span><span
                                        class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
                                <div class="social-links">
                                    <a href="{{ old('twitter', $contact_info->twitter) }}"><i
                                            class="bi bi-twitter-x"></i></a>
                                    <a href="{{ old('github_link', $contact_info->github_link) }}"><i
                                            class="bi bi-github"></i></a>
                                    <a href="{{ old('linkedin_link', $contact_info->linkedin_link) }}"><i
                                            class="bi bi-linkedin"></i></a>
                                    <a href="{{ old('website', $contact_info->website) }}"><i
                                            class="bi bi-browser-chrome"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section><!-- /Hero Section -->

            <!-- About Section -->
            <section id="about" class="about section">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>About me</h2>
                    <p>{{ old('about_me', $personal_info->about_me) }}</p>
                </div><!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row gy-4 justify-content-center">
                        <div class="col-lg-4">
                            <img src="{{ $personal_info->image_path ?? asset('user-thumb.jpg') }}" class="img-fluid"
                                alt="">
                        </div>
                        <div class="col-lg-8 content">
                            <h2 class="tw-uppercase">{{ old('profile_title', $personal_info->profile_title) }}</h2>
                            <p class="fst-italic py-3"></p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul>
                                        <li><i class="bi bi-chevron-right"></i> <strong>Name:</strong>
                                            <span>{{ old('full_name', $personal_info->full_name) }}</span>
                                        </li>
                                        <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong>
                                            <span>{{ old('phone_number', $contact_info->phone_number) }}</span>
                                        </li>
                                        <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong>
                                            <span>{{ old('wesbite', $contact_info->website) }}</span>
                                        </li>
                                        <li><i class="bi bi-chevron-right"></i> <strong>LinkedIn:</strong>
                                            <span>{{ old('linkedin_link', $contact_info->linkedin_link) }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul>
                                        <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong>
                                            <span>{{ old('age', $personal_info->age) }}</span>
                                        </li>
                                        <li><i class="bi bi-chevron-right"></i>
                                            <strong>Email:</strong><span>{{ old('email', $contact_info->email) }}</span>
                                        </li>
                                        <li><i class="bi bi-chevron-right"></i> <strong>Github:</strong>
                                            <span>{{ old('github_link', $contact_info->github_link) }}</span>
                                        </li>
                                        <li><i class="bi bi-chevron-right"></i> <strong>Twitter:</strong>
                                            <span>{{ old('twitter', $contact_info->twitter) }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="py-3"></p>
                        </div>
                    </div>

                </div>

            </section><!-- /About Section -->


            <!-- Resume Section -->
            <section id="resume" class="resume section">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Resume</h2>
                    <p></p>
                </div><!-- End Section Title -->

                <div class="container">

                    <div class="row">

                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="resume-title">Summary</h3>

                            <div class="resume-item pb-0">
                                <h4>{{ old('full_name', $personal_info->full_name) }}</h4>
                                <p><em>{{ old('about_me', $personal_info->about_me) }}</em></p>
                                <ul>
                                    <li>{{ old('phone_number', $contact_info->phone_number) }}</li>
                                    <li>{{ old('email', $contact_info->email) }}</li>
                                </ul>
                            </div><!-- Edn Resume Item -->
                            <h3 class="resume-title">Education</h3>
                            @foreach ($education_info as $educations_info)
                                <div class="resume-item">
                                    <h4>{{ old('degree_title', $educations_info->degree_title ?? '') }}</h4>
                                    @php
                                        $eduStartDate = old('edu_start_date', $educations_info->edu_start_date ?? '');
                                        $eduEndDate = old('edu_end_date', $educations_info->edu_end_date ?? '');

                                        $startYear = !empty($eduStartDate)
                                            ? (new DateTime($eduStartDate))->format('Y')
                                            : '';
                                        $endYear = !empty($eduEndDate) ? (new DateTime($eduEndDate))->format('Y') : '';
                                    @endphp
                                    <h5>{{ $startYear }} - {{ $endYear }}</h5>
                                    <p><em>{{ old('institute', $educations_info->institute ?? '') }}</em></p>
                                    <p>{{ old('education_description', $educations_info->education_description ?? '') }}
                                    </p>
                                </div><!-- Edn Resume Item -->
                            @endforeach
                        </div>

                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                            <h3 class="resume-title">Professional Experience</h3>
                            @foreach ($experience_info as $experiences_info)
                                <div class="resume-item">
                                    <h4>{{ old('job_title', $experiences_info->job_title ?? '') }}</h4>
                                    @php
                                        $expStartDate = old('job_start_date', $experiences_info->job_start_date ?? '');
                                        $expEndDate = old('job_end_date', $experiences_info->job_end_date ?? '');

                                        $startYear = !empty($expStartDate)
                                            ? (new DateTime($expStartDate))->format('Y')
                                            : '';
                                        $endYear = !empty($expEndDate) ? (new DateTime($expEndDate))->format('Y') : '';
                                    @endphp
                                    <h5>{{ $startYear }} - {{ $endYear }}</h5>
                                    <p><em>{{ old('organization', $experiences_info->organization ?? '') }}</em></p>
                                    <p>{{ old('job_description', $experiences_info->job_description ?? '') }}</p>
                                </div><!-- Edn Resume Item -->
                            @endforeach
                        </div>
                    </div>
                </div>

            </section><!-- /Resume Section -->

            <!-- Skills Section -->
            <section id="skills" class="skills section">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Skills</h2>
                </div><!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row skills-content skills-animation">
                        @foreach ($skill_info as $skills_info)
                            <div class="col-lg-6">
                                <div class="progress">
                                    <span
                                        class="skill"><span>{{ old('skill_name', $skills_info->skill_name ?? '') }}</span>
                                        <i
                                            class="val">{{ old('skill_percentage', $skills_info->skill_percentage ?? '') }}%</i></span>
                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar" role="progressbar"
                                            aria-valuenow={{ old('skill_percentage', $skills_info->skill_percentage ?? '') }}
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div><!-- End Skills Item -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- Skills Section -->
            <section id="languages" class="skills section">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Languages</h2>
                </div><!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row skills-content skills-animation">
                        @foreach ($language_info as $languages_info)
                            @php
                                $language = old('language', $languages_info->language ?? '');
                                $languageLevel = old('language_level', $languages_info->language_level ?? '');

                                $percentage = '';
                                if ($languageLevel === 'Native') {
                                    $percentage = '100';
                                } elseif ($languageLevel === 'Fluent') {
                                    $percentage = '80';
                                } elseif ($languageLevel === 'Basic') {
                                    $percentage = '50';
                                }
                            @endphp
                            <div class="col-lg-6">
                                <div class="progress">
                                    <span class="skill"><span>{{ $language }}</span>

                                        <i class="val">{{ $percentage }}%</i></span>

                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar" role="progressbar"
                                            aria-valuenow="{{ $percentage }}" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div><!-- End Skills Item -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- Services Section -->
            <section id="projects" class="services section">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Projects</h2>
                </div><!-- End Section Title -->
                <div class="container">
                    <div class="row gy-4">
                        @foreach ($project_info as $projects_info)
                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="service-item item-cyan position-relative">
                                    <div class="icon">
                                        <svg width="100" height="100" viewBox="0 0 600 600"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke="none" stroke-width="0" fill="#f5f5f5"
                                                d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174">
                                            </path>
                                        </svg>
                                        <i class="bi bi-file-earmark-text-fill"></i>
                                    </div>
                                    <a href="#" class="stretched-link">
                                        <h3>{{ old('project_title', $projects_info->project_title ?? '') }}</h3>
                                    </a>
                                    <p>{{ old('project_description', $projects_info->project_description ?? '') }}</p>
                                </div>
                            </div><!-- End projects Item -->
                        @endforeach
                    </div>
                </div>
            </section><!-- /projects Section -->

        </main>

        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/typed.js/typed.umd.js"></script>
        <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

        <!-- Main JS File -->
        <script src="assets/js/main.js"></script>

    </body>

    </html>
</x-app-layout>
