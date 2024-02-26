<?php

namespace App\Http\Controllers;


use App\Http\Controllers\GroupController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        if ( Auth::check() )
        {
            $userController = new UserController();
            $adminInfo = $userController->getUser( Auth::user()->user_id );
            $admin = Auth::user();
            return view('home' , compact('admin' , 'adminInfo'));
        }
        else
        {
            return redirect(route('login'));
        }
    }

    public function login()
    {
        return view('login');
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
    public function show(string $id)
    {
        //
    }

    public function show_admins()
    {
        $userController = new UserController();
        $adminInfo = $userController->getUser( Auth::user()->user_id );
        $admin = Auth::user();
        $adminController = new AdminController();
        $admins = $adminController->getAdmins();
        return view('admin_list' , compact('admins' , 'admin' , 'adminInfo'));
    }
    public function search_admins()
    {
        if ( isset($_GET['search']))
        {
            $search = $_GET['search'];
        }
        else
        {
            $search = "";
        }
        $userController = new UserController();
        $adminInfo = $userController->getUser( Auth::user()->user_id );
        $admin = Auth::user();
        $adminController = new AdminController();
        $admins = $adminController->searchAdmin( $search );
        return view('admin_list' , compact('admins','search', 'admin' , 'adminInfo'));
    }

    public function show_users()
    {
        $userController = new UserController();
        $users = $userController->getUsers();
        $userController = new UserController();
        $adminInfo = $userController->getUser( Auth::user()->user_id );
        $admin = Auth::user();
        $massage = null;
        if ( \session('massage' ) )
        {
            $massage = \session('massage');
        }
        return view('user_list' , compact('users', 'admin' , 'adminInfo' , 'massage'));
    }

    public function search_users()
    {
        if ( isset($_GET['search']))
        {
            $search = $_GET['search'];
        }
        else
        {
            $search = "";
        }

        $userController = new UserController();
        $users = $userController->searchUser( $search );

        $userController = new UserController();
        $adminInfo = $userController->getUser( Auth::user()->user_id );
        $admin = Auth::user();
        return view('user_list' , compact('users','search', 'admin' , 'adminInfo'));
    }

    public function show_groups( $massage = null )
    {
        $groupController = new GroupController();
        $groups = $groupController->getGroups();
        $userController = new UserController();
        $adminInfo = $userController->getUser( Auth::user()->user_id );
        $admin = Auth::user();
        if ( \session('massage' ) )
        {
            $massage = \session('massage');
        }
        return view('group_list' , compact('groups', 'admin' , 'adminInfo' , 'massage'));
    }

    public function search_groups()
    {
        if ( isset($_GET['search']))
        {
            $search = $_GET['search'];
        }
        else
        {
            $search = "";
        }

        $groupController = new GroupController();
        $groups = $groupController->searchGroup($search);

        $userController = new UserController();
        $adminInfo = $userController->getUser( Auth::user()->user_id );
        $admin = Auth::user();
        return view('group_list' , compact('groups' , 'search', 'admin' , 'adminInfo'));
    }

    public function show_sessions( $massage = null )
    {
        $sessionController = new SessionController();
        $sessions = $sessionController->getSessions();
        $userController = new UserController();
        $adminInfo = $userController->getUser( Auth::user()->user_id );
        $admin = Auth::user();
        if ( \session('massage' ) )
        {
            $massage = \session('massage');
        }
        return view('sessions_list' , compact('sessions', 'admin' , 'adminInfo' , 'massage'));
    }

    public function search_sessions( $massage = null )
    {
        if ( isset($_GET['search']))
        {
            $search = $_GET['search'];
        }
        else
        {
            $search = "";
        }

        $sessionController = new SessionController();
        $sessions = $sessionController->searchSession($search);

        $userController = new UserController();
        $adminInfo = $userController->getUser( Auth::user()->user_id );
        $admin = Auth::user();
        return view('sessions_list' , compact('sessions' , 'search', 'admin' , 'adminInfo' , 'massage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
