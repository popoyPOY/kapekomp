<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Requests\StoreShopRequest;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            
            $shops = Shop::all();

            return response($shops, 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response(['message' => $th->getMessage()], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShopRequest $request)
    {
        try {
            //code...
            
            //echo $request->validated();

            $createdShop = Shop::create($request->validated());

            return response($createdShop, 200);
        } catch (\Throwable $th) {
            //throw $th;

            return response(['message' => $th->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop, string $id)
    {
        $findShop = $shop->find($id);
        if ($findShop) {
            return response($findShop, 200);
        }

        return response(["messsage"=>"shop not found"], 404);
    }

    public function review(Shop $shop, string $id)
    {
        $findShop = $shop->find($id);
        if ($findShop) {
            return response($findShop->review->all(), 200);
        }

        return response(["messsage"=>"shop not found"], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
