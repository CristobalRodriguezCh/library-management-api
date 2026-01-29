<?php

namespace App;

use Illuminate\Database\Eloquent\{Model,SoftDeletes};
use App\Author;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'published_date',
        'isbn',
        'author_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

}
