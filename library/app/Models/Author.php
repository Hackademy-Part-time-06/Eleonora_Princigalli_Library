<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable= ['name','surname','birthday'];

    public function books ()
    {
        return $this->hasMany(Book::class); //questo model author ha molti libri books
    }
}
