<?php

namespace App\Http\Controllers\API\V1;

use App\Filters\V1\FoodFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreFoodRequest;
use App\Http\Requests\V1\UpdateFoodRequest;
use App\Http\Resources\V1\FoodCollection;
use App\Http\Resources\V1\FoodResource;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return FoodCollection
     */
    public function index(Request $request)
    {
        $filter = new FoodFilter();

        $filterItems = $filter->transform($request);

        $foods = Food::where($filterItems);

        return new FoodCollection($foods->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFoodRequest  $request
     * @return FoodResource
     */
    public function store(StoreFoodRequest $request)
    {
        return new FoodResource(Food::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  Food $food
     * @return FoodResource
     */
    public function show(Food $food)
    {
        return new FoodResource($food);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFoodRequest $request
     * @param  Food $food
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
        $food->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Food $food
     */
    public function destroy(Food $food)
    {
        //
    }
}
