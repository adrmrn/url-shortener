<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateLinkRequest;
use App\Http\Requests\EditLinkRequest;
use Auth;
use App\Libraries\Shortener; // use Shortener class
use App\Link;
use App\Click;
use DB;
use Session;


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
        $user = Auth::user();
        $links = Link::where([ ['user_id', $user->id], ['status', '1'] ])->paginate(10);

        return view('links.index')->with('links', $links);
    }

    public function create()
    {
        return view('links.create');
    }

    public function redirect($short_url, Request $request) 
    {
        $shortener = new Shortener;

        // Checking if Link exist
        if (!$shortener->checkIfLinkExist($short_url)) {
            return redirect('/');
        }        

        // Get Link obj
        $link = Link::where([ ['short_url', '=', $short_url], ['status', '=', '1'] ])->first();

        // Create Click obj
        $click = $shortener->createClick($request);

        // Save Click to DB
        $link->clicks()->save($click);

        // All is fine, redirect to url
        return redirect(Shortener::decodeUrl($link->url));
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

        // Put flash message to session
        flash(1, 'Link added!');

        return redirect()->action('LinksController@preview', ['short_url' => $link->short_url]);
    }

    public function remove($short_url)
    {
        $shortener = new Shortener;

        // Checking if Link exist
        $shortener->checkIfLinkExist($short_url);

        // Get Link obj
        $link = Link::where([ ['short_url', '=', $short_url], ['status', '=', '1'] ])->first();
        
        // Get User obj
        $user = Auth::user();

        // Check if user has access to Link 
        $shortener->checkAccessToLink($user, $link);

        return view('links.remove')->with('link', $link);
    }

    public function deactivate($short_url)
    {
        $shortener = new Shortener;

        // Checking if Link exist
        $shortener->checkIfLinkExist($short_url);

        // Get Link obj
        $link = Link::where([ ['short_url', '=', $short_url], ['status', '=', '1'] ])->first();
        
        // Get User obj
        $user = Auth::user();

        // Check if user has access to Link 
        $shortener->checkAccessToLink($user, $link);

        // Deactivate Link
        $shortener->deactivateShortLink($link);
        flash(1, 'Link has been removed!');

        // All is fine, deactivate link
        return redirect('links');
    }

    public function edit($short_url)
    {
        $shortener = new Shortener;

        // Checking if Link exist
        $shortener->checkIfLinkExist($short_url);

        // Get Link obj
        $link = Link::where([ ['short_url', '=', $short_url], ['status', '=', '1'] ])->first();
        
        // Get User obj
        $user = Auth::user();

        // Check if user has access to Link 
        $shortener->checkAccessToLink($user, $link);

        // All is fine, show edit link
        return view('links.edit')->with('link', $link);
    }

    public function preview($short_url)
    {
        $shortener = new Shortener;

        // Checking if Link exist
        if ($shortener->checkIfLinkExist($short_url) === false) {
            return redirect('dashboard');
        }

        // Get Link obj
        $link = Link::where([ ['short_url', '=', $short_url], ['status', '=', '1'] ])->first();
        
        // Get User obj
        $user = Auth::user();

        // Check if user has access to Link 
        $shortener->checkAccessToLink($user, $link);

        // Get link's stats and convert for chart data
        $stats = $shortener->getLinkStats($link);

        // All is fine, show view with link
        return view('links.preview')->with('link', $link)->with('stats', $stats);
    }

    public function update(EditLinkRequest $request, $short_url) {
        $shortener = new Shortener;

        // Checking if Link exist
        $shortener->checkIfLinkExist($short_url);

        // Get Link obj
        $link = Link::where([ ['short_url', '=', $short_url], ['status', '=', '1'] ])->first();
        
        // Get User obj
        $user = Auth::user();

        // Check if user has access to Link
        $shortener->checkAccessToLink($user, $link);

        // Update Link
        $shortener->editShortLink($link, $request->only(['url', 'description']));
        flash(1, 'Link has been updated!');

        // All is fine, show view with link
        return redirect()->action(
            'LinksController@preview', ['short_url' => $short_url]
        );
    }
}
