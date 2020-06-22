<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function addUser(Request $request) 
    {
        try {
            $user = User::create([
                'id'    => $request->input('id')
            ]);

            return response()->json([
                'id'        => $user['id']
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'Duplicate name'        => '409 Conflict'
            ], 409);
        }
    }

    //DELETE /user/:userId
    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return response()->json([]);
    }
}
