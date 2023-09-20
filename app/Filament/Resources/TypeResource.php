<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TypeResource\Pages;
use App\Filament\Resources\TypeResource\RelationManagers;
use App\Models\Type;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TypeResource extends Resource
{
    protected static ?string $model = Type::class;
    // for global search
    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'fas-shapes';

    protected static ?string $navigationGroup = 'Jobs Settings';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->unique(Post::class, 'slug', ignoreRecord: true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->sortable(),
                Tables\Columns\TextColumn::make('type'),
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
            'index' => Pages\ListTypes::route('/'),
            'create' => Pages\CreateType::route('/create'),
            'edit' => Pages\EditType::route('/{record}/edit'),
        ];
    }
}
