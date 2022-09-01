<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\ProductMasterResource\Pages;
use App\Models\ProductMaster;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class ProductMasterResource extends Resource
{
    protected static ?string $model = ProductMaster::class;

    protected static ?string $label = 'Product Master';

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationGroup = 'Master';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('product_id')
                        ->relationship('product', 'name', fn (Builder $query) => $query->where('status', '=', 1))
                        ->searchable()
                        ->required()
                        ->inlineLabel(),

                Select::make('state_id')
                        ->relationship('state', 'state', fn (Builder $query) => $query->where('status', '=', 1))
                        ->searchable()
                        ->required()
                        ->inlineLabel(),

                TextInput::make('mrp')
                           ->label('Maximum Retail Price')
                           ->numeric()
                           ->required()
                           ->inlineLabel(),

                TextInput::make('pts')
                           ->label('Price to the stockist')
                           ->numeric()
                           ->required()
                           ->inlineLabel(),

                TextInput::make('ptr')
                           ->label('Price to Retailer')
                           ->numeric()
                           ->required()
                           ->inlineLabel(),

                Toggle::make('status')
                        ->label('Status')
                        ->required()
                        ->inlineLabel()
                        ->default(true),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('state.state')
                            ->label('State of Distribution')
                            ->searchable()
                            ->sortable(),
                TextColumn::make('product.name')
                            ->label('Product Name')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('product.item_type.type')
                            ->label('Item Type')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('product.category.category')
                            ->label('Category')
                            ->sortable()
                            ->searchable(),

                TextColumn::make('mrp')
                            ->label('MRP')
                            ->searchable()
                            ->sortable()
                            ->prefix('Rs '),

                TextColumn::make('pts')
                            ->label('PTS')
                            ->searchable()
                            ->sortable()
                            ->prefix('Rs '),

                TextColumn::make('ptr')
                            ->label('PTR')
                            ->searchable()
                            ->sortable()
                            ->prefix('Rs '),

                BooleanColumn::make('status')
                               ->label('Status'),

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
                SelectFilter::make('status')
                              ->options(
                                  [
                                      1 => 'Active',
                                      0 => 'De-Active',
                                  ])
                              ->column('status'),

                SelectFilter::make('state')
                              ->relationship('state', 'state')
                              ->label('State'),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),

            ])
            ->bulkActions([
                DeleteBulkAction::make(),
                FilamentExportBulkAction::make('export'),

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
            'import' => Pages\ImportProductMaster::route('/import'),
            'index' => Pages\ListProductMasters::route('/'),
            'create' => Pages\CreateProductMaster::route('/create'),
            'view' => Pages\ViewProductMaster::route('/{record}'),
            'edit' => Pages\EditProductMaster::route('/{record}/edit'),

        ];
    }
}
