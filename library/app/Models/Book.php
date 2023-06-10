<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable= ['title','pages','author_id','year','image'];

    public function author ()
{
    return $this->belongsTo(Author::class); //molti libri appartengono ad un autore Author
}


public function category ()
{
    return $this->hasMany(Category::class); //Questo model Book ha molte categorie, un libro ha molte categorie
}


}
