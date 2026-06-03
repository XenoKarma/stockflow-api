<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use App\Services\SupplierService;
use Illuminate\Http\Request;

class SupplierController extends BaseController
{
    public function __construct(protected SupplierService $service) {}

    public function index()
    {
        return $this->success(
            SupplierResource::collection(
                $this->service->paginate()
            ),
            'Suppliers fetched'
        );
    }

    public function store(StoreSupplierRequest $request)
    {
        $supplier = $this->service
            ->create(
                $request->validated()
            );

        return $this->success(
            new SupplierResource(
                $supplier
            ),
            'Supplier created',
            201
        );
    }

    public function show(Supplier $supplier)
    {
        return $this->success(
            new SupplierResource(
                $supplier
            )
        );
    }

    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $supplier = $this->service
            ->update(
                $supplier,
                $request->validated()
            );

        return $this->success(
            new SupplierResource(
                $supplier
            ),
            'Supplier updated'
        );
    }

    public function destroy(Supplier $supplier)
    {
        $this->service
            ->delete($supplier);

        return $this->success(
            null,
            'Supplier deleted'
        );
    }
}
