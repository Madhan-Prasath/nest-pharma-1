<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\ProductTargetResource\Pages;
use App\Models\ProductTarget;
use Filament\Forms\Components\DatePicker;
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
use Illuminate\Database\Eloquent\Builder;

class ProductTargetResource extends Resource
{
    protected static ?string $model = ProductTarget::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $label = "Product Target";
    protected static ?string $navigationGroup = 'Targets';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('product_id')
                    ->label('Product')
                    ->placeholder('Product name')
                    ->relationship('product', 'name', fn (Builder $query) => $query->where('status', '=', 1))
                    ->required()
                    ->inlineLabel()
                    ->searchable(),

                Select::make('head_quarter_id')
                        ->label('Head Quarter')
                        ->relationship('head_quarter', 'code')
                        ->searchable()
                        ->required()
                        ->inlineLabel(),

                Select::make('scope')
                        ->options([
                            'currency' => 'Currency',
                            'unit' => 'Unit',
                        ])
                        ->required()
                        ->searchable()
                        ->inlineLabel(),

                TextInput::make('target')
                           ->label('Target Need To Achieve')
                           ->inlineLabel()
                           ->numeric()
                           ->required(),

                DatePicker::make('month')
                            ->label('Month of Achievement')
                            ->inlineLabel()
                            ->required(),

                Toggle::make('status')
                        ->default(true)
                        ->inlineLabel()
                        ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product.name')
                            ->searchable()
                            ->sortable()
                            ->label('Product Name'),

                TextColumn::make('head_quarter.location')
                            ->label('Head Quarters')
                            ->sortable()
                            ->searchable(),

                TextColumn::make('target')
                            ->label('Target')
                            ->sortable()
                            ->searchable(),

                TextColumn::make('month')
                            ->label('Month To Achieve')
                            ->searchable()
                            ->sortable()
                            ->date('F o'),

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
            'index' => Pages\ListProductTargets::route('/'),
            'create' => Pages\CreateProductTarget::route('/create'),
            'view' => Pages\ViewProductTarget::route('/{record}'),
            'edit' => Pages\EditProductTarget::route('/{record}/edit'),
        ];
    }
}
