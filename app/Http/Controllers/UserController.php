<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Field;
use App\Models\Skill;
use App\Models\Connect;
use App\Models\Follower;
use App\Models\Industry;
use App\Models\Community;
use App\Mail\MailNewFollow;
use Illuminate\Support\Str;
use App\Mail\MailNewAccount;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['connect', 'follow', 'unfollow', 'editing', 'logout']);
    }

    public function index(Request $request)
    {
        $search = $request->get('search');

        $users = User::query()
            ->select('id', 'name', 'last_name', 'profile_photo_url', 'email', 'role', 'community_id')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->paginate(10);
        $communities = Community::select('id', 'name')->latest()->get();
        return view('admin.users.index', compact('users', 'communities'));
    }

    public function store(Request $request)
    {

        $profile_id = strval(random_int(1000000000, 9999999999)); // generate a 10-digit random number

        $user = new User();
        $user->name = $request['name'];
        $user->role = $request['role'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->community_id = $request['community_id'];
        $user->profile_id = $profile_id;
        $user->password = Hash::make($request['password']);
        $user->slug = Str::slug($request->input('name') . '-' . $request->input('last_name') . '-' . $profile_id, '-');

        $user->save();

        return redirect()->route('users.index')->with('status', 'Saved Successfully!');
    }

    public function show(User $user)
    {
        DB::table('users')->increment('views');
        return view('admin.users.show', compact('user'));
    }
    public function edit(User $user, Skill $skill)
    {

        $skill = Skill::all();
        $fields = Field::all();
        $industries = Industry::all();
        $communities = Community::select('id', 'name')->latest()->get();
        if (auth()->user()->role === 'admin') {
            return view('admin.users.edit', compact('user', 'communities'));
        } else {

            return view('member.profile.edit', compact('user', 'industries', 'communities', 'fields', 'skill'));
        }
    }



    public function update(UserRequest $request, User $user)
    {
        $user->name = $request['name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->role = $request['role'];
        $user->password = Hash::make($request['password']);
        $user->slug = Str::slug($request->input('name') . '-' . $request->input('last_name'), '-');

        $user->save();

        return redirect()->route('users.index')->with('status', 'User updated successfully');
    }
 
    public function connect(Request $request)
{
    $user = Auth::user();
    $connectedTo = User::findOrFail($request->connected_to);
    
    // Check if the user has already connected to the other user
    $existingConnect = $user->connections()->where('connected_to', $connectedTo->id)->first();
    
    if ($existingConnect) {
        $existingConnect->delete();
        return redirect()->back()->with(['status' => 'Unconnected.'], 422);
    }

    $connect = new Connect();
    $connect->user_id = $user->id;
    $connect->connected_to = $connectedTo->id;

    $connect->save();
    return redirect()->back()->with(['status' => 'Now connected.']);
}



    public function follow(Request $request)
    {
        $request->validate([
            'followee_id' => 'required|unique:followers',
        ]);

        $follower = new Follower();
        $follower->user_id = Auth::user()->id;
        $follower->followee_id = $request->followee_id;
        $follower->save();

        Mail::to($follower->user->email)->send(new MailNewFollow($follower));

        return redirect()->back()->with(['status' => 'Now following.']);
    }

    public function unfollow(Request $request)
    {
        $request->validate([
            'followee_id' => 'required|exists:followers',
        ]);

        $follower = Follower::where('user_id', Auth::user()->id)
            ->where('followee_id', $request->followee_id)
            ->first();

        if ($follower) {
            $follower->delete();
            return redirect()->back()->with(['status' => 'Unfollowing.']);
        }
    }


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()
            ->with('status', 'User deleted successfully.');
    }
    
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'))->with('status', 'Logout Successfully');
    }
}
