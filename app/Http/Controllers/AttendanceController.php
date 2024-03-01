<?php

namespace App\Http\Controllers;

use App\Http\Requests\attendanceRequest;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\groupController;
use App\Http\Controllers\sessionController;
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
        $date = jdate('Y/m/d' , time() , '' , 'Asia/Tehran' , 'en');
        $adminInfo = $userController->getUser( Auth::user()->user_id );
        $admin = Auth::user();
        return view('present' , compact('users', 'groups', 'date' , 'admin' , 'adminInfo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(attendanceRequest $request)
    {
        $userController = new UserController();
        $users = $userController->getAllUsersName();
        $groupController = new GroupController();
        $groups = $groupController->getAllGroups();
        $user = $userController->getUserWithNationalCode( $request->national_code);
        $group = $groupController->getGroupWhithName( $request->group );


        if ($user == false)
        {
            \session()->now('user_error' , 'کاربر مورد نظر یافت نشد.');
        }
        if ($group == false)
        {
            \session()->now('group_error' , 'حلقه مورد مورد نظر یافت نشد.');
        }
        $date = tr_num( $request->date , 'en' , '.');
        $year = (int) substr( $date , 0 , 4 );
        $month = (int) substr( $date , 5 , 2 );
        $day = (int) substr( $date , 8 , 2 );
        $time = jmktime(0,0,0,$month,$day,$year);

        if ( time() - $time < 0 )
        {
            \session()->now('date_error' , 'تاریخ مورد نظر در آینده می باشد.');
        }

        if ( !( $user == false || $group == false || time() - $time < 0 ) )
        {
            $sessionController = new sessionController();
            $session = $sessionController->getSession($request->date);
            if ( count($session ) == 0 )
            {
                $check = $sessionController->storePrivate($request->date);
            }
            $session = $sessionController->getSession($request->date);
            $session = $session[0];
            $attendance = new Attendance();
            $attendance->user_id = $user->id;
            $attendance->session_id = $session->id;
            $attendance->group_id = $group->id;
            $attendance->save();
            \session()->now('success' , 'اطلاعات با موفقیت ثبت شد.');
        }

        $date = $request->date;
        $old_group = $request->group;
        $adminInfo = $userController->getUser( Auth::user()->user_id );
        $admin = Auth::user();
        return view('present' , compact('users', 'groups', 'date' , 'admin' , 'adminInfo' , 'old_group'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    public function showReportGroups()
    {
        $groupController = new groupController();
        $groups = $groupController->getAllGroups();
        $userController = new UserController();
        $adminInfo = $userController->getUser( Auth::user()->user_id );
        $admin = Auth::user();
        return view('ReportGroups' , compact( 'groups' , 'admin' , 'adminInfo'));
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
