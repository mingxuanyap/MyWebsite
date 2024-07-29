<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot> --}}

    <div class="tw-py-12">
        <div class="tw-max-w-7xl tw-mx-auto tw-sm:px-6 tw-lg:px-8">
            <div class="tw-bg-white tw-overflow-hidden tw-shadow-sm tw-sm:rounded-lg">
                <div class="tw-p-6">
                    <form action="{{ route('resume.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Personal Information -->
                        <h2 class="tw-text-2xl tw-font-bold tw-text-gray-700">Personal Information</h2>
                        <div class="tw-container tw-mx-auto tw-p-4">
                            <input type="hidden" id="user_id" name="user_id" class="tw-hidden" />

                            <div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 tw-gap-4 tw-mb-4">
                                <div class="tw-flex tw-flex-col tw-gap-4">
                                    <div>
                                        <label for="full_name" class="tw-block tw-font-bold tw-text-gray-700">Full
                                            name</label>
                                        <input type="text" id="full_name" name="full_name"
                                            class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                            placeholder="Full name"
                                            value="{{ old('full_name', $personal_information->full_name) }}" />
                                    </div>
                                    <div>
                                        <label for="age" class="tw-block tw-font-bold tw-text-gray-700">Age
                                        </label>
                                        <input type="text" id="age" name="age"
                                            class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                            placeholder="Age" value="{{ old('age', $personal_information->age) }}" />
                                    </div>
                                </div>

                                <div class="tw-flex tw-justify-center tw-items-center">
                                    <div class="tw-relative tw-w-36 tw-h-36">
                                        <input type="file" name="image_path"
                                            accept="image/png, image/jpeg, image/jpg" onchange="display_image(this);"
                                            class="tw-hidden upload-box-image" />
                                        <img class="tw-absolute tw-top-0 tw-left-0 tw-w-full tw-h-full tw-object-cover tw-rounded-full tw-shadow-md tw-border tw-border-gray-300"
                                            src="{{ $personal_information->image_path ?? asset('user-thumb.jpg') }}"
                                            alt="Profile picture" onclick="this.previousElementSibling.click();"
                                            id="profile_picture_preview" />
                                    </div>
                                </div>
                            </div>

                            <div class="tw-mb-4">
                                <label for="profile_title" class="tw-block tw-font-bold tw-text-gray-700">Profile
                                    Title</label>
                                <input type="text" id="profile_title" name="profile_title"
                                    class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                    placeholder="Profile Title"
                                    value="{{ old('project_title', $personal_information->profile_title) }}" />
                            </div>

                            <div class="tw-mb-4">
                                <label for="about_me" class="tw-block tw-font-bold tw-text-gray-700">About</label>
                                <textarea id="about_me" name="about_me"
                                    class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                    placeholder="Description" rows="4">{{ old('about_me', $personal_information->about_me) }}</textarea>
                            </div>
                        </div>


                        <!-- Contact Information -->
                        <h2 class="tw-text-2xl tw-font-bold tw-text-gray-700">Contact Information</h2>
                        <div class="tw-container tw-mx-auto tw-p-4">
                            <div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-3 tw-gap-4 tw-mb-4">
                                <div class="tw-flex tw-flex-col tw-gap-4">
                                    <div>
                                        <label for="email"
                                            class="tw-block tw-font-bold tw-text-gray-700">Email</label>
                                        <input type="text" id="email" name="email"
                                            class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                            placeholder="Email"
                                            value="{{ old('email', $personal_information->contactInformation->email ?? '') }}" />
                                    </div>
                                </div>
                                <div class="tw-flex tw-flex-col tw-gap-4">
                                    <div>
                                        <label for="phone_number" class="tw-block tw-font-bold tw-text-gray-700">Phone
                                            Number</label>
                                        <input type="text" id="phone_number" name="phone_number"
                                            class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                            placeholder="Phone number"
                                            value="{{ old('phone_number', $personal_information->contactInformation->phone_number ?? '') }}" />
                                    </div>
                                </div>
                                <div class="tw-flex tw-flex-col tw-gap-4">
                                    <div>
                                        <label for="website"
                                            class="tw-block tw-font-bold tw-text-gray-700">Website</label>
                                        <input type="text" id="website" name="website"
                                            class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                            placeholder="Website"
                                            value="{{ old('website', $personal_information->contactInformation->website ?? '') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-3 tw-gap-4 tw-mb-4">
                                <div class="tw-flex tw-flex-col tw-gap-4">
                                    <div>
                                        <label for="linkedin_link"
                                            class="tw-block tw-font-bold tw-text-gray-700">LinkedIn</label>
                                        <input type="text" id="linkedin_link" name="linkedin_link"
                                            class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                            placeholder="LinkedIn"
                                            value="{{ old('linkedin_link', $personal_information->contactInformation->linkedin_link ?? '') }}" />
                                    </div>
                                </div>
                                <div class="tw-flex tw-flex-col tw-gap-4">
                                    <div>
                                        <label for="github_link"
                                            class="tw-block tw-font-bold tw-text-gray-700">Github</label>
                                        <input type="text" id="github_link" name="github_link"
                                            class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                            placeholder="Github"
                                            value="{{ old('github_link', $personal_information->contactInformation->github_link ?? '') }}" />
                                    </div>
                                </div>
                                <div class="tw-flex tw-flex-col tw-gap-4">
                                    <div>
                                        <label for="twitter_link"
                                            class="tw-block tw-font-bold tw-text-gray-700">Twitter</label>
                                        <input type="text" id="twitter" name="twitter"
                                            class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                            placeholder="Twitter"
                                            value="{{ old('twitter', $personal_information->contactInformation->twitter ?? '') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Education -->
                        <div class="tw-container tw-mx-auto">
                            <div class="tw-flex tw-justify-between tw-items-center tw-mb-4">
                                <h2 class="tw-text-2xl tw-font-bold tw-text-gray-700">Education</h2>
                                <button type="button" class="tw-bg-blue-500 tw-text-white tw-py-2 tw-px-4 tw-rounded"
                                    id="add_education">Add Education</button>
                            </div>
                            <section class="education_section">
                                {{-- @dd($personal_information->education) --}}
                                @foreach ($personal_information->education as $educations)
                                <div
                                    class="tw-card tw-mb-4 tw-p-4 tw-border tw-rounded-lg tw-shadow-sm education_card">
                                    <div class="tw-card-body">
                                        <input type="hidden" name="education_id[]" value="{{ $educations->id }}">
                                        <div class="tw-mb-4">
                                            <label for="degree_title"
                                                class="tw-block tw-font-bold tw-text-gray-700">Degree</label>
                                            <input type="text" id="degree_title" name="degree_title[]"  value="{{ old('degree_title', $educations->degree_title ?? '') }}"
                                                class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                                placeholder="Degree" />
                                        </div>
                                        <div class="tw-mb-4">
                                            <label for="institute"
                                                class="tw-block tw-font-bold tw-text-gray-700">Institute</label>
                                            <input type="text" id="institute" name="institute[]"  value="{{ old('institute', $educations->institute ?? '') }}"
                                                class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                                placeholder="Institute" />
                                        </div>
                                        <div class="tw-flex tw-flex-wrap tw--mx-2 tw-mb-4">
                                            <div class="tw-w-full sm:tw-w-1/2 tw-px-2 tw-mb-4 sm:tw-mb-0">
                                                <label for="edu_start_date"
                                                    class="tw-block tw-font-bold tw-text-gray-700">Start Date</label>
                                                <input type="date" id="edu_start_date" name="edu_start_date[]"  value="{{ old('edu_start_date', $educations->edu_start_date ?? '') }}"
                                                    class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500" />
                                            </div>
                                            <div class="tw-w-full sm:tw-w-1/2 tw-px-2">
                                                <label for="edu_end_date"
                                                    class="tw-block tw-font-bold tw-text-gray-700">End
                                                    Date</label>
                                                <input type="date" id="edu_end_date" name="edu_end_date[]"  value="{{ old('edu_end_date', $educations->edu_end_date ?? '') }}"
                                                    class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500" />
                                            </div>
                                        </div>
                                        <div class="tw-mb-4">
                                            <label for="education_description"
                                                class="tw-block tw-font-bold tw-text-gray-700">Degree
                                                Description</label>
                                            <textarea id="education_description" name="education_description[]"
                                                class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                                placeholder="Description" rows="4">{{ old('job_title', $educations->education_description ?? '') }}</textarea>
                                        </div>
                                        <button
                                            class="tw-bg-red-500 tw-text-white tw-px-2 tw-py-1 tw-rounded-md tw-font-semibold tw-shadow-sm hover:tw-bg-red-400 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-red-500 remove_education tw-hidden">Remove</button>
                                    </div>
                                </div>
                                @endforeach
                            </section>
                        </div>

                        <!-- Experience -->
                        <div class="tw-container tw-mx-auto">
                            <div class="tw-flex tw-justify-between tw-items-center tw-mb-4">
                                <h2 class="tw-text-2xl tw-font-bold tw-text-gray-700">Experience</h2>
                                <button type="button" class="tw-bg-blue-500 tw-text-white tw-py-2 tw-px-4 tw-rounded"
                                    id="add_experience">Add Experience</button>
                            </div>
                            <section class="experience_section">
                                @foreach ($personal_information->experience as $experiences)
                                <div
                                    class="tw-card tw-mb-4 tw-p-4 tw-border tw-rounded-lg tw-shadow-sm experience_card">
                                    <div class="tw-card-body">
                                        <div class="tw-flex tw-justify-between">
                                            <label class="tw-block tw-font-bold tw-text-gray-700">Job Title</label>
                                            <button
                                                class="tw-bg-red-500 tw-text-white tw-px-2 tw-py-1 tw-rounded-md tw-font-semibold tw-shadow-sm hover:tw-bg-red-400 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-red-500 remove_experience tw-hidden">Remove</button>
                                        </div>
                                        <input type="hidden" name="experience_id[]" value="{{ $experiences->id }}">
                                        <div class="tw-mb-4">
                                            <input type="text" id="job_title" name="job_title[]"
                                                class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                                placeholder="Job Title" value="{{ old('job_title', $experiences->job_title ?? '') }}"/>
                                        </div>
                                        <div class="tw-mb-4">
                                            <label class="tw-block tw-font-bold tw-text-gray-700">Organization</label>
                                            <input type="text" id="organization" name="organization[]"
                                                class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                                placeholder="Organization" value="{{ old('organization', $experiences->organization ?? '') }}"/>
                                        </div>
                                        <div class="tw-flex tw-flex-wrap tw--mx-2 tw-mb-4">
                                            <div class="tw-w-full sm:tw-w-1/2 tw-px-2 tw-mb-4 sm:tw-mb-0">
                                                <label class="tw-block tw-font-bold tw-text-gray-700">Start
                                                    Date</label>
                                                <input type="date" id="job_start_date" name="job_start_date[]"
                                                    class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500" value="{{ old('job_start_date', $experiences->job_start_date ?? '') }}"/>
                                            </div>
                                            <div class="tw-w-full sm:tw-w-1/2 tw-px-2">
                                                <label class="tw-block tw-font-bold tw-text-gray-700">End Date</label>
                                                <input type="date" id="job_end_date" name="job_end_date[]"
                                                    class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500" value="{{ old('job_end_date', $experiences->job_end_date ?? '') }}"/>
                                            </div>
                                        </div>
                                        <div class="tw-mb-4">
                                            <label class="tw-block tw-font-bold tw-text-gray-700">Job
                                                Description</label>
                                            <textarea
                                                class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                                placeholder="Job Description" id="job_description" name="job_description[]" rows="4">{{ old('job_description', $experiences->job_description ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </section>
                        </div>

                        <!-- Projects -->
                        <div class="tw-container tw-mx-auto tw-space-y-4">
                            <div class="tw-flex tw-justify-between tw-items-center">
                                <h2 class="tw-text-2xl tw-font-bold tw-text-gray-700">Project</h2>
                                <button type="button" class="tw-bg-blue-500 tw-text-white tw-py-2 tw-px-4 tw-rounded"
                                    id="add_project">Add Project</button>
                            </div>
                            <section id="project_section">
                                @foreach ($personal_information->projects as $project)
                                <div class="tw-card tw-mb-4 tw-p-6 tw-border tw-rounded-lg tw-shadow-sm project_card">
                                    <div class="tw-card-body tw-space-y-4">
                                        <div class="tw-flex tw-justify-between">
                                            <label for="project_title"
                                                class="tw-block tw-text-sm tw-font-medium tw-text-gray-700">Project
                                                Title</label>
                                            <button
                                                class="tw-bg-red-500 tw-text-white tw-px-2 tw-py-1 tw-rounded-md tw-font-semibold tw-shadow-sm hover:tw-bg-red-400 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-red-500 remove_project tw-hidden">Remove</button>
                                        </div>
                                        <input type="hidden" name="project_id[]" value="{{ $project->id }}">
                                        <input type="text" id="project_title" name="project_title[]"
                                            placeholder="Project Title" value="{{ old('project_title', $project->project_title ?? '') }}"
                                            class="tw-mt-1 tw-block tw-w-full tw-rounded-md tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500">
                                        <div>
                                            <label for="project_description"
                                                class="tw-block tw-text-sm tw-font-medium tw-text-gray-700">Description</label>
                                            <textarea id="project_description" name="project_description[]" rows="3" placeholder="Project Description"
                                                class="tw-mt-1 tw-block tw-w-full tw-rounded-md tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500">{{ old('project_description', $project->project_description ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </section>
                        </div>

                        <!-- Skills & Proficiency -->
                        <div class="tw-container tw-mx-auto">
                            <div class="tw-flex tw-justify-between tw-items-center tw-mb-4">
                                <h2 class="tw-text-2xl tw-font-bold tw-text-gray-700">Skills & Proficiency</h2>
                                <button type="button" class="tw-bg-blue-500 tw-text-white tw-py-2 tw-px-4 tw-rounded"
                                    id="add_skill">Add
                                    Skill</button>
                            </div>
                            <section class="skill_section">
                                @foreach ($personal_information->skills as $skill)
                                    <div
                                        class="tw-card tw-mb-4 tw-p-4 tw-border tw-rounded-lg tw-shadow-sm skill_card">
                                        <div class="tw-card-body">
                                            <div class="tw-flex tw-justify-between tw-items-center tw-mb-4">
                                                <label class="tw-block tw-font-bold tw-text-gray-700">Skill</label>
                                                <button
                                                    class="tw-bg-red-500 tw-text-white tw-px-2 tw-py-1 tw-rounded-md tw-font-semibold tw-shadow-sm hover:tw-bg-red-400 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-red-500 remove_skill tw-hidden">Remove</button>
                                            </div>
                                            <input type="hidden" name="skill_id[]" value="{{ $skill->id }}">
                                            <div class="tw-grid tw-grid-cols-10 tw-gap-4">
                                                <div class="tw-col-span-8">
                                                    <input type="text" id="skill_name" name="skill_name[]"
                                                        class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                                        placeholder="Add Skill"
                                                        value="{{ old('skill_name', $skill->skill_name ?? '') }}" />
                                                </div>
                                                <div class="tw-col-span-2">
                                                    <div class="tw-relative">
                                                        <input type="number" step="1" id="skill_percentage"
                                                            name="skill_percentage[]" placeholder="%"
                                                            class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                                            value="{{ old('skill_percentage', $skill->skill_percentage ?? '') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </section>
                        </div>

                        <!-- Languages -->
                        <div class="tw-container tw-mx-auto">
                            <div class="tw-flex tw-justify-between tw-items-center tw-mb-4">
                                <h2 class="tw-text-2xl tw-font-bold tw-text-gray-700">Languages</h2>
                                <button type="button" class="tw-bg-blue-500 tw-text-white tw-py-2 tw-px-4 tw-rounded"
                                    id="add_language">Add Language</button>
                            </div>
                            <section class="language_section">
                                @foreach ($personal_information->languages as $language)
                                    <div
                                        class="tw-card tw-mb-4 tw-p-4 tw-border tw-rounded-lg tw-shadow-sm language_card">
                                        <div class="tw-card-body">
                                            <div class="tw-flex tw-items-center tw-mb-4">
                                                <div class="tw-flex-1">
                                                    <label
                                                        class="tw-block tw-font-bold tw-text-gray-700">Language</label>
                                                        <input type="hidden" name="language_id[]" value="{{ $language->id }}">
                                                    <select
                                                        class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                                        id="language" name="language[]">
                                                        <option value="">Add Language</option>
                                                        <!-- Add all the language options here -->
                                                        <option value="Chinese"
                                                            {{ old('language', $language->language) == 'Chinese' ? 'selected' : '' }}>
                                                            Chinese</option>
                                                        <option value="English"
                                                            {{ old('language', $language->language) == 'English' ? 'selected' : '' }}>
                                                            English</option>
                                                        <option value="German"
                                                            {{ old('language', $language->language) == 'German' ? 'selected' : '' }}>
                                                            German</option>
                                                        <option value="Italian"
                                                            {{ old('language', $language->language) == 'Italian' ? 'selected' : '' }}>
                                                            Italian</option>
                                                        <option value="Japanese"
                                                            {{ old('language', $language->language) == 'Japanese' ? 'selected' : '' }}>
                                                            Japanese</option>
                                                        <option value="Korean"
                                                            {{ old('language', $language->language) == 'Korean' ? 'selected' : '' }}>
                                                            Korean</option>
                                                        <option value="Malay"
                                                            {{ old('language', $language->language) == 'Malay' ? 'selected' : '' }}>
                                                            Malay</option>
                                                        <option value="Russian"
                                                            {{ old('language', $language->language) == 'Russian' ? 'selected' : '' }}>
                                                            Russian</option>
                                                        <option value="Spanish"
                                                            {{ old('language', $language->language) == 'Spanish' ? 'selected' : '' }}>
                                                            Spanish</option>
                                                        <option value="Thai"
                                                            {{ old('language', $language->language) == 'Thai' ? 'selected' : '' }}>
                                                            Thai</option>
                                                        <!-- More options... -->
                                                    </select>
                                                </div>
                                                <div class="tw-w-1/4 tw-pl-4">
                                                    <label class="tw-block tw-font-bold tw-text-gray-700">Level</label>
                                                    <div class="tw-relative">
                                                        <select id="language_level" name="language_level[]"
                                                            class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500">
                                                            <option value="">Select level</option>
                                                            <option value="Native"
                                                                {{ old('language_level', $language->language_level) == 'Native' ? 'selected' : '' }}>
                                                                Native</option>
                                                            <option value="Fluent"
                                                                {{ old('language_level', $language->language_level) == 'Fluent' ? 'selected' : '' }}>
                                                                Fluent</option>
                                                            <option value="Basic"
                                                                {{ old('language_level', $language->language_level) == 'Basic' ? 'selected' : '' }}>
                                                                Basic</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button
                                                    class="tw-bg-red-500 tw-text-white tw-px-2 tw-py-1 tw-rounded-md tw-font-semibold tw-shadow-sm hover:tw-bg-red-400 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-red-500 remove_language tw-hidden tw-ml-4">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </section>
                        </div>

                        <div class="tw-flex tw-justify-center">
                            {{-- <button type="submit"
                            class="tw-inline-flex tw-items-center tw-px-4 tw-py-2 tw-bg-indigo-600 tw-border tw-border-transparent tw-rounded-md tw-font-semibold tw-text-xs tw-text-white tw-uppercase tw-tracking-widest tw-shadow-sm hover:tw-bg-indigo-500 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-indigo-500">
                            Save
                        </button> --}}
                            <button type="submit"
                                class="tw-bg-blue-500 tw-text-white tw-py-2 tw-px-4 tw-w-full tw-rounded"
                                id="saveButton">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


</x-app-layout>
