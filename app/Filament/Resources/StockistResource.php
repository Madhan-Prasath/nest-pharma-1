<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;

use App\Filament\Resources\StockistResource\Pages;
use App\Filament\Resources\StockistResource\RelationManagers;
use App\Models\Stockist;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StockistResource extends Resource
{
    protected static ?string $model = Stockist::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';


    protected static ?string $navigationGroup = "Sales Manager";
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                           ->label('Name of the Stockist')
                           ->required(),

                TextInput::make('email')
                           ->email()
                           ->label('Email of Stockist')
                           ->required(),

                Select::make('sales_manager_id')
                        ->relationship('sales_manager', 'name', fn (Builder $query) => $query->where('status', '=', 1))
                        ->searchable(),

                Toggle::make('status')
                        ->label('Status')
                        ->required()
                        ->default(true),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                            ->label('Name')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('email')
                            ->label('Email')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('sales_manager.name')
                            ->label('Sales Manager Name')
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
                                      0 => 'De-Active'
                                  ])
                              ->column('status'),

                SelectFilter::make('sales_manager')
                              ->relationship('sales_manager', 'name')
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
            'index' => Pages\ListStockists::route('/'),
            'create' => Pages\CreateStockist::route('/create'),
            'view' => Pages\ViewStockist::route('/{record}'),
            'edit' => Pages\EditStockist::route('/{record}/edit'),
        ];
    }
}
