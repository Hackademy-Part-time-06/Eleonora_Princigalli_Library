<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
 
    public function index(){

        $category= Category::all();

        return view('categories.index',['categories'=>$category]);

    }
    public function create(){

        $books= Book::all();

        return view('categories.create', compact('books'));

    }
    public function store(categoryRequest $request)
    {

        
        Category::create([

            'name' => $request->name,
            'book_id' => $request->book_id,
            
        ]);
        return redirect()->route('categories.index')->with('success', 'Creazione avvenuta con successo!');
    }

     

    public function show(Category $category){


        return view('categories.show', ['category' => $category]);
}

public function __construct()
    {
        $this->middleware('auth')->except('index');
    }


    public function edit(Category $category)
    {


        return view('categories.edit', ['category' => $category]);
    }


    public function update(categoryRequest $request, Category $category)
    {

        
        $category->update([

            'name' => $request->name,
            
            
        ]);
        return redirect()->route('categories.index')->with('success', 'Modifica avvenuta con successo!');
    }

 public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Cancellazione avvenuta con successo!');
    }





}


