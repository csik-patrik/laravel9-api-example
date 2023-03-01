<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\UpdateFoodCategoryRequest;
use App\Http\Resources\V1\FoodCategoryCollection;
use App\Http\Resources\V1\FoodCategoryResource;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use App\Filters\V1\FoodCategoryFilter;
use App\Http\Requests\V1\StoreFoodCategoryRequest;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return FoodCategoryCollection
     *
     */
    public function index(Request $request)
    {
        $filter = new FoodCategoryFilter();

        $filterItems = $filter->transform($request);

        $foodCategories = FoodCategory::where($filterItems);

        return new FoodCategoryCollection($foodCategories->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFoodCategoryRequest  $request
     * @return FoodCategoryResource
     */
    public function store(StoreFoodCategoryRequest $request)
    {
        return new FoodCategoryResource(FoodCategory::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  FoodCategory $foodCategory
     * @return FoodCategoryResource
     */
    public function show(FoodCategory $foodCategory)
    {
        return new FoodCategoryResource($foodCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFoodCategoryRequest  $request
     * @param  FoodCategory $foodCategory
     */
    public function update(UpdateFoodCategoryRequest $request, FoodCategory $foodCategory)
    {
        $foodCategory->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  FoodCategory $foodCategory
     */
    public function destroy(FoodCategory $foodCategory)
    {
        $foodCategory->delete();
    }
}
