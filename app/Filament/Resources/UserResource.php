<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportBulkAction;
use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Components\BelongsToManyMultiSelect;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Heloufir\FilamentWorkflowManager\Resources\UserResource\WorkflowPermissions;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $label = 'User';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('name')
                            ->required()
                            ->inlineLabel(),

                TextInput::make('email')
                            ->email()
                            ->required()
                            ->inlineLabel(),

                TextInput::make('password')
                          ->password()
                          ->required()
                          ->inlineLabel()
                          ->maxLength(255)
                          ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                          ->visible(fn (Component $livewire): bool => $livewire instanceof Pages\CreateUser),

                BelongsToManyMultiSelect::make('roles')
                                          ->relationship('roles', 'name')
                                          ->inlineLabel(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('name')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('email')
                            ->searchable()
                            ->sortable(),

                TextColumn::make('created_at')
                            ->searchable()
                            ->sortable()
                            ->dateTime(),
                TextColumn::make('updated_at')
                            ->searchable()
                            ->sortable()
                            ->dateTime(),

            ])
            ->filters([
                //
            ])
            ->actions([

                EditAction::make(),
                DeleteAction::make(),

            ])

            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                FilamentExportBulkAction::make('export'),
            ]);
    }

    public static function getRelations(): array
    {
        return [

            WorkflowPermissions::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
