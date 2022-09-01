<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\DistributionMethodResource\Pages;
use App\Models\DistributionMethod;
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

class DistributionMethodResource extends Resource
{
    protected static ?string $model = DistributionMethod::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Product';

    protected static ?string $label = 'Distribution Method';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('method')
                          ->label('Distribution Method')
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
                TextColumn::make('method')
                            ->label('Distribution Method')
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
            'index' => Pages\ListDistributionMethods::route('/'),
            'create' => Pages\CreateDistributionMethod::route('/create'),
            'view' => Pages\ViewDistributionMethod::route('/{record}'),
            'edit' => Pages\EditDistributionMethod::route('/{record}/edit'),
        ];
    }
}
