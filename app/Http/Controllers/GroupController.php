<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Controllers\MainController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getGroupWhithName( $name )
    {
        $groups = Group::where( 'name' , $name)->get();
        if ( count( $groups ) == 0 )
        {
            return false;
        }
        else
        {
            return $groups[0];
        }
    }

    public function getAllGroups()
    {
        $groups = Group::all();
        return $groups;
    }

    public function getGroups()
    {
        $groups = Group::paginate(10);
        return $groups;
    }

    public function searchGroup( string $text )
    {
        $groups = Group::where('name', 'like', "%$text%")
            ->orWhere('teacher', 'like', "%$text%")
            ->paginate(10);
        return $groups;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userController = new UserController();
        $adminInfo = $userController->getUser( Auth::user()->user_id );
        $admin = Auth::user();
        return view('create_group' , compact('admin' , 'adminInfo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $group = new Group;
        $group->name = $request->name;
        $group->teacher = $request->teacher;
        $group->save();
        $massage = "ایجاد حلقه با موفقیت انجام شد.";
        \session()->flash( 'massage' , $massage);
        return redirect( route('home.group_list') );
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }
}
