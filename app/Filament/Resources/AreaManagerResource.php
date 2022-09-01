<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\AreaManagerResource\Pages;
use App\Models\AreaManager;
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

class AreaManagerResource extends Resource
{
//    protected static ?string $model = AreaManager::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Sales Manager';

    protected static ?int $navigationSort = 1;

    protected static ?string $label = 'Area Manager';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('state_id')
                        ->label('State')
                        ->relationship('state', 'state', fn (Builder $query) => $query->where('status', '=', 1))
                        ->searchable()
                        ->required()
                        ->inlineLabel(),

                TextInput::make('name')
                           ->label('Area Manager Name')
                           ->inlineLabel()
                           ->required(),

                TextInput::make('email')
                           ->label('Email')
                           ->email()
                           ->required()
                           ->inlineLabel(),

                Toggle::make('status')
                        ->inlineLabel()
                        ->required()
                        ->default(true),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('state.state')
                            ->label('State')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('name')
                            ->label('Area Manager Name')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('email')
                            ->label('Area Manager Email')
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
            'index' => Pages\ListAreaManagers::route('/'),
            'create' => Pages\CreateAreaManager::route('/create'),
            'view' => Pages\ViewAreaManager::route('/{record}'),
            'edit' => Pages\EditAreaManager::route('/{record}/edit'),
        ];
    }
}
