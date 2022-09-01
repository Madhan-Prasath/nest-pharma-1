<?php

namespace App\Filament\Resources\ProductSaleResource\Pages;

use App\Filament\Resources\ProductSaleResource;
use App\Models\ProductMaster;
use App\Models\ProductSale;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Heloufir\FilamentWorkflowManager\Core\WorkflowResource;
use Heloufir\FilamentWorkflowManager\Forms\Components\WorkflowStatusInput;
use Heloufir\FilamentWorkflowManager\Models\WorkflowModel;
use Heloufir\FilamentWorkflowManager\Models\WorkflowModelStatus;
use Heloufir\FilamentWorkflowManager\Models\WorkflowStatus;
use Illuminate\Database\Eloquent\Model;

class EditProductSale extends EditRecord
{
    use WorkflowResource;

    protected static string $resource = ProductSaleResource::class;

    public bool $field_disable = false;

    public array $beforeUpdate = [
        'doctor_master_id' => null,
        'product_master_id' => null,
        'distribution_method_id' => null,
        'sales_unit' => null,
        'free_unit' => null,
        'distributed_date' => null,
        'workflow_status_id' => null
    ];

    // Before update check whether Admin or User
    protected function mutateFormDataBeforeFill(array $data): array
    {
//        $this->beforeUpdate = $data;
        foreach ($this->beforeUpdate  as $attributes => $key){
            $this->beforeUpdate[$attributes] = $data[$attributes];
        }
//        dd($this->beforeUpdate);
        if ($data['workflow_status'] == null) {
            return $data;
        }

        $workflow_status = $data['workflow_status']['status']['name'];

        $created_by = ProductSale::find($data['id'])->created_by;

        // Field will be Disabled, if the workflow status is approved or user without sufficient rights
        if (auth()->user()->email != $created_by || (strtolower($workflow_status) == strtolower('approved'))) {
            $this->field_disable = true;
        }

        // Return true if the workflow status is not equal rejected or user without sufficient rights
        elseif (auth()->user()->email != $created_by || (! (strtolower($workflow_status) == strtolower('rejected')))) {
            return $data;
        }

        // When user have sufficient rights and workflow status is approved update below
        elseif (auth()->user()->email == $created_by && (strtolower($workflow_status) == strtolower('rejected'))) {
            $current_status = WorkflowModelStatus::find($data['workflow_status']['id']);
            $current_status->workflow_status_id = WorkflowStatus::where('name' , '=', 'Initiated')->first()->id; // if 1 = Initiated
            $current_status->save();

            $data['workflow_status_id'] = 1;
            $data['workflow_status'] = $current_status;
        }

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {

        if ($this->beforeUpdate != $data)
        {

            $ptr = ProductMaster::find($data['product_master_id'])->ptr;
            $data['sales_total'] = $ptr * $data['sales_unit'];
            $data['free_total'] = $ptr * $data['free_unit'];

            if ($this->beforeUpdate['workflow_status_id'] == WorkflowStatus::where('name' , '=', 'Approved')->first()->id){
                $data['status'] = true;
            }


        }

        if ($this->data['workflow_status_id'] == WorkflowStatus::where('name' , '=', 'Approved')->first()->id){
            $data['status'] = true;
        }


        $record->update($data);
        return $record;
    }

    protected function getFormSchema(): array
    {
        return [

            Select::make('doctor_master_id')
                    ->label('Distributed By & Distributed To')
                    ->placeholder('Sales Manager & Stock lister to Billing / Doctor')
                    ->disabled($this->field_disable)
                    ->options(ProductSale::doctor_master_search())
                    ->required()
                    ->columnSpan(2)
                    ->inlineLabel()
                    ->searchable(),

            Select::make('product_master_id')
                    ->label('Product and Distributed State')
                    ->placeholder('Product name , State')
                    ->options(ProductSale::product_master_search())
                    ->disabled($this->field_disable)
                    ->required()
                    ->columnSpan(2)
                    ->inlineLabel()
                    ->searchable(),

            Select::make('distribution_method_id')
                    ->label('Distribution Method')
                    ->relationship('distribution_method', 'method')
                    ->required()
                    ->columnSpan(2)
                    ->disabled($this->field_disable)
                    ->columnSpan(2)
                    ->inlineLabel()
                    ->searchable(),

            TextInput::make('sales_unit')
                       ->numeric()
                       ->label('Sales Unit')
                       ->default(1)
                       ->inlineLabel()
                       ->required()
                       ->columnSpan(2)
                       ->disabled($this->field_disable),

            TextInput::make('free_unit')
                       ->numeric()
                       ->label('Free Unit')
                       ->default(1)
                       ->required()
                       ->columnSpan(2)
                       ->inlineLabel()
                       ->disabled($this->field_disable),

            DateTimePicker::make('distributed_date')
                            ->label('Distributed Date')
                            ->required()
                            ->columnSpan(2)
                            ->inlineLabel()
                            ->disabled($this->field_disable),

            WorkflowStatusInput::make()
                                ->label('Workflow Status')
                                ->columnSpan(2)
                                ->inlineLabel(),
        ];
    }

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
