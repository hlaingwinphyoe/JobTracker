<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TermsAndConditionsResource\Pages;
use App\Filament\Resources\TermsAndConditionsResource\Pages\CreateTermsAndConditions;
use App\Filament\Resources\TermsAndConditionsResource\Pages\EditTermsAndConditions;
use App\Filament\Resources\TermsAndConditionsResource\Pages\ListTermsAndConditions;
use App\Filament\Resources\TermsAndConditionsResource\RelationManagers;
use App\Models\FAQ;
use App\Models\TermsAndConditions;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;


class TermsAndConditionsResource extends Resource
{
    protected static ?string $model = TermsAndConditions::class;

    public static ?string $label = 'TermsAndConditions';

    protected static ?string $navigationIcon = 'fas-table-list';

    protected static ?string $navigationGroup = 'Page Settings';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->reactive()
                    ->required()
                    ->maxLength(255),
                // Textarea::make('desc')
                //     ->label('Description')
                //     ->autosize()
                //     ->required(),
                RichEditor::make('desc'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                ->searchable(),
                TextColumn::make('desc')
                ->html(),
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
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                CreateAction::make(),
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
            'index' => ListTermsAndConditions::route('/'),
            'create' => CreateTermsAndConditions::route('/create'),
            'edit' => EditTermsAndConditions::route('/{record}/edit'),
        ];
    }    
}
