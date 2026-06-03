<?php

namespace App\Services;

use App\Models\Supplier;
use App\Repositories\SupplierRepository;

class SupplierService
{
    public function __construct(
        protected SupplierRepository $repository
    ) {}

    public function paginate()
    {
        return $this->repository->paginate();
    }

    public function create(
        array $data
    ) {
        return $this->repository
            ->create($data);
    }

    public function update(
        Supplier $supplier,
        array $data
    ) {
        return $this->repository
            ->update(
                $supplier,
                $data
            );
    }

    public function delete(
        Supplier $supplier
    ) {
        return $this->repository
            ->delete($supplier);
    }
}
