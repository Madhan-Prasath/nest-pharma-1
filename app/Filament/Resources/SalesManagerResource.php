<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\SalesManagerResource\Pages;
use App\Models\SalesManager;
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

class SalesManagerResource extends Resource
{
    protected static ?string $model = SalesManager::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $label = 'Sales Manager';

    protected static ?string $navigationGroup = 'Sales Manager';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                           ->label('Sales Manager\'s Name')
                           ->required()
                           ->inlineLabel(),

                TextInput::make('email')
                           ->label('Sales Manager\'s Email ')
                           ->required()
                           ->inlineLabel(),

                Select::make('head_quarter_id')
                        ->label('HQ Location')
                        ->relationship('head_quarter', 'location', fn (Builder $query) => $query->where('status', '=', 1))
                        ->required()
                        ->placeholder('Erode')
                        ->inlineLabel()
                        ->searchable(),

                Select::make('area_manager_id')
                        ->label('Area Manager')
                        ->relationship('area_manager', 'name', fn (Builder $query) => $query->where('status', '=', 1))
                        ->required()
                        ->inlineLabel()
                        ->searchable(),

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
                            ->label('Name')
                            ->sortable()
                            ->searchable(),

                TextColumn::make('email')
                            ->label('Email')
                            ->sortable()
                            ->searchable(),

                TextColumn::make('head_quarter.location')
                            ->label('Head Quarter location')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('area_manager.name')
                            ->label('Area Manager')
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

                SelectFilter::make('head_quarter_id')
                              ->relationship('head_quarter', 'location')->label('Head Quarter'),
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
            'index' => Pages\ListSalesManagers::route('/'),
            'create' => Pages\CreateSalesManager::route('/create'),
            'view' => Pages\ViewSalesManager::route('/{record}'),
            'edit' => Pages\EditSalesManager::route('/{record}/edit'),
        ];
    }
}
