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
        // $links = Link::where([ ['user_id', $user->id], ['status', '1'] ])->get();
        $links = Link::where([ ['user_id', $user->id], ['status', '1'] ])->paginate(10);

        return view('links.index')->with('links', $links);
    }

    public function create()
    {
        return view('links.create');
    }

    public function redirect($short_url, Request $request) 
    {
        // Check if link exist
        if (Link::where([ ['short_url', '=', $short_url], ['status', '=', '1'] ])->count() === 0) {
            flash(0, 'Link doesn\'t exist!');

            return redirect('dashboard');
        }

        $link = Link::where([ ['short_url', '=', $short_url], ['status', '=', '1'] ])->first();

        $shortener = new Shortener;

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
        // Check if link exist
        if (Link::where([ ['short_url', '=', $short_url], ['status', '=', '1'] ])->count() === 0) {
            flash(0, 'Link doesn\'t exist!');

            return redirect('dashboard');
        }

        $link = Link::where([ ['short_url', '=', $short_url], ['status', '=', '1'] ])->first();
        $user = Auth::user();

        // Check if user is link's owner
        if (!$user->links($link)) {
            // User isn't owner, no access, redirect to dashboard with error
            flash(0, 'No access to remove link!');

            return redirect('dashboard');
        }

        return view('links.remove')->with('link', $link);
    }

    public function deactivate($short_url)
    {
        // Check if link exist
        if (Link::where([ ['short_url', '=', $short_url], ['status', '=', '1'] ])->count() === 0) {
            flash(0, 'Link doesn\'t exist!');

            return redirect('dashboard');
        }

        $link = Link::where([ ['short_url', '=', $short_url], ['status', '=', '1'] ])->first();
        $user = Auth::user();

        // Check if user is link's owner
        if (!$user->links($link)) {
            // User isn't owner, no access, redirect to dashboard with error
            flash(0, 'No access to remove link!');

            return redirect('dashboard');
        }

        $shortener = new Shortener;
        $shortener->deactivateShortLink($link);

        flash(1, 'Link has been removed!');

        // All is fine, deactivate link
        return redirect('dashboard');
    }

    public function edit($short_url)
    {
        // Check if link exist
        if (Link::where([ ['short_url', '=', $short_url], ['status', '=', '1'] ])->count() === 0) {
            flash(0, 'Link doesn\'t exist!');

            return redirect('dashboard');
        }

        $link = Link::where([ ['short_url', '=', $short_url], ['status', '=', '1'] ])->first();
        $user = Auth::user();

        // Check if user is link's owner
        if (!$user->links($link)) {
            // User isn't owner, no access, redirect to dashboard with error
            flash(0, 'No access to preview link!');

            return redirect('dashboard');
        }

        // All is fine, show edit link
        return view('links.edit')->with('link', $link);
    }

    public function preview($short_url)
    {
        // Check if link exist
        if (Link::where([ ['short_url', '=', $short_url], ['status', '=', '1'] ])->count() === 0) {
            flash(0, 'Link doesn\'t exist!');

            return redirect('dashboard');
        }

        $link = Link::where([ ['short_url', '=', $short_url], ['status', '=', '1'] ])->first();
        $user = Auth::user();

        // Check if user is link's owner
        if (!$user->links($link)) {
            // User isn't owner, no access, redirect to dashboard with error
            flash(0, 'No access to preview link!');

            return redirect('dashboard');
        }

        // All is fine, show view with link
        return view('links.preview')->with('link', $link);
    }

    public function update(EditLinkRequest $request, $short_url) {
        //dd($request->all());
        //dd($short_url);

        // Check if link exist
        if (Link::where([ ['short_url', '=', $short_url], ['status', '=', '1'] ])->count() === 0) {
            flash(0, 'Link doesn\'t exist!');

            return redirect('dashboard');
        }

        $link = Link::where([ ['short_url', '=', $short_url], ['status', '=', '1'] ])->first();
        $user = Auth::user();

        // Check if user is link's owner
        if (!$user->links($link)) {
            // User isn't owner, no access, redirect to dashboard with error
            flash(0, 'No access to edit link!');

            return redirect('dashboard');
        }

        $shortener = new Shortener;
        $shortener->editShortLink($link, $request->only(['url', 'description']));

        flash(1, 'Link has been updated!');

        // All is fine, show view with link
        return redirect()->action(
            'LinksController@preview', ['short_url' => $short_url]
        );
    }

    public function test() {
        echo 'sss';exit;
    }
}
