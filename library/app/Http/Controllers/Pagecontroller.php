<?php

namespace App\Http\Controllers;

use App\Http\Requests\bookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class Pagecontroller extends Controller
{
    public function index()
    {

        $book = Book::all();

        return view('books.index', ['books' => $book]);
    }
    public function create()
    {


        return view('books.form');
    }
    public function store(bookRequest $request)
    {

        $path_image = '';

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $path_name = $request->file('image')->getClientOriginalName();


            $path_image = $request->file('image')->storeAs('public/images', $path_name);
        }

        Book::create([

            'title' => $request->title,
            'author_id' => $request->author_id,
            'pages' => $request->pages,
            'year' => $request->year,
            'image' => $path_image,
        ]);
        return redirect()->route('books.index')->with('success', 'Creazione avvenuta con successo!');
    }



    public function show(Book $book)
    {


        return view('books.show', ['book' => $book]);
    }


    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }


    public function edit(Book $book)
    {


        return view('books.edit', ['book' => $book]);
    }


    public function update(bookRequest $request, Book $book)
    {

        $path_image = $book -> image;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $path_name = $request->file('image')->getClientOriginalName();


            $path_image = $request->file('image')->storeAs('public/images', $path_name);
        }

        $book->update([

            'title' => $request->title,
            'author_id' => $request->author_id,
            'pages' => $request->pages,
            'year' => $request->year,
            'image' => $path_image,
        ]);
        return redirect()->route('books.index')->with('success', 'Modifica avvenuta con successo!');
    }

 public function destroy(Book $book)
    {
       

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Cancellazione avvenuta con successo!');
    }



}
