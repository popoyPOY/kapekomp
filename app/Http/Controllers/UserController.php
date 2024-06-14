<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\LoginUserRequest;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserController extends Authenticatable
{
    /**
     * 
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createAccount(StoreUserRequest $request)
    {
        try {
            //code...
            $user = User::create($request->validated());
            return response(['message' => 'Successfully Created'], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response(["message" => $th->getMessage()], 400);
        }
    }

    public function loginAccount(LoginUserRequest $request)
    {
        try {
            if (!Auth::attempt($request->validated())) {
                return response(['message' => 'Account does not exist.']);
            }

            $createdToken = $request->user()->createToken('Personal Access Token')->plainTextToken;
            return response(['token' => $createdToken], 200);
        } catch (\Throwable $th) {
            return response(["message" => $th->getMessage()], 400);
        }
    }

    public function logoutAccount(Request $request)
    {
        try {
            $deleteCurrentToken = $request->user()->currentAccessToken()->delete;

            return response(['message' => 'Successfully deleted'], 200);
        } catch (\Throwable $th) {
            return response(["message" => $th->getMessage()], 400);
        }
    }
}
