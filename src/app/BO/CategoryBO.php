<?php

namespace App\BO;

use App\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Category;

class CategoryBO
{
    /**
     * Return initialization page data
     *
     * @return Object
     */
    public function initialize(): Object
    {
        // Your code

        return new \stdClass();
    }

    /**
     * Displays a resource's list
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return CategoryRepository::index();
    }

    /**
    * Get only active resources
    *
    * @return Collection
    */
    public function findActiveCategories(): Collection
    {
        return CategoryRepository::findActiveCategories();
    }

    /**
     * Store a new resource in storage
     *
     * @param \App\Http\Requests\CategoryRequest  $request
     * @return Category
     */
    public function store(array $request): Category
    {
        return CategoryRepository::store($request);
    }

    /**
     * Update an specific resource in storage.
     *
     * @param \App\Http\Requests\CategoryRequest  $request
     * @param \App\Models\Category  $category
     * @return bool
     */
    public function update(array $request, $category): bool
    {
        return CategoryRepository::update($request, $category);
    }

    /**
     * Delete an specific resource from storage.
     *
     * @param \App\Models\Category  $category
     * @return bool
     */
    public function destroy($category): bool
    {
        return CategoryRepository::destroy($category);
    }
}
