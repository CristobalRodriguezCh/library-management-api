<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Api\BaseController;
use App\Services\BookService;
use App\Http\Requests\Book\{StoreBookRequest,UpdateBookRequest};

class BookController extends BaseController
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        try {
            $books = $this->bookService->getAllWithAuthors();
            
            return response()->json([
                'success' => true,
                'data' => $books
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve books',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(StoreBookRequest $request)
    {
        try {
            $data = $request->all();
            $data['created_by'] = $this->getAuthUserId();
            
            $book = $this->bookService->create($data);
            
            return response()->json([
                'success' => true,
                'message' => 'Book created successfully',
                'data' => $book
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create book',
                'error' => $e->getMessage()
            ], $e->getCode() ?: 500);
        }
    }

    public function show($id)
    {
        try {
            $book = $this->bookService->getByIdWithAuthor($id);
            
            if (!$book) {
                return response()->json([
                    'success' => false,
                    'message' => 'Book not found'
                ], 404);
            }
            
            return response()->json([
                'success' => true,
                'data' => $book
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve book',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(UpdateBookRequest $request, $id)
    {
        try {
            $data = $request->all();
            $data['updated_by'] = $this->getAuthUserId();
            
            $book = $this->bookService->update($id, $data);
            
            if (!$book) {
                return response()->json([
                    'success' => false,
                    'message' => 'Book not found'
                ], 404);
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Book updated successfully',
                'data' => $book
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], $e->getCode() ?: 500);
        }
    }

    public function destroy($id)
    {
        try {
            $this->bookService->delete($id, $this->getAuthUserId());
            
            return response()->json([
                'success' => true,
                'message' => 'Book deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], $e->getCode() ?: 500);
        }
    }

    public function export()
    {
        $books = $this->bookService->getAllWithAuthors();
        
        return $this->exportToExcel(
            $books,
            'books',
            'Books',
            [
                'ID' => 'id',
                'Title' => 'title',
                'Description' => 'description',
                'ISBN' => 'isbn',
                'Published Date' => 'published_date',
                'Author Name' => 'author.user.name',
                'Author Email' => 'author.user.email',
                'Created At' => 'created_at',
            ]
        );
    }
}