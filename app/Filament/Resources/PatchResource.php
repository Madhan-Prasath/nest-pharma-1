<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\PatchResource\Pages;
use App\Models\Patch;
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

class PatchResource extends Resource
{
    protected static ?string $model = Patch::class;

    protected static ?string $label = 'Patch';

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Location';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Select::make('head_quarter_id')
                        ->relationship('head_quarter', 'location', fn (Builder $query) => $query->where('status', '=', 1))
                        ->label('Hq location')
                        ->placeholder('Erode')
                        ->searchable()
                        ->required()
                        ->inlineLabel(),

                TextInput::make('patch')
                           ->label('Patch')
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

                TextColumn::make('head_quarter.location')
                            ->label('HQ Location')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('patch')
                            ->label('Patch')
                            ->sortable()
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

                SelectFilter::make('HQ Location')
                              ->relationship('head_quarter', 'location')
                              ->label('HQ Location'),

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
            'index' => Pages\ListPatches::route('/'),
            'create' => Pages\CreatePatch::route('/create'),
            'view' => Pages\ViewPatch::route('/{record}'),
            'edit' => Pages\EditPatch::route('/{record}/edit'),
        ];
    }
}
