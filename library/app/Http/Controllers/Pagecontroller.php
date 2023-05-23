<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class Pagecontroller extends Controller
{
    public function index(){

        $book= Book::all();

        return view('index',['books'=>$book]);

    }
}
