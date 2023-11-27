<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Auth;

class ProfileController extends Controller
{

    protected $profie;

    public function __construct(User $profile)
    {
        // $this->middleware('auth');
        $this->profile=$profile;
    }

    public function index()
    {
        
        return view('profile.index');
    }

    public function update(ProfileRequest $request)
    {
        $input=$request->all();
        $user=Auth::user();
        $user->name=$input['name'];
        $user->phone=$input['phone'];
        $user->address=$input['address'];
        $user->save();


        return redirect()->route('profile')->with('profile_update', 'Profile updated!');
    }
}
