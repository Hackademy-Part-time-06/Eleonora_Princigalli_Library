<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable= ['title','pages','author_id','year','image','user_id'];

    public function author ()
{
    return $this->belongsTo(Author::class); //molti libri appartengono ad un autore Author
}


public function categories ()
{
    return $this->belongsToMany(Category::class); //Questo model Book ha molte categorie, un libro ha molte categorie
}

public function user ()
{
    return $this->belongsTo(User::class); 
}

}
