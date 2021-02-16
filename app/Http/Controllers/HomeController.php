<?php

namespace App\Http\Controllers;

use App\Models\BookLibrary;

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

    public function display()
    {
        $bookLibrary = BookLibrary::with('book')->orderBy('created_at', 'desc')->get();

        return view('display', [
            'bookLibrary' => $bookLibrary
        ]);
    }
}
