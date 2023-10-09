<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'fas-user-gear';

    protected static ?string $navigationGroup = 'Resource Settings';

    // protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('email')
                    ->required(),

                TextInput::make('password')
                    ->password()
                    ->required()
                    ->hiddenOn('edit'),

                Select::make('roles')
                    ->multiple()
                    ->label('Role')
                    ->placeholder('Choose Role')
                    ->relationship("roles", "name")
                    ->preload()
                    ->searchable(),

                Select::make('permissions')
                    ->multiple()
                    ->label('Permission')
                    ->placeholder('Choose Permission')
                    ->relationship("permissions", "name")
                    ->preload()
                    ->searchable(),

                Hidden::make('type_id')
                    ->default(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('email'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                // CreateAction::make(),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereNotIn('name', ['admin', 'developer']);
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
