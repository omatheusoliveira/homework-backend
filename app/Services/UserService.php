<?php

namespace App\Services;

use App\Models\User;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Exception;

class UserService
{

    public function createUser(Request $request)
    {
        try {
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            
            $user->save();

            return response()->json($user, Response::HTTP_OK);
        } catch (Exception $ex) {
            return response()->json($ex, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function listUsers()
    {
        try {

            return response()->json(User::get(), Response::HTTP_OK);
        } catch (Exception $ex) {

            return response()->json($ex, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteUser(Request $request)
    {
        try {
            $id = $request->id;

            $user = User::find($id);

            User::where('id', $id)->delete($request->id);

            return response()->json($user, Response::HTTP_OK);
            
        } catch (Exception $ex) {

            return response()->json($ex, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateUser(Request $request)
    {
        try {
            $id = $request->id;
            $user = User::find($id);

            $user->name = $request->name;
            $user->email = $request->email;
            
            $user->save();

            return response()->json($user, Response::HTTP_OK);
            
        } catch (Exception $ex) {

            return response()->json($ex, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


}