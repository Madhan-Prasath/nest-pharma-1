<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
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

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Product';

    protected static ?string $label = 'Product';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                           ->label('Product Name')
                           ->required()
                           ->inlineLabel(),

                Select::make('item_type_id')
                        ->relationship('item_type', 'type', fn (Builder $query) => $query->where('status', '=', 1))
                        ->required()
                        ->inlineLabel()
                        ->searchable(),

                Select::make('category_id')
                        ->relationship('category', 'category', fn (Builder $query) => $query->where('status', '=', 1))
                        ->required()
                        ->inlineLabel()
                        ->searchable(),

                Select::make('prescription_id')
                        ->label('Medicine Prescribed For')
                        ->relationship('prescription', 'prescribed_for', fn (Builder $query) => $query->where('status', '=', 1))
                        ->searchable()
                        ->inlineLabel()
                        ->required(),

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
                TextColumn::make('name')
                            ->label('Product Name')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('item_type.type')
                            ->label('Item Type')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('category.category')
                            ->label('Category')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('prescription.prescribed_for')
                            ->label('Medicine Prescribed For')
                            ->searchable()
                            ->sortable(),

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

                SelectFilter::make('category')
                              ->relationship('category', 'category'),

                SelectFilter::make('item_type')
                              ->relationship('item_type', 'type'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
