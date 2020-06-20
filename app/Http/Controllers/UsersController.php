<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function addUser(Request $request) 
    {

        $user = User::create([
            'name'       => $request->input('name')
        ]);

        return $user;
    }
}
