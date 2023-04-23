<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Field;
use App\Models\Skill;
use App\Models\Social;
use App\Models\Industry;
use App\Models\Community;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\SocialRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EducationRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ExperienceRequest;
use App\Http\Requests\FieldIndustryRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth', 'admin'])->except(['connect', 'follow', 'unfollow', 'editing', 'memberUpdate']);
        $this->middleware(['auth', 'verified']);
    }
    public function profile(User $user)
    {
        $industries = Industry::select('id', 'name')->latest()->get();
        $fields = Field::select('id', 'name')->latest()->get();
        $communities = Community::select('id', 'name')->orderBy('name')->get();
        return view('member.user.edit', compact('user', 'communities', 'fields', 'industries'));
    }

    public function updateProfile(UserRequest $request, User $user)
    {
        $profile_id = Auth::user()->profile_id;
        // dd($profile_id);

        $user = User::findOrFail($user->id);

        if (Auth::user()->id != $user->id) {
            // if the user is not the owner of the education record, return an error
            abort(403, 'Unauthorized action.');
        }
        // generate a 10-digit random number
        $user->name = $request['name'];
        $user->last_name = $request['last_name'];
        $user->middle_name = $request['middle_name'];
        $user->date_of_birth = $request['date_of_birth'];
        $user->gender = $request['gender'];
        $user->city = $request['city'];
        $user->country = $request['country'];
        $user->community_id = $request['community_id'];
        $user->industry_id = $request['industry_id'];
        $user->work_experience = $request['work_experience'];
        $user->biography = $request['biography'];
        $user->linkedin_profile = $request['linkedin_profile'];
        $user->phone = $request['phone'];
        $user->whatsapp = $request['whatsapp'];
        // $user->slug = Str::slug($request->input('name') . '-' . $request->input('last_name') . '-' . $profile_id, '-');

        if ($request->hasFile('profile_photo_url')) {
            Storage::delete($user->profile_photo_url);
            $user->profile_photo_url = 'storage/' . $request->file('profile_photo_url')->store('userPhoto', 'public');
        }

        $user->save();
        return redirect()->back()->with('status', 'Updated');
    }

    public function storeSocial(SocialRequest $request)
    {
        $social = new Social();
        $social->twitter = $request['twitter'];
        $social->youtube = $request['youtube'];
        $social->instagram = $request['instagram'];
        $social->github = $request['github'];
        $social->website = $request['website'];
        $social->user_id = auth()->user()->id;
        $social->save();
        return redirect()->back()->with('social', 'Updated');
    }
    public function updateSocial(SocialRequest $request, User $user, Social $social)
    {
        // Find the Social record by the user ID
        $social = Social::where('user_id', $user->id)->firstOrFail();

        // Allow only the owner of the Social record to have access
        if (Auth::user()->id != $social->user_id) {
            abort(403, 'Unauthorized action.');
        }
        $social->twitter = $request->input('twitter');
        $social->youtube = $request->input('youtube');
        $social->instagram = $request->input('instagram');
        $social->github = $request->input('github');
        $social->website = $request->input('website');
        $social->save();
        return redirect()->back()->with('social', 'Updated');
    }

    public function storeSkill(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            "level" => 'required|string|max:255', 
        ]);

        $skill = new Skill();
        $skill->user_id = auth()->user()->id;
        $skill->title = $request['title'];
        $skill->level = $request['level']; 
        $skill->save();
        return redirect()->back()->with('skill', 'Updated');
    }

    public function updateSkill(Request $request, Skill $skill, User $user)
    {
        $skill = Skill::where('user_id', $user->id)->firstOrFail();
        if (Auth::user()->id != $skill->user_id) {
            abort(403, 'Unauthorized action.');
        }
        $skill->title = $request->input('title');
        $skill->level = $request->input('level');
        $skill->save();
        return redirect()->back()->with('skill', 'Updated');
    }
    public function storeExperience(ExperienceRequest $request)
    {
        $experience = new Experience();
        $experience->user_id = auth()->user()->id;
        $experience->title = $request['title'];
        $experience->company_name = $request['company_name'];
        $experience->employment_type = $request['employment_type'];
        $experience->start_date = $request['start_date'];
        $experience->end_date = $request['end_date'];
        $experience->work_description = $request['work_description'];
        // $experience->current_work = $request['current_work'] ?? true;
        $experience->part_time_work = $request['part_time_work'] ?? true;
        $experience->current_work = $request->has('current_work') ? 1 : 0;


        $experience->save();

        return redirect()->back()->with('experience', 'Saved');
    }

    public function updateExperience(ExperienceRequest $request, User $user, Experience $experience)
    {
        // Find the Social record by the user ID
        $experience = Experience::where('user_id', $user->id)->firstOrFail();

        // Allow only the owner of the Social record to have access
        if (Auth::user()->id != $experience->user_id) {
            abort(403, 'Unauthorized action.');
        }
        $experience->title = $request->input('title');
        $experience->company_name = $request->input('company_name');
        $experience->employment_type = $request->input('employment_type');
        $experience->start_date = $request->input('start_date');
        $experience->end_date = $request->input('end_date');
        $experience->work_description = $request->input('work_description');
        // $experience->current_work = $request->input('current_work');
        $experience->part_time_work = $request->input('part_time_work');
        $experience->current_work = $request->input('current_work') ? 1 : 0;
        $experience->save();

        return redirect()->back()->with('experience', 'Updated');
    }

    public function indexField()
    {
        $fields = Field::select('name', 'id')->paginate(10);
        return view('admin.fields.index', compact('fields'));
    }

    public function indexIndustry()
    {
        $industries = Industry::select('name', 'id')->paginate(10);
        return view('admin.industry.index', compact('industries'));
    }
    public function editField(Field $field)
    {
        return view('admin.fields.edit', compact('field'));
    }
    public function editIndustry(Industry $industry)
    {
        return view('admin.industry.edit', compact('industry'));
    }

    public function storeField(FieldIndustryRequest $request, Field $field)
    {

        $field = new Field();
        $field->name = $request['name'];
        $field->slug = Str::slug($request->input('name') . '-');
        $field->save();
        return redirect()->back()->with('status', 'Added');
    }

    public function storeIndustry(FieldIndustryRequest $request, Industry $industry)
    {

        $industry = new Industry();
        $industry->name = $request['name'];
        $industry->slug = Str::slug($request->input('name') . '-');
        $industry->save();
        return redirect()->back()->with('status', 'Added');
    }

    public function updateField(FieldIndustryRequest $request, Field $field)
    {
        $field->name = $request['name'];
        $field->slug = Str::slug($request->input('name') . '-');
        $field->save();
        return redirect(route('field.index'))->with('status', 'Updated');
    }

    public function updateIndustry(FieldIndustryRequest $request, Industry $industry)
    {
        $industry->name = $request['name'];
        $industry->slug = Str::slug($request->input('name') . '-');
        $industry->save();
        return redirect(route('industry.index'))->with('status', 'Added');
    }

    public function destroyField(Field $field)
    {
        $field->delete();
        return redirect()->back()->with('status', 'Deleted');
    }

    public function destroyindustry(Industry $industry)
    {
        $industry->delete();
        return redirect()->back()->with('status', 'Deleted');
    }

    public function storeEducation(EducationRequest $request)
    {
        $education = new Education([
            'school_name' => $request->input('school_name'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'degree' => $request->input('degree'),
            'field_id' => $request->input('field_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'status' => $request->input('status'),
            'user_id' => auth()->id(),
        ]);
        $education->save();
        return redirect()->back()->with('education', 'Saved');
    }
    public function updateEducation(EducationRequest $request, User $user, Education $education)
    {
        // Find the Social record by the user ID
        $education = Education::where('user_id', $user->id)->firstOrFail();

        // Allow only the owner of the Social record to have access
        if (Auth::user()->id != $education->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $education->school_name = $request->input('school_name');
        $education->country = $request->input('country');
        $education->city = $request->input('city');
        $education->degree = $request->input('degree');
        $education->field_id = $request->input('field_id');
        $education->start_date = $request->input('start_date');
        $education->end_date = $request->input('end_date');
        // $education->status = $request->input('status');
        $education->current_work = $request->has('status') ? 1 : 0;

        $education->save();

        return redirect()->back()->with('education', 'Updated');
    }
}
