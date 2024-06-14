<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->user();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        try {
            //code...

            if(User::find($request->user()->id)->profile) {
                //$editedProfile = Profile::find($request->user()->id);
                
                $profile_id = User::find($request->user()->id)->profile->profile_id;
                $updateProfile = Profile::find($profile_id);

                $updateProfile->update(
                    $request->validated()
                );

                return response($updateProfile, 200);
            }

            $createdProfile = Profile::create([
                "username" => $request->username,
                "bio" => $request->bio,
                "id" => $request->user()->id
            ]);
            return response($createdProfile, 200);

        } catch (\Throwable $th) {
            //throw $th;
            return response(["message" => $th->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
