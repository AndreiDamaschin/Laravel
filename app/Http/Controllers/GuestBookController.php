<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GuestBook;

class GuestBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = ['text' => GuestBook::latest()->paginate(25), 'count' => GuestBook::count()];
        return view("guestBook.edit", $data);
    }

    public function text(Request $req)
    {
       GuestBook::create(['email' => $req -> email, 'text' => $req -> text, 'attach' => $req -> attach]);
    }
}
