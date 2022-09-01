<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\SalesManagerTargetResource\Pages;
use App\Models\SalesManagerTarget;
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

class SalesManagerTargetResource extends Resource
{
    protected static ?string $model = SalesManagerTarget::class;

    protected static ?string $label = 'Sales Manager Target';
    protected static ?string $navigationGroup = 'Targets';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Select::make('sales_manager_id')
                        ->label('Target For')
                        ->relationship('sales_manager', 'name')
                        ->searchable()
                        ->placeholder('Sales Manager Name')
                        ->inlineLabel()
                        ->required(),

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
                TextColumn::make('sales_manager.name')
                            ->label('Sales Manager')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('target')
                            ->label('Target')
                            ->sortable()
                            ->searchable(),

                TextColumn::make('month')
                            ->label('Month To Achieve')
                            ->searchable()
                            ->sortable()->date('F o'),

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
            'index' => Pages\ListSalesManagerTargets::route('/'),
            'create' => Pages\CreateSalesManagerTarget::route('/create'),
            'view' => Pages\ViewSalesManagerTarget::route('/{record}'),
            'edit' => Pages\EditSalesManagerTarget::route('/{record}/edit'),
        ];
    }
}
