<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
//use Auth;
use Illuminate\Support\Facades\Auth;



class ProfileController extends Controller
{



    public function __construct(User $profile)
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $user= Auth::user();
        return view('profile.index', compact ('user'));
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