<?php

namespace App\Filament\Resources\ProductSaleResource\Pages;

use App\Filament\Resources\ProductSaleResource;
use App\Models\ProductMaster;
use Filament\Resources\Pages\CreateRecord;
use Heloufir\FilamentWorkflowManager\Core\WorkflowResource;
use Illuminate\Database\Eloquent\Model;

class CreateProductSale extends CreateRecord
{
    use WorkflowResource;

    protected static string $resource = ProductSaleResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $ptr = ProductMaster::find($data['product_master_id'])->ptr;
        $data['sales_total'] = $ptr * $data['sales_unit'];
        $data['free_total'] = $ptr * $data['free_unit'];
        $data['status'] = false;
        return static::getModel()::create($data);
    }
}
