<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function create(array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        
        return parent::create($data);
    }

    public function update($id, array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        
        return parent::update($id, $data);
    }
}