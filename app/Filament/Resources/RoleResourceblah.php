<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use App\Filament\Resources\RoleResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Permission\Models\Role;
// use App\Models\Role;
use Illuminate\Support\Str;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Spatie\Permission\Models\Permission;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'fas-user-secret';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->afterStateUpdated(function (callable $get, callable $set, ?string $state) {
                        if (!$get('slug_change') && filled($state)) {
                            $set('slug', Str::slug($state));
                        }
                    })
                    ->reactive()
                    ->required()
                    ->unique()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Grid::make([
                        'default' => 1,
                        'sm' => 2,
                        'md' => 3,
                        'lg' => 4,
                        '2xl' => 8,
                    ])
                    ->schema([
                        CheckboxList::make('permissions')
                            ->options(Permission::all()->pluck('name', 'id'))
                            ->columns(4)
                            ->gridDirection('row')
                            ->columnSpanFull()
                            ->bulkToggleable()
                            // ->multiple()
                            // ->relationship('permissions', 'name')
                    ]),
                // TextInput::make('guard_name')
                //     ->hidden()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label("No.")->sortable(),
                TextColumn::make('name')->searchable(),
                TextColumn::make("permissions_count")->counts('permissions'),
                TextColumn::make("users_count")->counts('users')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }    
}
