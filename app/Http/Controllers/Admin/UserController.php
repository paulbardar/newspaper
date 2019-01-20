<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\User;
use App\Category;
use App\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeUserMail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname'=>'required|string',
            'lastname'=>'required|string',
            'email'=>'required|email|unique:users,email',

        ]);

        $password = str_random(16);

        $user = User::create([
            'email'=>$request->email,
            'password'=>bcrypt($password),
            'role'=>$request->role ? $request->role : 'user'
        ]);

        if($user){
            $profile = Profile::create([
                'user_id'=>$user->id,
                'firstname'=>$request->firstname,
                'lastname'=>$request->lastname
            ]);

            if($profile){
                Session::flash('success', "User has been created");
                Mail::to($request->email)->send(new WelcomeUserMail($request->firstname,$request->lastname,$password));
            }else{
                Session::flash('error', 'User has not been created');
                User::destroy($user->id);
            }
        }
        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'firstname'=>'required|string',
            'lastname'=>'required|string',
            'password'=>'nullable|string|confirmed'
        ]);


        if($request->password && $request->password_confirmation && $request->password == $request->password_confirmation){
            $user->password = bcrypt($request->password);
        }

        $user->profile->firstname = $request->firstname;
        $user->profile->lastname = $request->lastname;
        $user->profile->phone = $request->phone;
        $user->profile->sex = $request->sex;
        $user->profile->address = $request->address;
        $user->profile->country = $request->country;
        $user->profile->region = $request->region;
        $user->profile->city = $request->city;

        if($user->save() && $user->profile->save()){
            Session::flash('success', 'User updated');
            return redirect('/admin/users');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(User::destroy($user->id)){
            Session::flash('success', 'User deleted');
            return redirect()->back();
        }
    }
}
