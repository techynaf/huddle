<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\User;
use Validator;
use Session;

class HomeController extends Controller
{
    private $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();

        return $this->homeView($branches);
    }

    public function branchFilter (Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        if ($request->id == 'all') {
            return redirect('/');
        }

        $branch = Branch::where('id', $request->id)->get();
        
        return $this->homeView($branch);
    }

    public function userFilter (Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        $f_name = explode(' ', $request->name);
        $f_name = $f_name[0];

        $user = User::where('f_name', $request->name)->where()->get();

        if ($user == null) {
            return redirect()->with('error', 'There are no');
        } else {
            $url = '/view/employee/'.$id;
            return redirect($url);
        }
        
    }

    public function homeView($branches)
    {
        $users = User::all();
        $filters = Branch::all();

        return view('home')->with('users', $users)->with('branches', $branches)->with('days', $this->days)->
        with('filters', $filters);
    }
}
