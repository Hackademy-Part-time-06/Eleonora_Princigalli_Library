<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
 
    public function index(){

        $category= Category::all();

        return view('categories.index',['categories'=>$category]);

    }
    public function create(){


        return view('categories.create');

    }
    public function store(categoryRequest $request)
    {

        
        Category::create([

            'name' => $request->name,
            
        ]);
        return redirect()->route('categories.index')->with('success', 'Creazione avvenuta con successo!');
    }

     

    public function show(Category $category){


        return view('categories.show', ['category' => $category]);
}}


