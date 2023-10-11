<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployerResource\Pages;
use App\Filament\Resources\EmployerResource\Pages\EditEmployer;
use App\Filament\Resources\EmployerResource\Pages\ListEmployers;
use App\Filament\Resources\EmployerResource\RelationManagers;
use App\Models\Employer;
use App\Models\User;
use Filament\Forms;
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

class EmployerResource extends Resource
{
    protected static ?string $model = Employer::class;

    public static ?string $label = 'Employers';

    protected static ?string $navigationIcon = 'fas-user-tie';

    protected static ?string $navigationGroup = 'Resource Settings';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
                TextColumn::make('company_name')
                    ->searchable(),
                TextColumn::make('company_type')
                    ->searchable(),
                TextColumn::make('region.name'),
                TextColumn::make("jobs_count")->counts('jobs')->label('Job Posts'),
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
                CreateAction::make()->disabled(),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->isType('employer');
    }


    public static function getRelations(): array
    {
        return [
            // RelationManagers\PostsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEmployers::route('/'),
            // 'create' => CreateEmployer::route('/create'),
            'edit' => EditEmployer::route('/{record}/edit'),
        ];
    }
}
