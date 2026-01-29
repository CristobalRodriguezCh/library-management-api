<?php

namespace App\Services;

use App\Book;
use App\Events\BookCreated;
use Illuminate\Support\Facades\DB;

class BookService extends BaseService
{
    public function __construct(Book $book)
    {
        parent::__construct($book);
    }

    public function create(array $data)
    {
        DB::beginTransaction();
        
        try {
            $book = parent::create($data);
            event(new BookCreated($book));
            DB::commit();
            return $book->load('author.user');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getAllWithAuthors()
    {
        return $this->model->with('author.user')->get();
    }

    public function getByIdWithAuthor($id)
    {
        return $this->model->with('author.user')->find($id);
    }
}