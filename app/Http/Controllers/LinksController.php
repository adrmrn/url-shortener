<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateLinkRequest;
use Auth;
use App\Libraries\Shortener; // use Shortener class
use App\Link;
use DB;

class LinksController extends Controller
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
    public function index()
    {
        return view('links.index');
    }

    public function create()
    {
        return view('links.create');
    }

    public function store(CreateLinkRequest $request)
    {
        $shortener = new Shortener;

        // Prepare short link, return Link obj
        $link = $shortener->createShortLink($request->all());

        // Get User obj
        $user = Auth::user();

        // Save Link to DB
        if (!$user->links()->save($link)) {
            return back()
                        ->withInput()
                        ->withErrors(['Something\'s gone wrong, please try again!']);
        }
        
        return redirect()->action('LinksController@preview', ['short_url' => $link->short_url]);
    }

    public function remove()
    {
        return view('links.remove');
    }

    public function edit()
    {
        return view('links.edit');
    }

    public function preview($short_url)
    {
        // Check if link exist
        if (Link::where('short_url', $short_url)->count() === 0) {
            return redirect('dashboard')->withErrors(['Links doesn\'t exist!']);
        }

        $link = Link::where('short_url', $short_url)->first();
        $user = Auth::user();

        // Check if user is link's owner
        if (!$user->links($link)) {
            // User isn't owner, no access, redirect to dashboard with error
            return redirect('dashboard')->withErrors(['No access to preview link!']);
        }

        // All is fine, show view with link
        return view('links.preview')->with('link', $link);
    }

    public function test() {
        echo 'sss';exit;
    }
}
