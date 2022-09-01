<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\ItemTypeResource\Pages;
use App\Models\ItemType;
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

class ItemTypeResource extends Resource
{
    protected static ?string $model = ItemType::class;

    protected static ?string $navigationIcon = 'heroicon-o-template';

    protected static ?string $label = 'Item Type';

    protected static ?string $navigationGroup = 'Product';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('type')
                           ->label('Item Type')
                           ->placeholder('Enter Product Type')
                           ->required()
                           ->inlineLabel()
                           ->unique(),

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
                TextColumn::make('type')
                            ->label('Item Type')
                            ->searchable(),

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
                              ->options([
                                  1 => 'Active',
                                  0 => 'De-Active',
                              ])
                              ->column('status'),
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
            'index' => Pages\ListItemTypes::route('/'),
            'create' => Pages\CreateItemType::route('/create'),
            'view' => Pages\ViewItemType::route('/{record}'),
            'edit' => Pages\EditItemType::route('/{record}/edit'),
        ];
    }
}
