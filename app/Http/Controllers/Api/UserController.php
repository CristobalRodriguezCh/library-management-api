<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Api\BaseController;
use App\Services\UserService;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Http\Requests\User\{StoreUserRequest,UpdateUserRequest};

class UserController extends BaseController
{
    protected $userService;
    
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $users = $this->userService->getAll();
            return response()->json([
                'success' => true,
                'data'=>$users 
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
     * @param  \Illuminate\Http\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $data =$request->all();
            $data['created_by'] = $this->getAuthUserId();
            $result = $this->userService->create($data);

            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
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
            $user = $this->userService->getById($id);
            return response()->json([
                'success' => true,
                'data'=>$user
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        try{
            $data = $request->all();
            $data['updated_by'] = $this->getAuthUserId();
            $user = $this->userService->update($id,$data);
            return response()->json([
                'success' => true,
                'data'=>$user
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
            $this->userService->delete($id,$auth_user_id);
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
        $users = $this->userService->getAll();
        
        return $this->exportToExcel(
            $users,
            'users',
            'Users',
            [
                'ID' => 'id',
                'Name' => 'name',
                'Email' => 'email',
                'Birth Date' => 'birth_date',
                'Role' => 'role',
                'Created At' => 'created_at',
            ]
        );
    }
}
