<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\bookRequest;
use Illuminate\Support\Facades\Auth;

class Pagecontroller extends Controller
{
    public function index()
    {

        /*  if (Auth::user()) {
            //Filtra i libri
            $books = Book::where('user_id', Auth::user()->id)->get();
        } else {
            $books = Book::all();
        } */
        $books = Book::all();


        return view('books.index', ['books' => $books]);
    }
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();


        return view('books.form', compact('authors'), compact('categories')); //['authors'=> $authors]
    }
    public function store(bookRequest $request)
    {

        $path_image = '';

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $path_name = $request->file('image')->getClientOriginalName();


            $path_image = $request->file('image')->storeAs('public/images', $path_name);
        }

        $data = Book::create([

            'title' => $request->title,
            'author_id' => $request->author_id,
            'pages' => $request->pages,
            'year' => $request->year,
            'image' => $path_image,
            'user_id' => Auth::user()->id
        ]);
        $data->categories()->attach($request->categories); // Scrive nella tabella pivot di BOOK con CATEGORY
        return redirect()->route('books.index')->with('success', 'Creazione avvenuta con successo!');
    }



    public function show(Book $book)
    {

//$categories= Category::all();

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
        if (!(Auth::user()->id == $book->user_id)) {
            abort(401);
        }
        $authors = Author::all();
        $categories = Category::all();

        return view('books.edit', ['book' => $book], compact('authors', 'categories'));
    }


    public function update(bookRequest $request, Book $book)
    {

        $path_image = $book->image;

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

        $book->categories()->sync($request->categories);

        return redirect()->route('books.index')->with('success', 'Modifica avvenuta con successo!');
    }

    public function destroy(Book $book)
    {

$book->categories()->detach();
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Cancellazione avvenuta con successo!');
    }
}
