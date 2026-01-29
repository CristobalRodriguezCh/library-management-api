<?php

namespace App\Services;

use App\Author;
use Illuminate\Support\Facades\DB;

class AuthorService extends BaseService
{
    protected $userService;

    public function __construct(Author $author, UserService $userService)
    {
        parent::__construct($author);
        $this->userService = $userService;
    }

    /**
     * Crear autor con usuario existente o nuevo
     */
    public function createAuthorWithUser(array $data, $createdBy)
    {
        DB::beginTransaction();
        
        try {
            $userId = null;
            
            if (isset($data['user_id'])) {
                $userId = $data['user_id'];
            }else if (isset($data['user'])) {
                $userData = $data['user'];
                $userData['role'] = 'author';
                $userData['password_confirmation'] = $userData['password'];
                $userData['created_by'] = $createdBy;
                $user = $this->userService->create($userData);
                $userId = $user->id;
            }
            
            $author = $this->model->create([
                'user_id' => $userId,
                'biography' => $data['biography'] ?? null,
                'created_by' => $createdBy,
            ]);
            
            DB::commit();
            return $author->load('user');
            
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateBooksCount($authorId)
    {
        $author = $this->model->find($authorId);

        if ($author) {
            $author->books_count = $author->books()->count();
            $author->save();
        }
    }

    public function getAllWithUsers()
    {
        return $this->model->with('user')->get();
    }

    public function getByIdWithBooks($id)
    {
        return $this->model->with(['user', 'books'])->find($id);
    }
}