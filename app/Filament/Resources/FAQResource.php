<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FAQResource\Pages;
use App\Filament\Resources\FAQResource\Pages\CreateFAQ;
use App\Filament\Resources\FAQResource\Pages\EditFAQ;
use App\Filament\Resources\FAQResource\Pages\ListFAQS;
use App\Filament\Resources\FAQResource\RelationManagers;
use App\Models\FAQ;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;

class FAQResource extends Resource
{
    protected static ?string $model = FAQ::class;

    protected static ?string $navigationIcon = 'fas-question';

    protected static ?string $navigationGroup = 'Page Settings';

    protected static ?int $navigationSort = 1;

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
                Hidden::make('faq_type_id')
                    ->default(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                ->searchable(),
                TextColumn::make('desc')
                // ->addslashes(),
                ->html(),
                // TextColumn::make('faq_type.name'),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('faq_type_id', 1);
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
            'index' => ListFAQS::route('/'),
            'create' => CreateFAQ::route('/create'),
            'edit' => EditFAQ::route('/{record}/edit'),
        ];
    }    
}
