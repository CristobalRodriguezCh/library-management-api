<?php

namespace App;

use Illuminate\Database\Eloquent\{Model,SoftDeletes};

use App\{Book,User};

class Author extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'biography',
        'books_count',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
