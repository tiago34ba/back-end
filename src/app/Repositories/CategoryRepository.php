<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository
{
    public function __construct()
    {
    }

    /**
     * @return LengthAwarePaginator
     */
    public static function index(): LengthAwarePaginator
    {
        return Category::paginate();
    }

    /**
     * @return Collection
     */
    public static function findActiveCategories($columns = ['id','name']): Collection
    {
        return Category::active()
            ->get($columns);
    }

    /**
     * @return Category
     */
    public static function store($arrayCategory): Category
    {
        return Category::create($arrayCategory);
    }

    /**
     * @return bool
     */
    public static function update($arrayCategory, $category): bool
    {
        return $category->update($arrayCategory);
    }

    /**
     * @return bool
     */
    public static function destroy($category): bool
    {
        return $category->delete();
    }

}
