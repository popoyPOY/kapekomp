<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(Review::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request, string $id)
    {
        try {

            if(Shop::find($id)) {
                $createdReview = Review::create([
                    "comment" => $request->comment,
                    "rating" => $request->rating,
                    "shop_id" => $id,
                    "id" => $request->user()->id
                ]);
                return response(['messsage' => $createdReview], 200);
            }

            return response(['messsage' => "Shop not found"], 404);
        } catch (\Throwable $th) {
            return response(['message' => $th->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
