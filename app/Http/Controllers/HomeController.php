<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookLibrary;
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

    public function display()
    {
        $bookLibrary = BookLibrary::with('book')->orderBy('library_id', 'asc')->get();

        return view('display', [
            'bookLibrary' => $bookLibrary
        ]);
    }
}
