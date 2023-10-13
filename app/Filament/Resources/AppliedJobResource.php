<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppliedJobResource\Pages;
use App\Filament\Resources\AppliedJobResource\Pages\ListAppliedJobs;
use App\Filament\Resources\AppliedJobResource\Pages\CreateAppliedJob;
use App\Filament\Resources\AppliedJobResource\Pages\EditAppliedJob;
use App\Filament\Resources\AppliedJobResource\RelationManagers;
use App\Models\AppliedJob;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppliedJobResource extends Resource
{
    protected static ?string $model = AppliedJob::class;

    protected static ?string $navigationIcon = 'fas-folder-plus';

    protected static ?string $recordTitleAttribute = 'title';

    protected static int $globalSearchResultsLimit = 3;

    protected static ?string $navigationGroup = 'Jobs Settings';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('employee_id')
                    ->label('Employee Name')
                    ->placeholder('Choose employee name')
                    ->relationship("employee", "name")
                    ->preload()
                    ->searchable()
                    ->required(),
                Select::make('job_id')
                    ->label('Job Post')
                    ->placeholder('Choose job post')
                    ->relationship("job_post", "title")
                    ->preload()
                    ->searchable()
                    ->required(),
                TextInput::make('amount')
                    ->disabled()
                    ->suffix('Lakhs'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label("No.")->sortable(),
                TextColumn::make('employee.name')->searchable()->sortable(),
                TextColumn::make("job_post.title")->toggleable(),
                TextColumn::make("amount")->suffix('Lakhs')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
    
    public static function getPages(): array
    {
        return [
            'index' => ListAppliedJobs::route('/'),
            'create' => CreateAppliedJob::route('/create'),
            'edit' => EditAppliedJob::route('/{record}/edit'),
        ];
    }    
}
