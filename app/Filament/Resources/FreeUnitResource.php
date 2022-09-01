<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\FreeUnitResource\Pages;
use App\Models\FreeUnit;
use App\Models\ProductSale;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;

class FreeUnitResource extends Resource
{
    protected static ?string $model = FreeUnit::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Master';

    protected static ?string $label = 'Free Unit';

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

                TextInput::make('free_unit')
                    ->numeric()
                    ->label('Free Unit')
                    ->default(1)
                    ->columnSpan(2)
                    ->required()
                    ->inlineLabel(),

                DateTimePicker::make('month')
                    ->label('Month')
                    ->required()
                    ->columnSpan(2)
                    ->inlineLabel(),

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

                TextColumn::make('product_master.product.name')
                    ->label('Product Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('free_unit')
                    ->label('No of Free Unit')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('month')
                    ->label('Which Month')
                    ->date()
                    ->sortable(),

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
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),

            ])
            ->bulkActions([
                DeleteBulkAction::make(),
                FilamentExportBulkAction::make('Export'),

            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFreeUnits::route('/'),
            'create' => Pages\CreateFreeUnit::route('/create'),
            'view' => Pages\ViewFreeUnit::route('/{record}'),
            'edit' => Pages\EditFreeUnit::route('/{record}/edit'),
        ];
    }
}
