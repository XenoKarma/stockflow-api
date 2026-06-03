<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Str;

class CategoryService
{
    public function __construct(
        protected CategoryRepository $repository
    ) {}

    public function getAll($perPage = 10)
    {
        return $this->repository->getAll($perPage);
    }

    public function create(array $data)
    {
        $data['slug'] = $this->generateUniqueSlug($data['name']);

        return $this->repository->create($data);
    }

    public function update(
        Category $category,
        array $data
    ) {
        $data['slug'] = $this->generateUniqueSlug(
            $data['name'],
            $category->id
        );

        return $this->repository->update(
            $category,
            $data
        );
    }

    protected function generateUniqueSlug(
        string $name,
        ?int $ignoreId = null
    ): string {
        $slug = Str::slug($name);
        $original = $slug;
        $counter = 1;

        while (Category::where('slug', $slug)
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $original . '-' . $counter++;
        }

        return $slug;
    }

    public function delete(Category $category)
    {
        return $this->repository->delete($category);
    }
}
