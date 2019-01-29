<?php

namespace App\Http\Controllers;

use App\Models\Tenant\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function createBlog(Request $request){
        $blog = Blog::create($request->all());
        return redirect()->back()->with('status','Added Success');
    }
}
