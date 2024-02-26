<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    public function login( loginRequest $request )
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        if (Auth::attempt($credentials , false))
        {
            $request->session()->regenerate();
            return redirect(route('home'));
        }
        else
        {
            \session()->flash('error_login' , 'نام کاربری یا رمز عبور اشتباه است.');
            return back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

    public function getAdmins()
    {
        $admins_t = Admin::paginate(10);
        $i = 0;
        $groups = null;
        foreach ($admins_t as $admin_t)
        {
            $user = Admin::findOrFail($admin_t -> user_id) -> getUser_id;
            $users[$i] = $user;
            $i++;
        }
        $admins = ['admins' => $admins_t , 'users' => $users];
        return $admins;
    }

    public function searchAdmin( string $text )
    {
        $admins_t = Admin::where('responsibility', 'like', "%$text%")
            ->paginate(10);
        $i = 0;
        $users = null;
        foreach ($admins_t as $admin_t)
        {
            $user = Admin::findOrFail($admin_t -> user_id) -> getUser_id;
            $users[$i] = $user;
            $i++;
        }
        $admins = ['admins' => $admins_t , 'users' => $users];
        return $admins;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
