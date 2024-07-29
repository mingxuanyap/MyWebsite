<?php

namespace App\Http\Controllers;

use App\Models\ContactInformation;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Languages;
use App\Models\PersonalInformation;
use App\Models\Projects;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class DashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;

        $personal_information = PersonalInformation::where('user_id', $user_id)->with([
            'contactInformation',
            'education',
            'experience',
            'projects',
            'skills',
            'languages'
        ])->get()->toArray();

        $user_data = $personal_information;

        return view('dashboard', ['users_data' => $user_data]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        // Store Personal Information
        $personal_info = new PersonalInformation();
        $personal_info->user_id           = $user_id;
        $personal_info->full_name         = $request->full_name;
        $personal_info->age               = $request->age;
        $personal_info->profile_title     = $request->profile_title;
        $personal_info->about_me          = $request->about_me;

        if ($request->file('image_path')) {
            $picture = time() . '-' . $request->file('image_path')->getClientOriginalName();
            $request->file('image_path')->move(public_path('assets/img/profile'), $picture);
            $personal_info->image_path = 'assets/img/profile/' . $picture;
        } else {
            $personal_info->image_path = null;
        }

        $personal_info->save();

        // Store Contact Information
        $contact_info = new ContactInformation();
        $contact_info->profile_id = $personal_info->id;
        $contact_info->email = $request->email;
        $contact_info->phone_number = $request->phone_number;
        $contact_info->website = $request->website;
        $contact_info->linkedin_link = $request->linkedin_link;
        $contact_info->github_link = $request->github_link;
        $contact_info->twitter = $request->twitter;
        $contact_info->save();

        // Store Education Information

        // dd($request->all());
        if (!empty($request->degree_title)) {
            foreach ($request->degree_title as $index => $degree_title) {
                $education_info = new Education();
                $education_info->profile_id = $personal_info->id;
                $education_info->degree_title = $degree_title;
                $education_info->institute = $request->institute[$index];
                $education_info->edu_start_date = $request->edu_start_date[$index];
                $education_info->edu_end_date = $request->edu_end_date[$index];
                $education_info->education_description = $request->education_description[$index];
                $education_info->save();
            }
        }

        // Store Experience Information
        if (!empty($request->job_title)) {
            foreach ($request->job_title as $index => $job_title) {
                $experience_info = new Experience();
                $experience_info->profile_id = $personal_info->id;
                $experience_info->job_title = $job_title;
                $experience_info->organization = $request->organization[$index];
                $experience_info->job_start_date = $request->job_start_date[$index];
                $experience_info->job_end_date = $request->job_end_date[$index];
                $experience_info->job_description = $request->job_description[$index];
                $experience_info->save();
            }
        }

        // Store Project Information
        if (!empty($request->project_title)) {
            foreach ($request->project_title as $index => $project_title) {
                $project_info = new Projects();
                $project_info->profile_id = $personal_info->id;
                $project_info->project_title = $project_title;
                $project_info->project_description = $request->project_description[$index];
                $project_info->save();
            }
        }

        // Store Skill Information
        if (!empty($request->skill_name)) {
            foreach ($request->skill_name as $index => $skill_name) {
                $skill_info = new Skills();
                $skill_info->profile_id = $personal_info->id;
                $skill_info->skill_name = $skill_name;
                $skill_info->skill_percentage = $request->skill_percentage[$index];
                $skill_info->save();
            }
        }

        // Store Language Information
        if (!empty($request->language)) {
            foreach ($request->language as $index => $language) {
                $language_info = new Languages();
                $language_info->profile_id = $personal_info->id;
                $language_info->language = $language;
                $language_info->language_level = $request->language_level[$index];
                $language_info->save();
            }
        }

        return redirect()->route('dashboard')->with('success-create', 'Resume created successfully');
    }

    public function edit()
    {
        $user_id = Auth::user()->id;

        // Retrieve the user's personal information along with related models
        $personal_information = PersonalInformation::where('user_id', $user_id)->with([
            'contactInformation',
            'education',
            'experience',
            'projects',
            'skills',
            'languages'
        ])->first();

        if (!$personal_information) {
            return redirect()->route('dashboard')->with('resume-notfound','No personal information found for this user.');
        }

        return view('edit_resume', compact('personal_information'));
    }

    public function update(Request $request)
    {
        $user_id = Auth::user()->id;

        // Retrieve the existing personal information
        $personal_info = PersonalInformation::where('user_id', $user_id)->first();

        if (!$personal_info) {
            return redirect()->route('dashboard')->withErrors('Personal information not found.');
        }


        // Update Personal Information
        $personal_info->full_name = $request->full_name;
        $personal_info->age = $request->age;
        $personal_info->profile_title = $request->profile_title;
        $personal_info->about_me = $request->about_me;

        if ($request->file('image_path')) {
            $picture = time() . '-' . $request->file('image_path')->getClientOriginalName();
            $request->file('image_path')->move(public_path('assets/img/profile'), $picture);
            $personal_info->image_path = 'assets/img/profile/' . $picture;
        }

        $personal_info->save();

        // Update Contact Information
        $contact_info = ContactInformation::where('profile_id', $personal_info->id)->first();
        if ($contact_info) {
            $contact_info->email = $request->email;
            $contact_info->phone_number = $request->phone_number;
            $contact_info->website = $request->website;
            $contact_info->linkedin_link = $request->linkedin_link;
            $contact_info->github_link = $request->github_link;
            $contact_info->twitter = $request->twitter;
            $contact_info->save();
        }

        // Update or Add Education Information
        if (!empty($request->degree_title)) {
            foreach ($request->degree_title as $index => $degree_title) {
                $education_id = $request->education_id[$index] ?? null;
                $institute = $request->institute[$index] ?? null;
                $edu_start_date = $request->edu_start_date[$index] ?? null;
                $edu_end_date = $request->edu_end_date[$index] ?? null;
                $education_description = $request->education_description[$index] ?? null;

                if ($education_id !== null) {
                    $education_info = Education::where('profile_id', $personal_info->id)->where('id', $education_id)->first();
                } else {
                    $education_info = new Education();
                    $education_info->profile_id = $personal_info->id;
                }

                if ($education_info) {
                    $education_info->degree_title = $degree_title;
                    $education_info->institute = $institute;
                    $education_info->edu_start_date = $edu_start_date;
                    $education_info->edu_end_date = $edu_end_date;
                    $education_info->education_description = $education_description;
                    $education_info->save();
                }
            }
        }

        // Update or Add Experience Information
        if (!empty($request->job_title)) {
            foreach ($request->job_title as $index => $job_title) {
                $experience_id = $request->experience_id[$index] ?? null;
                $organization = $request->organization[$index] ?? null;
                $job_start_date = $request->job_start_date[$index] ?? null;
                $job_end_date = $request->job_end_date[$index] ?? null;
                $job_description = $request->job_description[$index] ?? null;

                if ($experience_id !== null) {
                    $experience_info = Experience::where('profile_id', $personal_info->id)->where('id', $experience_id)->first();
                } else {
                    $experience_info = new Experience();
                    $experience_info->profile_id = $personal_info->id;
                }

                if ($experience_info) {
                    $experience_info->job_title = $job_title;
                    $experience_info->organization = $organization;
                    $experience_info->job_start_date = $job_start_date;
                    $experience_info->job_end_date = $job_end_date;
                    $experience_info->job_description = $job_description;
                    $experience_info->save();
                }
            }
        }

        // Update or Add Project Information
        if (!empty($request->project_title)) {
            foreach ($request->project_title as $index => $project_title) {
                $project_id = $request->project_id[$index] ?? null;
                $project_description = $request->project_description[$index] ?? null;

                if ($project_id !== null) {
                    $project_info = Projects::where('profile_id', $personal_info->id)->where('id', $project_id)->first();
                } else {
                    $project_info = new Projects();
                    $project_info->profile_id = $personal_info->id;
                }

                if ($project_info) {
                    $project_info->project_title = $project_title;
                    $project_info->project_description = $project_description;
                    $project_info->save();
                }
            }
        }

        // Update or Add Skill Information
        if (!empty($request->skill_name)) {
            foreach ($request->skill_name as $index => $skill_name) {
                $skill_id = $request->skill_id[$index] ?? null;
                $skill_percentage = $request->skill_percentage[$index] ?? null;

                if ($skill_id !== null) {
                    $skill_info = Skills::where('profile_id', $personal_info->id)->where('id', $skill_id)->first();
                } else {
                    $skill_info = new Skills();
                    $skill_info->profile_id = $personal_info->id;
                }

                if ($skill_info) {
                    $skill_info->skill_name = $skill_name;
                    $skill_info->skill_percentage = $skill_percentage;
                    $skill_info->save();
                }
            }
        }

        // Update or Add Language Information
        if (!empty($request->language)) {
            // dd($request->language, $request->all());
            foreach ($request->language as $index => $language) {
                $language_id = $request->language_id[$index] ?? null;
                $language_level = $request->language_level[$index] ?? null;

                if ($language_id !== null) {
                    $language_info = Languages::where('profile_id', $personal_info->id)->where('id', $language_id)->first();
                } else {
                    $language_info = new Languages();
                    $language_info->profile_id = $personal_info->id;
                }

                if ($language_info) {
                    $language_info->language = $language;
                    $language_info->language_level = $language_level;
                    $language_info->save();
                }
            }
        }


        return redirect()->route('resume.edit')->with('success-edit', 'Resume updated successfully');
    }

    public function view()
    {
        $user_id = Auth::user()->id;

        // Retrieve the personal information
        $personal_info = PersonalInformation::where('user_id', $user_id)->first();

        if (!$personal_info) {
            return redirect()->route('dashboard')->with('resume-notfound','Personal information not found.');
        }

        // Retrieve related information
        $contact_info = ContactInformation::where('profile_id', $personal_info->id)->first();
        $education_info = Education::where('profile_id', $personal_info->id)->get();
        $experience_info = Experience::where('profile_id', $personal_info->id)->get();
        $project_info = Projects::where('profile_id', $personal_info->id)->get();
        $skill_info = Skills::where('profile_id', $personal_info->id)->get();
        $language_info = Languages::where('profile_id', $personal_info->id)->get();

        return view('view_resume', [
            'personal_info' => $personal_info,
            'contact_info' => $contact_info,
            'education_info' => $education_info,
            'experience_info' => $experience_info,
            'project_info' => $project_info,
            'skill_info' => $skill_info,
            'language_info' => $language_info
        ]);
    }


    public function printPDF(Request $request)
    {

        $user_id = Auth::user()->id;

        $personal_info = PersonalInformation::where('user_id', $user_id)->first();

        if (!$personal_info) {
            return redirect()->route('dashboard')->with('resume-notfound','Personal information not found.');
        }

        // Retrieve related information
        $contact_info = ContactInformation::where('profile_id', $personal_info->id)->first();
        $education_info = Education::where('profile_id', $personal_info->id)->get();
        $experience_info = Experience::where('profile_id', $personal_info->id)->get();
        $project_info = Projects::where('profile_id', $personal_info->id)->get();
        $skill_info = Skills::where('profile_id', $personal_info->id)->get();
        $language_info = Languages::where('profile_id', $personal_info->id)->get();

        $documentTitle = 'Resume';
        return Pdf::loadView("pdf.resume", compact(
            'documentTitle',
            'personal_info',
            'contact_info',
            'education_info',
            'experience_info',
            'project_info',
            'skill_info',
            'language_info'
        ))
            ->set_option("isPhpEnabled", true)
            ->setPaper("a4")
            ->stream('docno.pdf');
    }
}
