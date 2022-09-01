<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\ProductSaleResource\Pages;
use App\Models\ProductSale;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Heloufir\FilamentWorkflowManager\Forms\Components\WorkflowStatusInput;
use Heloufir\FilamentWorkflowManager\Tables\Columns\WorkflowStatusColumn;

class ProductSaleResource extends Resource
{
    protected static ?string $model = ProductSale::class;

    protected static ?string $label = 'Product Sales';

    protected static ?string $navigationIcon = 'heroicon-o-currency-rupee';

    protected static ?string $navigationGroup = 'Master';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Select::make('doctor_master_id')
                        ->label('Distributed By & Distributed To')
                        ->placeholder('Sales Manager & Stock lister to Billing / Doctor')
                        ->options(ProductSale::doctor_master_search())
                        ->required()
                        ->inlineLabel()
                        ->columnSpan(2)
                        ->searchable(),

                Select::make('product_master_id')
                        ->label('Product and Distributed State')
                        ->placeholder('Product name , State')
                        ->options(ProductSale::product_master_search())
                        ->required()
                        ->columnSpan(2)
                        ->inlineLabel()
                        ->searchable(),

                Select::make('distribution_method_id')
                    ->label('Distribution Method')
                    ->relationship('distribution_method', 'method')
                    ->required()
                    ->columnSpan(2)
                    ->inlineLabel(),

                TextInput::make('sales_unit')
                           ->numeric()
                           ->label('Sales Unit')
                           ->default(1)
                           ->columnSpan(2)
                           ->required()
                           ->inlineLabel(),

                TextInput::make('free_unit')
                           ->numeric()
                           ->label('Free Unit')
                           ->default(1)
                           ->columnSpan(2)
                           ->required()
                           ->inlineLabel(),

                DateTimePicker::make('distributed_date')
                                ->label('Distributed Date')
                                ->required()
                                ->columnSpan(2)
                                ->inlineLabel(),

                WorkflowStatusInput::make()
                                    ->label('Workflow Status')
                                    ->inlineLabel()
                                    ->columnSpan(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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

                TextColumn::make('distribution_method.method')
                    ->label('Distributed Method')
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

                TextColumn::make('created_at')
                            ->label('Created At')
                            ->date()
                            ->sortable(),

                TextColumn::make('updated_at')
                            ->label('Updated At')
                            ->date()
                            ->sortable(),

                TextColumn::make('created_by')
                            ->label('Created By')
                            ->sortable()
                            ->searchable(),

                TextColumn::make('updated_by')
                            ->label('Updated By')
                            ->sortable()
                            ->searchable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                workflow_resources_history(),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                FilamentExportBulkAction::make('Export'),
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductSales::route('/'),
            'create' => Pages\CreateProductSale::route('/create'),
            'view' => Pages\ViewProductSale::route('/{record}'),
            'edit' => Pages\EditProductSale::route('/{record}/edit'),
        ];
    }
}
