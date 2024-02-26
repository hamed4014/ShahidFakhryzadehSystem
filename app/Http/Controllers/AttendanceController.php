<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\groupController;
use Illuminate\Support\Facades\Auth;
require_once app_path('helper/jdf.php');

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $userController = new UserController();
        $users = $userController->getAllUsersName();
        $groupController = new GroupController();
        $groups = $groupController->getAllGroups();
        $date = jdate('Y/m/d');
        $adminInfo = $userController->getUser( Auth::user()->user_id );
        $admin = Auth::user();
        return view('present' , compact('users', 'groups', 'date' , 'admin' , 'adminInfo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userController = new UserController();
        $users = $userController->getAllUsersName();
        $groupController = new GroupController();
        $groups = $groupController->getAllGroups();
        $user = $userController->getUserWithNationalCode( $request->national_code);
        $group = $groupController->getGroupWhithName( $request->group );


        if ($user == false)
        {
            \session()->flash('user_error' , 'کاربر مورد نظر یافت نشد.');
        }
        if ($group == false)
        {
            \session()->flash('group_error' , 'حلقه مورد مورد نظر یافت نشد.');
        }
        dd($request->)
        $time = jmktime(0,0,0,12,5,1402);
        dd( time() - $time );


        $date = jdate('Y/m/d');
        $adminInfo = $userController->getUser( Auth::user()->user_id );
        $admin = Auth::user();
        return view('present' , compact('users', 'groups', 'date' , 'admin' , 'adminInfo'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
