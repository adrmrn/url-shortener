<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Libraries\Shortener; // use Shortener class

class UsersController extends Controller
{
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
     * Show the application user's dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $shortener = new Shortener;

        // Get User obj
        $user = Auth::user();

        // Get user's links
        $links = $user->links;

        // Get all links stats and convert for chart data
        $stats = $shortener->getAllLinksStats($user);

        return view('users.dashboard')->with('stats', $stats)->with('links', $links);
    }

    public function profile()
    {
        return view('users.profile');
    }

    public function listing()
    {
        return 'success';
    }
}
