<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getAll($perPage = 10)
    {
        return Category::latest()->paginate($perPage);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update(Category $category, array $data)
    {
        $category->update($data);

        return $category;
    }

    public function delete(Category $category)
    {
        return $category->delete();
    }
}
