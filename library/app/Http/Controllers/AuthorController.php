<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $author= Author::all();

        return view('author.index',['authors'=>$author]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        
        Author::create([

            'name' => $request->name,
            'surname' => $request->surname,
            'birthday' => $request->birthday,

            
        ]);
        return redirect()->route('authors.index')->with('success', 'Creazione avvenuta con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('author.show', ['authors' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('author.edit', ['authors' => $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author->update([

            'name' => $request->name,
            'surname' => $request->surname,
            'birthday' => $request->birthday,

            
            
        ]);
        return redirect()->route('authors.index')->with('success', 'Modifica avvenuta con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Cancellazione avvenuta con successo!');
    }
}
