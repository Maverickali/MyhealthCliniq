<?php

namespace App\Http\Controllers;


use Activity;

use App\Models\Profile;
use App\Models\User;
use App\Traits\CaptureIpTrait;
use Auth;
use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Role;
use Validator;

class UserController extends Controller
{

//  use RegistersUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $currentUser = Auth::user();
        $user = User::find($currentUser->id);


        if ($currentUser->isAdmin()) {
            return view('pages.admin.home');
        }

        return view('pages.user.home');


    }

    public function update(Request $request, $id )
    {
        $currentUser = Auth::user();

        $user = User::find($id);
        $user->detachAllRoles();
        $user->attachRole($request->input('role'));

        $user->save();

        return view('pages.user.home')->with('success', 'welcome');


    }


    public function showRegistrationForm()
    {
//        $roles = Role::Orderby('name')->pluck('name', 'id');


        return view('auth.register', compact('roles'));
    }

}
