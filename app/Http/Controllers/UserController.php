<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getUsers()
    {
        $users_t = User::paginate(10);
        $i = 0;
        $groups = null;
        foreach ($users_t as $user_t)
        {
            $group = User::findOrFail($user_t -> group_id) -> getGroup_id;
            $groups[$i] = $group;
            $i++;
        }
        $users = ['users' => $users_t , 'groups' => $groups];
        return $users;
    }

    public function getAllUsersName() {
        $users = User::select('id' , 'fname' , 'lname' , 'national_code') -> get();
        return $users;
    }

    public function getUser( $id )
    {
        $user = User::findOrFail($id);
        return $user;
    }

    public function getUserWithNationalCode( $national_code )
    {
        $user = User::where('national_code' , $national_code )->get();
        if ( count($user) == 0 )
        {
            return false;
        }
        else
        {
            return $user[0];
        }
    }

    public function searchUser( string $text )
    {
        $users_t = User::where('national_code', 'like', "%$text%")
            ->orWhere('fname', 'like', "%$text%")
            ->orWhere('lname', 'like', "%$text%")
            ->orWhere('father', 'like', "%$text%")
            ->orWhere('case_status', 'like', "%$text%")
            ->paginate(10);
        $i = 0;
        $groups = null;
        foreach ($users_t as $user_t)
        {
            $group = User::findOrFail($user_t -> group_id) -> getGroup_id;
            $groups[$i] = $group;
            $i++;
        }
        $users = ['users' => $users_t , 'groups' => $groups];
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groupController = new GroupController();
        $groups_t = $groupController->getAllGroups();
        $groups = null;
        foreach ($groups_t as $group)
        {
            $groups[$group->id] = $group->name;
        }
        $userController = new UserController();
        $adminInfo = $userController->getUser( Auth::user()->user_id );
        $admin = Auth::user();

        return view('create_user' , compact('admin' , 'adminInfo' , 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(registerUserRequest $request)
    {

        $birthday = $request->birthday;
        $check = false;
        $year = (int) substr($birthday , 0 , 4);
        $month = (int) substr($birthday , 5 , 2);
        $day = (int) substr($birthday , 8 , 2);

        if ( $year >= 1300 || $year <= 1450)
        {
            if ( $month > 0 && $month < 7 )
            {
                if ( $day > 0 && $day < 32 )
                {
                    $check = true;
                }
            }
            elseif ( $month > 6 && $month < 13 )
            {
                if ( $day > 0 && $day < 31 )
                {
                    $check = true;
                }
            }
        }

        if ( !$check )
        {
            \session()->flash( 'error' , "تاریخ تولد صحیح نمی باشد." );
            return redirect(route('create.user'));
        }

        $user = new User;
        $user->national_code = $request->national_code;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->father = $request->father;
        $user->birthday = $request->birthday;
        $user->case_status = $request->case_status;
        $user->group_id = $request->group;
        $user->save();

        $massage = "ثبت نام با موفقیت انجام شد.";
        \session()->flash( 'massage' , $massage);
        return redirect( route('home.user_list') );

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
