<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Services\AuthorService;
use App\Http\Requests\Author\{StoreAuthorRequest,UpdateAuthorRequest};

class AuthorController extends BaseController
{

    protected $authorService;

    public function __construct(AuthorService $authorService) {
        $this->authorService = $authorService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $authors = $this->authorService->getAllWithUsers();
            return response()->json([
                'success' => true,
                'data'=>$authors 
            ]);
        }catch (HttpException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], $e->getStatusCode());
        } catch (\Exception $e) {
           return response()->json([
                'success' => false,
                'message' => 'failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        try {
            $data =$request->all();
            $auth_user_id = $this->getAuthUserId();
            $result = $this->authorService->createAuthorWithUser($data,$auth_user_id);

            return response()->json([
                'success' => true,
                'message' => 'Author created successfully',
                'data' => $result
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Created failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $author = $this->authorService->getByIdWithBooks($id);
            return response()->json([
                'success' => true,
                'data'=>$author
            ]);
        }catch (HttpException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], $e->getStatusCode());
        } catch (\Exception $e) {
           return response()->json([
                'success' => false,
                'message' => 'failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateAuthorRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorRequest $request, $id)
    {
        try{
            $data = $request->all();
            $data['updated_by'] = $this->getAuthUserId();
            $author = $this->authorService->update($id,$data);
            return response()->json([
                'success' => true,
                'data'=>$author
            ]);
        }catch (HttpException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], $e->getStatusCode());
        } catch (\Exception $e) {
           return response()->json([
                'success' => false,
                'message' => 'failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $auth_user_id = $this->getAuthUserId();
            $this->authorService->delete($id,$auth_user_id);
            return response()->json([
                'success' => true
            ]);
        }catch (HttpException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], $e->getStatusCode());
        } catch (\Exception $e) {
           return response()->json([
                'success' => false,
                'message' => 'failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function export()
    {
        $authors = $this->authorService->getAllWithUsers();
        
        return $this->exportToExcel(
            $authors,
            'authors',
            'Authors',
            [
                'ID' => 'id',
                'Name' => 'user.name',
                'Email' => 'user.email',
                'Birth Date' => 'user.birth_date',
                'Biography' => 'biography',
                'Books Count' => 'books_count',
                'Created At' => 'created_at',
            ]
        );
    }
}
