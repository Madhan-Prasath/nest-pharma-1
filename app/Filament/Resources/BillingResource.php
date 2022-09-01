<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\BillingResource\Pages;
use App\Models\Billing;
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

class BillingResource extends Resource
{
    protected static ?string $model = Billing::class;

    protected static ?string $label = 'Billing';

    protected static ?string $navigationIcon = 'heroicon-o-library';

    protected static ?string $navigationGroup = 'Doctor';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Select::make('patch_id')
                        ->label('Patch')
                        ->relationship('patch', 'patch', fn (Builder $query) => $query->where('status', '=', 1))
                        ->required()
                        ->inlineLabel()
                        ->searchable(),

                TextInput::make('billing_name')
                           ->label('Billing Name')
                           ->required()
                           ->inlineLabel()
                           ->placeholder('Store Name'),

                TextInput::make('doctor_name')
                           ->label('Doctor Name')
                           ->required()
                           ->inlineLabel()
                           ->placeholder('Chemist Name'),

                Select::make('specialist_id')
                        ->label('Specialist In')
                        ->relationship('specialist', 'specialist_in', fn (Builder $query) => $query->where('status', '=', 1))
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
                TextColumn::make('patch.patch')
                            ->label('Patch Location')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('billing_name')
                            ->label('Billing Name')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('doctor_name')
                            ->label('Doctor Name')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('specialist.specialist_in')
                            ->label('Specialist In')
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
                              ->options([
                                  1 => 'Active',
                                  0 => 'De-Active',
                              ])
                              ->column('status'),

                SelectFilter::make('patch')
                              ->relationship('patch', 'patch'),

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
            'index' => Pages\ListBillings::route('/'),
            'create' => Pages\CreateBilling::route('/create'),
            'view' => Pages\ViewBilling::route('/{record}'),
            'edit' => Pages\EditBilling::route('/{record}/edit'),
        ];
    }
}
