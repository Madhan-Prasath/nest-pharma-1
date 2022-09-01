<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\SpecialistResource\Pages;
use App\Models\Specialist;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;

class SpecialistResource extends Resource
{
    protected static ?string $model = Specialist::class;

    protected static ?string $label = 'Specialist';

    protected static ?string $navigationGroup = 'Doctor';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('specialist_in')
                           ->label('Enter Doctor Specialist')
                           ->inlineLabel()
                           ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('specialist_in')
                            ->label('Specialist')
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
            'index' => Pages\ListSpecialists::route('/'),
            'create' => Pages\CreateSpecialist::route('/create'),
            'view' => Pages\ViewSpecialist::route('/{record}'),
            'edit' => Pages\EditSpecialist::route('/{record}/edit'),
        ];
    }
}
