<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\HeadQuarterResource\Pages;
use App\Filament\Resources\HeadQuarterResource\RelationManagers;
use App\Models\HeadQuarter;
use Barryvdh\DomPDF\Tests\TestCase;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeadQuarterResource extends Resource
{
    protected static ?string $model = HeadQuarter::class;

    protected static ?string $navigationIcon = 'heroicon-o-office-building';

    protected static ?string $navigationGroup = 'Location';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Select::make('state_id')
                        ->relationship('state' , 'state', fn (Builder $query) => $query->where('status', '=', 1))
                        ->searchable()
                        ->inlineLabel()
                        ->required(),

                TextInput::make('location')
                           ->label('Enter HQ Location')
                           ->placeholder('Eg: Erode')
                           ->inlineLabel()
                           ->required(),

                TextInput::make('code')
                           ->label('Enter Code for this location')
                           ->placeholder('ERD')
                           ->inlineLabel()
                           ->required(),

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

                TextColumn::make('location')
                            ->label('HQ Location')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('code')
                            ->label('HQ Code')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('state.state')
                            ->label('Located at')
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

                SelectFilter::make('state')
                              ->relationship('state', 'state'),

            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index'  => Pages\ListHeadQuarters::route('/'),
            'create' => Pages\CreateHeadQuarter::route('/create'),
            'view'   => Pages\ViewHeadQuarter::route('/{record}'),
            'edit'   => Pages\EditHeadQuarter::route('/{record}/edit'),
        ];
    }
}
