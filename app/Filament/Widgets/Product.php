<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\ProductSaleResource;
use App\Models\ProductSale;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Heloufir\FilamentWorkflowManager\Models\WorkflowModelStatus;
use Heloufir\FilamentWorkflowManager\Models\WorkflowPermission;
use Heloufir\FilamentWorkflowManager\Models\WorkflowStatus;
use Heloufir\FilamentWorkflowManager\Models\WorkflowUserPermission;
use Heloufir\FilamentWorkflowManager\Tables\Columns\WorkflowStatusColumn;
use Illuminate\Database\Eloquent\Builder;

class Product extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;

    protected function getTableQuery(): Builder
    {
        $permission_id = WorkflowPermission::where('role', '=', 'ProductSalesPermission')->first()->id;
        $user = auth()->user();
        $canEdit = WorkflowUserPermission::where('user_id', '=', $user->id)->where('workflow_permission_id', '=', $permission_id)->first();
        $model = "App\Models\ProductSale";
        $initiated = WorkflowStatus::where('name', '=', 'Initiated')->first()->id;
        $rejected = WorkflowStatus::where('name', '=', 'Rejected')->first()->id;
        if ($canEdit != null) {
            $product_id = WorkflowModelStatus::where('modelable_type', '=', $model)->where('workflow_status_id', '=', $initiated)->pluck('modelable_id');

            return ProductSale::whereIn('id', $product_id);
        } else {
            $product_id = WorkflowModelStatus::where('modelable_type', '=', $model)->where('workflow_status_id', '=', $rejected)->pluck('modelable_id');

            return ProductSale::whereIn('id', $product_id)->where('created_by', '=', $user->email);
        }
    }

    protected function getTableColumns(): array
    {
        return [

            TextColumn::make('doctor_master.stockist.sales_manager.head_quarter.state.state')
                ->label('State')
                ->sortable()
                ->searchable(),

            TextColumn::make('doctor_master.stockist.sales_manager.head_quarter.location')
                ->label('Hq Location')
                ->sortable()
                ->searchable(),

            TextColumn::make('doctor_master.stockist.sales_manager.name')
                ->label('Sales Manager Name')
                ->sortable()
                ->searchable(),

            TextColumn::make('doctor_master.stockist.name')
                ->label('Stockist')
                ->sortable()
                ->searchable(),

            TextColumn::make('doctor_master.billing.patch.patch')
                ->label('Patch')
                ->searchable()
                ->sortable(),

            TextColumn::make('doctor_master.billing.billing_name')
                ->label('Billing')
                ->searchable()
                ->sortable(),

            TextColumn::make('doctor_master.billing.doctor_name')
                ->label('Doctor Name')
                ->searchable()
                ->sortable(),

            TextColumn::make('product_master.product.name')
                ->label('Product Name')
                ->searchable()
                ->sortable(),

            TextColumn::make('sales_unit')
                ->label('Sales Units')
                ->searchable()
                ->sortable(),

            TextColumn::make('sales_total')
                ->label('Sales Total')
                ->sortable()
                ->searchable(),

            TextColumn::make('free_unit')
                ->label('Free Units')
                ->sortable()
                ->searchable(),

            TextColumn::make('free_total')
                ->label('Free total')
                ->sortable()
                ->searchable(),

            WorkflowStatusColumn::make(),

            TextColumn::make('created_by')
                ->label('Created By')
                ->sortable()
                ->searchable(),

            TextColumn::make('updated_by')
                ->label('Updated By')
                ->sortable()
                ->searchable(),

        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('Edit')
                ->url(fn (ProductSale $record): string => ProductSaleResource::getUrl('edit', ['record' => $record])),
        ];
    }
}
