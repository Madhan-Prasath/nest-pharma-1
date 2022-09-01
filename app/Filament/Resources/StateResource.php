<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\StateResource\Pages;
use App\Models\State;
use Filament\Facades\Filament;
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

Filament::registerNavigationGroups(
    [
        'Master',
        'Location',
        'Sales Manager',
        'Doctor',
        'Product',
    ]
);

class StateResource extends Resource
{
    protected static ?string $model = State::class;

    protected static ?string $modelLabel = 'State';

    protected static ?string $navigationIcon = 'heroicon-o-globe';

//    protected static bool $isGloballySearchable = true;
    protected static ?string $navigationGroup = 'Location';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('state')
                           ->label('Enter State Name')
                           ->inlineLabel()
                           ->required(),

                Toggle::make('status')
                        ->label('Status')
                        ->required()
                        ->default(true)
                        ->inlineLabel(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('state')
                            ->label('State')
                            ->searchable()
                            ->sortable()
                            ->toggleable(),

                TextColumn::make('created_at')
                            ->label('Created At')
                            ->dateTime()
                            ->toggleable()
                            ->sortable(),

                TextColumn::make('updated_at')
                            ->label('Updated At')
                            ->since()
                            ->toggleable()
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
            'index' => Pages\ListStates::route('/'),
            'create' => Pages\CreateState::route('/create'),
            'view' => Pages\ViewState::route('/{record}'),
            'edit' => Pages\EditState::route('/{record}/edit'),
        ];
    }
}
