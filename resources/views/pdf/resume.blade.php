<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('pdf.style')
</head>

<body>
    <header>
        <div>
            <h1 class="uppercase" style="margin-top: 14px;text-align: left;">
                {{ old('full_name', $personal_info->full_name) }}</h1>
            <p class="lowercase" style="margin-top: 15px; text-align: left;">Email:
                <span>{{ old('email', $contact_info->email) }}</span>
            </p>
            <p class="lowercase" style="text-align: left;">Phone:
                <span>{{ old('phone_number', $contact_info->phone_number) }}</span>
            </p>
            <p class="lowercase" style="text-align: left;">Website:
                <span>{{ old('wesbite', $contact_info->website) }}</span>
            </p>
            <p class="lowercase" style="margin-bottom: 30px; text-align: left;">Github:
                <span>{{ old('github_link', $contact_info->github_link) }}</span>
            </p>
        </div>
        <div>
            <img class="profile-img" src="{{ $personal_info->image_path ?? asset('user-thumb.jpg') }}">
        </div>
    </header>

    <div class="content">
        {{-- Summary --}}
        <div class="summary">
            <div class="summary-title">
                <h3>Summary</h3>
            </div>
            <div class="summary-content">
                <p>{{ old('about_me', $personal_info->about_me) }}</p>
            </div>
        </div>

        {{-- Education --}}
        <div class="education">
            <div class="education-title">
                <h3>Education</h3>
            </div>
            @foreach ($education_info as $educations_info)
                <div class="education-content">
                    <h3>{{ old('degree_title', $educations_info->degree_title ?? '') }}</h3>
                    <p style="font-size: 1.4rem;">{{ old('institute', $educations_info->institute ?? '') }}
                    </p>
                    @php
                        $eduStartDate = old('edu_start_date', $educations_info->edu_start_date ?? '');
                        $eduEndDate = old('edu_end_date', $educations_info->edu_end_date ?? '');

                        $startYear = !empty($eduStartDate) ? (new DateTime($eduStartDate))->format('Y') : '';
                        $endYear = !empty($eduEndDate) ? (new DateTime($eduEndDate))->format('Y') : '';
                    @endphp
                    <p style="color: grey">{{ $startYear }} - {{ $endYear }}</p>
                    <p>{{ old('education_description', $educations_info->education_description ?? '') }}</p>
                </div>
            @endforeach
        </div>

        {{-- Experience --}}
        <div class="experience">
            <div class="experience-title">
                <h3>Experience</h3>
            </div>
            @foreach ($experience_info as $experiences_info)
                <div class="experience-content">
                    <h3>{{ old('job_title', $experiences_info->job_title ?? '') }}</h3>
                    <p style="font-size: 1.4rem;">
                        {{ old('organization', $experiences_info->organization ?? '') }}
                    </p>
                    @php
                        $jobStartDate = old('job_start_date', $experiences_info->job_start_date ?? '');
                        $jobEndDate = old('job_end_date', $experiences_info->job_end_date ?? '');

                        $startYear = !empty($jobStartDate) ? (new DateTime($jobStartDate))->format('Y') : '';
                        $endYear = !empty($jobEndDate) ? (new DateTime($jobEndDate))->format('Y') : '';
                    @endphp
                    <p style="color: grey">{{ $startYear }} - {{ $endYear }}</p>
                    <p>{{ old('job_description', $experiences_info->job_description ?? '') }}</p>
                </div>
            @endforeach
        </div>

        {{-- Skill --}}
        <div class="skill">
            <div class="skill-title">
                <h3>Skill</h3>
            </div>
            @foreach ($skill_info as $skills_info)
                <div class="skill-content">
                    <p style="line-height: 0.8;">{{ old('skill_name', $skills_info->skill_name) }} -
                        <span>{{ old('skill_percentage', $skills_info->skill_percentage) }}%</span>
                    </p>
                </div>
            @endforeach
        </div>

        {{-- Language --}}
        <div class="language">
            <div class="language-title">
                <h3>Language</h3>
            </div>
            @foreach ($language_info as $languages_info)
                <div class="language-content">
                    <p style="line-height: 0.8;">{{ old('language', $languages_info->language) }} -
                        <span>{{ old('language_level', $languages_info->language_level) }}</span>
                    </p>
                </div>
            @endforeach
        </div>
    </div>

    <script type="text/php">
        if (isset($pdf)) {
            $pdf->page_script('
                if ($PAGE_COUNT > 1) {
                    $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                    $size = 12;
                    $pageText = "Page " . $PAGE_NUM . " of " . $PAGE_COUNT;
                    $y = 800;
                    $x = 35;
                    $pdf->text($x, $y, $pageText, $font, $size);
                }
            ');
        }
    </script>
</body>

</html>
