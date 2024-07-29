<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="tw-py-12">
        <div class="tw-max-w-7xl tw-mx-auto tw-sm:px-6 tw-lg:px-8">
            <div class="tw-bg-white tw-overflow-hidden tw-shadow-sm tw-sm:rounded-lg">
                <div class="tw-p-6">
                    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Personal Information -->
                        <h2 class="tw-text-2xl tw-font-bold tw-text-gray-700">Personal Information</h2>
                        <div class="tw-container tw-mx-auto tw-p-4">
                            <input type="hidden" id="user_id" name="user_id" class="tw-hidden" />

                            <div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 tw-gap-4 tw-mb-4">
                                <div class="tw-flex tw-flex-col tw-gap-4">
                                    <div>
                                        <label for="first_name" class="tw-block tw-font-bold tw-text-gray-700">Full
                                            name</label>
                                        <input type="text" id="full_name" name="full_name"
                                            class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                            placeholder="Full name" required />
                                    </div>
                                    <div>
                                        <label for="last_name" class="tw-block tw-font-bold tw-text-gray-700">Age
                                        </label>
                                        <input type="text" id="age" name="age"
                                            class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                            placeholder="Age" />
                                    </div>
                                </div>

                                <div class="tw-flex tw-justify-center tw-items-center">
                                    <div class="tw-relative tw-w-36 tw-h-36">
                                        <input type="file" name="image_path"
                                            accept="image/png, image/jpeg, image/jpg" onchange="display_image(this);"
                                            class="tw-hidden upload-box-image" />
                                        <img class="tw-absolute tw-top-0 tw-left-0 tw-w-full tw-h-full tw-object-cover tw-rounded-full tw-shadow-md tw-border tw-border-gray-300"
                                            src="{{ asset('user-thumb.jpg') }}" alt="Profile picture"
                                            onclick="this.previousElementSibling.click();"
                                            id="profile_picture_preview" />
                                    </div>
                                </div>
                            </div>

                            <div class="tw-mb-4">
                                <label for="profile_title" class="tw-block tw-font-bold tw-text-gray-700">Profile
                                    Title</label>
                                <input type="text" id="profile_title" name="profile_title"
                                    class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                    placeholder="Profile Title" required />
                            </div>

                            <div class="tw-mb-4">
                                <label for="about_me" class="tw-block tw-font-bold tw-text-gray-700">About</label>
                                <textarea id="about_me" name="about_me"
                                    class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                    placeholder="Description" rows="4"></textarea>
                            </div>
                        </div>


                        <!-- Contact Information -->
                        <h2 class="tw-text-2xl tw-font-bold tw-text-gray-700">Contact Information</h2>
                        <div class="tw-container tw-mx-auto tw-p-4">
                            <div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-3 tw-gap-4 tw-mb-4">
                                <div class="tw-flex tw-flex-col tw-gap-4">
                                    <div>
                                        <label for="first_name"
                                            class="tw-block tw-font-bold tw-text-gray-700">Email</label>
                                        <input type="text" id="email" name="email"
                                            class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                            placeholder="Email" required />
                                    </div>
                                </div>
                                <div class="tw-flex tw-flex-col tw-gap-4">
                                    <div>
                                        <label for="first_name" class="tw-block tw-font-bold tw-text-gray-700">Phone
                                            Number</label>
                                        <input type="text" id="phone_number" name="phone_number"
                                            class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                            placeholder="Phone number" required />
                                    </div>
                                </div>
                                <div class="tw-flex tw-flex-col tw-gap-4">
                                    <div>
                                        <label for="first_name"
                                            class="tw-block tw-font-bold tw-text-gray-700">Website</label>
                                        <input type="text" id="website" name="website"
                                            class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                            placeholder="Website" />
                                    </div>
                                </div>
                            </div>

                            <div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-3 tw-gap-4 tw-mb-4">
                                <div class="tw-flex tw-flex-col tw-gap-4">
                                    <div>
                                        <label for="first_name"
                                            class="tw-block tw-font-bold tw-text-gray-700">LinkedIn</label>
                                        <input type="text" id="linkedin_link" name="linkedin_link"
                                            class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                            placeholder="LinkedIn" />
                                    </div>
                                </div>
                                <div class="tw-flex tw-flex-col tw-gap-4">
                                    <div>
                                        <label for="first_name"
                                            class="tw-block tw-font-bold tw-text-gray-700">Github</label>
                                        <input type="text" id="github_link" name="github_link"
                                            class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                            placeholder="Github" />
                                    </div>
                                </div>
                                <div class="tw-flex tw-flex-col tw-gap-4">
                                    <div>
                                        <label for="first_name"
                                            class="tw-block tw-font-bold tw-text-gray-700">Twitter</label>
                                        <input type="text" id="twitter" name="twitter"
                                            class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                            placeholder="Twitter" />
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
                                <div
                                    class="tw-card tw-mb-4 tw-p-4 tw-border tw-rounded-lg tw-shadow-sm education_card">
                                    <div class="tw-card-body">
                                        <div class="tw-mb-4">
                                            <label for="degree_title"
                                                class="tw-block tw-font-bold tw-text-gray-700">Degree</label>
                                            <input type="text" id="degree_title" name="degree_title[]"
                                                class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                                placeholder="Degree" />
                                        </div>
                                        <div class="tw-mb-4">
                                            <label for="institute"
                                                class="tw-block tw-font-bold tw-text-gray-700">Institute</label>
                                            <input type="text" id="institute" name="institute[]"
                                                class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                                placeholder="Institute" />
                                        </div>
                                        <div class="tw-flex tw-flex-wrap tw--mx-2 tw-mb-4">
                                            <div class="tw-w-full sm:tw-w-1/2 tw-px-2 tw-mb-4 sm:tw-mb-0">
                                                <label for="edu_start_date"
                                                    class="tw-block tw-font-bold tw-text-gray-700">Start Date</label>
                                                <input type="date" id="edu_start_date" name="edu_start_date[]"
                                                    class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500" />
                                            </div>
                                            <div class="tw-w-full sm:tw-w-1/2 tw-px-2">
                                                <label for="edu_end_date"
                                                    class="tw-block tw-font-bold tw-text-gray-700">End
                                                    Date</label>
                                                <input type="date" id="edu_end_date" name="edu_end_date[]"
                                                    class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500" />
                                            </div>
                                        </div>
                                        <div class="tw-mb-4">
                                            <label for="education_description"
                                                class="tw-block tw-font-bold tw-text-gray-700">Degree
                                                Description</label>
                                            <textarea id="education_description" name="education_description[]"
                                                class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                                placeholder="Description" rows="4"></textarea>
                                        </div>
                                        <button
                                            class="tw-bg-red-500 tw-text-white tw-px-2 tw-py-1 tw-rounded-md tw-font-semibold tw-shadow-sm hover:tw-bg-red-400 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-red-500 remove_education tw-hidden">Remove</button>
                                    </div>
                                </div>
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
                                <div
                                    class="tw-card tw-mb-4 tw-p-4 tw-border tw-rounded-lg tw-shadow-sm experience_card">
                                    <div class="tw-card-body">
                                        <div class="tw-flex tw-justify-between">
                                            <label class="tw-block tw-font-bold tw-text-gray-700">Job Title</label>
                                            <button
                                                class="tw-bg-red-500 tw-text-white tw-px-2 tw-py-1 tw-rounded-md tw-font-semibold tw-shadow-sm hover:tw-bg-red-400 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-red-500 remove_experience tw-hidden">Remove</button>
                                        </div>
                                        <div class="tw-mb-4">
                                            <input type="text" id="job_title" name="job_title[]"
                                                class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                                placeholder="Job Title" />
                                        </div>
                                        <div class="tw-mb-4">
                                            <label class="tw-block tw-font-bold tw-text-gray-700">Organization</label>
                                            <input type="text" id="organization" name="organization[]"
                                                class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                                placeholder="Organization" />
                                        </div>
                                        <div class="tw-flex tw-flex-wrap tw--mx-2 tw-mb-4">
                                            <div class="tw-w-full sm:tw-w-1/2 tw-px-2 tw-mb-4 sm:tw-mb-0">
                                                <label class="tw-block tw-font-bold tw-text-gray-700">Start
                                                    Date</label>
                                                <input type="date" id="job_start_date" name="job_start_date[]"
                                                    class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500" />
                                            </div>
                                            <div class="tw-w-full sm:tw-w-1/2 tw-px-2">
                                                <label class="tw-block tw-font-bold tw-text-gray-700">End Date</label>
                                                <input type="date" id="job_end_date" name="job_end_date[]"
                                                    class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500" />
                                            </div>
                                        </div>
                                        <div class="tw-mb-4">
                                            <label class="tw-block tw-font-bold tw-text-gray-700">Job
                                                Description</label>
                                            <textarea
                                                class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                                placeholder="Job Description" id="job_description" name="job_description[]" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
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
                                <div class="tw-card tw-mb-4 tw-p-6 tw-border tw-rounded-lg tw-shadow-sm project_card">
                                    <div class="tw-card-body tw-space-y-4">
                                        <div class="tw-flex tw-justify-between">
                                            <label for="project_title"
                                                class="tw-block tw-text-sm tw-font-medium tw-text-gray-700">Project
                                                Title</label>
                                            <button
                                                class="tw-bg-red-500 tw-text-white tw-px-2 tw-py-1 tw-rounded-md tw-font-semibold tw-shadow-sm hover:tw-bg-red-400 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-red-500 remove_project tw-hidden">Remove</button>
                                        </div>
                                        <input type="text" id="project_title" name="project_title[]"
                                            placeholder="Project Title"
                                            class="tw-mt-1 tw-block tw-w-full tw-rounded-md tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500">
                                        <div>
                                            <label for="project_description"
                                                class="tw-block tw-text-sm tw-font-medium tw-text-gray-700">Description</label>
                                            <textarea id="project_description" name="project_description[]" rows="3" placeholder="Project Description"
                                                class="tw-mt-1 tw-block tw-w-full tw-rounded-md tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"></textarea>
                                        </div>
                                    </div>
                                </div>
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
                                <div class="tw-card tw-mb-4 tw-p-4 tw-border tw-rounded-lg tw-shadow-sm skill_card">
                                    <div class="tw-card-body">
                                        <div class="tw-flex tw-justify-between tw-items-center tw-mb-4">
                                            <label class="tw-block tw-font-bold tw-text-gray-700">Skill</label>
                                            <button
                                                class="tw-bg-red-500 tw-text-white tw-px-2 tw-py-1 tw-rounded-md tw-font-semibold tw-shadow-sm hover:tw-bg-red-400 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-red-500 remove_skill tw-hidden">Remove</button>
                                        </div>
                                        <div class="tw-grid tw-grid-cols-10 tw-gap-4">
                                            <div class="tw-col-span-8">
                                                <input type="text" id="skill_name" name="skill_name[]"
                                                    class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                                    placeholder="Add Skill" />
                                            </div>
                                            <div class="tw-col-span-2">
                                                <div class="tw-relative">
                                                    <input type="number" step="1" id="skill_percentage"
                                                        name="skill_percentage[]" placeholder="%"
                                                        class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500" />

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                <div class="tw-card tw-mb-4 tw-p-4 tw-border tw-rounded-lg tw-shadow-sm language_card">
                                    <div class="tw-card-body">
                                        <div class="tw-flex tw-items-center tw-mb-4">
                                            <div class="tw-flex-1">
                                                <label class="tw-block tw-font-bold tw-text-gray-700">Language</label>
                                                <select
                                                    class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500"
                                                    id="language" name="language[]">
                                                    <option value="">Add Language</option>
                                                    <!-- Add all the language options here -->
                                                    <option value="Chinese">Chinese</option>
                                                    <option value="English">English</option>
                                                    <option value="German">German</option>
                                                    <option value="Italian">Italian</option>
                                                    <option value="Japanese">Japanese</option>
                                                    <option value="Korean">Korean</option>
                                                    <option value="Malay">Malay</option>
                                                    <option value="Russian">Russian</option>
                                                    <option value="Spanish">Spanish</option>
                                                    <option value="Thai">Thai</option>
                                                </select>
                                            </div>
                                            <div class="tw-w-1/4 tw-pl-4">
                                                <label class="tw-block tw-font-bold tw-text-gray-700">Level</label>
                                                <div class="tw-relative">
                                                    <select id="language_level" name="language_level[]"
                                                        class="tw-mt-1 tw-block tw-w-full tw-p-2 tw-border tw-rounded tw-border-gray-300 tw-shadow-sm focus:tw-border-indigo-500 focus:tw-ring-indigo-500">
                                                        <option value="">Select level</option>
                                                        <option value="Native">Native</option>
                                                        <option value="Fluent">Fluent</option>
                                                        <option value="Basic">Basic</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <button
                                                class="tw-bg-red-500 tw-text-white tw-px-2 tw-py-1 tw-rounded-md tw-font-semibold tw-shadow-sm hover:tw-bg-red-400 focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-red-500 remove_language tw-hidden tw-ml-4">Remove</button>
                                        </div>
                                    </div>
                                </div>
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
