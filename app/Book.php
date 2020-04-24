<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    public $fillable = [
        'name',
        'author_name',
        'quantity',
        'synopsis',
    ];

    public function users()
    {
        return $this->belongsToMany("App\User", "user_book");
    }
}
