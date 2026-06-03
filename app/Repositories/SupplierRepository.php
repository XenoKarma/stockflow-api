<?php

namespace App\Repositories;

use App\Models\Supplier;

class SupplierRepository
{
    public function paginate()
    {
        return Supplier::latest()
            ->paginate(10);
    }

    public function create(array $data)
    {
        return Supplier::create($data);
    }

    public function update(
        Supplier $supplier,
        array $data
    ) {
        $supplier->update($data);

        return $supplier;
    }

    public function delete(
        Supplier $supplier
    ) {
        return $supplier->delete();
    }
}
