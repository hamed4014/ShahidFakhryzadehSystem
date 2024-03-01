<?php

namespace App\Http\Controllers;

use App\Http\Requests\sessionRequest;
use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\MainController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getSessions()
    {
        $sessions = Session::paginate(10);
        return $sessions;
    }

    public function searchSession( string $text )
    {
        $sessions = Session::where('date', 'like', "%$text%")
            ->paginate(10);
        return $sessions;
    }

    public function getSession( string $date )
    {
        $sessions = Session::where('date', $date)->get();
        return $sessions;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userController = new UserController();
        $adminInfo = $userController->getUser( Auth::user()->user_id );
        $admin = Auth::user();
        return view('create_session' , compact('admin' , 'adminInfo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(sessionRequest $request)
    {
        $session = new Session;
        $session->date = $request->date;
        $session->save();
        $massage = "جلسه جدید با موفقیت ثبت شد.";
        \session()->flash( 'massage' , $massage);
        return redirect( route('home.session_list') );
    }

    public function storePrivate( string $date)
    {
        $session = new Session;
        $session->date = $date;
        $session->save();
        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
        //
    }
}
