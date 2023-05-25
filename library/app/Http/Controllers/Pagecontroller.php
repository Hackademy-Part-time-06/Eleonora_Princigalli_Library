<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class Pagecontroller extends Controller
{
    public function index(){

        $book= Book::all();

        return view('books.index',['books'=>$book]);

    }
    public function create(){


        return view('books.form');

    }
    public function store(Request $request)
    {

        $request->validate([
            "title" => "required|string",
            "pages" => "required|numeric",
            "author" => "required|string",
            "year"=>"required|numeric"
        ]);
       
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'pages' => $request->pages,
            'year' => $request->year,
        ]);
        return redirect()->route('books.index')->with('success', 'Creazione avvenuta con successo!');
    }

     

    public function show(Book $book){

           $mybook = Book::findOrFail($book);

       
        return view('books.show', ['book' => $book]);

 /* $mybook = Book::find($book);

        if (is_null($mybook)) {
             abort(404);
        }
        return view('books.show', ['book' => $book]);*/
}}
