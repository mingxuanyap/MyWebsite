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

        return redirect()->route('dashboard')->with('message', 'Resume created successfully');
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
            return redirect()->route('dashboard')->withErrors('No personal information found for this user.');
        }

        return view('edit-dashboard', ['personal_information' => $personal_information]);
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

    // Update Education Information
    if (!empty($request->degree_title)) {
        foreach ($request->degree_title as $index => $degree_title) {
            $education_info = Education::where('profile_id', $personal_info->id)->where('id', $request->education_id[$index])->first();
            if ($education_info) {
                $education_info->degree_title = $degree_title;
                $education_info->institute = $request->institute[$index];
                $education_info->edu_start_date = $request->edu_start_date[$index];
                $education_info->edu_end_date = $request->edu_end_date[$index];
                $education_info->education_description = $request->education_description[$index];
                $education_info->save();
            }
        }
    }

    // Update Experience Information
    if (!empty($request->job_title)) {
        foreach ($request->job_title as $index => $job_title) {
            $experience_info = Experience::where('profile_id', $personal_info->id)->where('id', $request->experience_id[$index])->first();
            if ($experience_info) {
                $experience_info->job_title = $job_title;
                $experience_info->organization = $request->organization[$index];
                $experience_info->job_start_date = $request->job_start_date[$index];
                $experience_info->job_end_date = $request->job_end_date[$index];
                $experience_info->job_description = $request->job_description[$index];
                $experience_info->save();
            }
        }
    }

    // Update Project Information
    if (!empty($request->project_title)) {
        foreach ($request->project_title as $index => $project_title) {
            $project_info = Projects::where('profile_id', $personal_info->id)->where('id', $request->project_id[$index])->first();
            if ($project_info) {
                $project_info->project_title = $project_title;
                $project_info->project_description = $request->project_description[$index];
                $project_info->save();
            }
        }
    }

    // Update Skill Information
    if (!empty($request->skill_name)) {
        foreach ($request->skill_name as $index => $skill_name) {
            $skill_info = Skills::where('profile_id', $personal_info->id)->where('id', $request->skill_id[$index])->first();
            if ($skill_info) {
                $skill_info->skill_name = $skill_name;
                $skill_info->skill_percentage = $request->skill_percentage[$index];
                $skill_info->save();
            }
        }
    }

    // Update Language Information
    if (!empty($request->language)) {
        foreach ($request->language as $index => $language) {
            $language_info = Languages::where('profile_id', $personal_info->id)->where('id', $request->language_id[$index])->first();
            if ($language_info) {
                $language_info->language = $language;
                $language_info->language_level = $request->language_level[$index];
                $language_info->save();
            }
        }
    }

    return redirect()->route('dashboard')->with('message', 'Resume updated successfully');
}

}
