<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobPostResource\Pages;
use App\Filament\Resources\JobPostResource\RelationManagers;
use App\Models\Category;
use App\Models\JobPost;
use App\Models\Region;
use App\Models\Status;
use App\Models\Type;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobPostResource extends Resource
{
    protected static ?string $model = JobPost::class;

    protected static ?string $navigationIcon = 'fas-briefcase';

    protected static ?string $navigationGroup = 'Jobs Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required()->columnSpanFull(),
                Grid::make([
                    'default' => 1,
                    'sm' => 2,
                    'md' => 3,
                    'lg' => 4,
                    '2xl' => 8,
                ])
                    ->schema([
                        Select::make('category_id')
                            ->label('Category')
                            ->placeholder('Choose Cateogry')
                            ->relationship(
                                name: "category",
                                titleAttribute: "name"
                            )
                            ->preload()
                            ->searchable()
                            ->required(),
                        Select::make('type_id')
                            ->label('Type')
                            ->placeholder('Choose Type')
                            ->relationship(
                                name: "type",
                                titleAttribute: "name"
                            )
                            ->native(false)
                            ->required(),
                        Select::make('region_id')
                            ->label('Region')
                            ->placeholder('Choose Region')
                            ->relationship(
                                name: "region",
                                titleAttribute: "name",
                            )
                            ->preload()
                            ->searchable()
                            ->required(),
                        Select::make('status_id')
                            ->label('Status')
                            ->placeholder('Choose Status')
                            ->relationship(
                                name: "status",
                                titleAttribute: "title",
                                modifyQueryUsing: fn (Builder $query) => $query->where('type', 'status')
                            )
                            ->default(7)
                            ->native(false)
                            ->required(),

                    ]),
                TextInput::make('salary')
                    ->placeholder('eg: nego')
                    ->postfix("lakhs")
                    ->required(),
                DateTimePicker::make('deadline_date')
                    ->placeholder("dd/mm/yyyy")
                    ->native(false)
                    ->seconds(false)
                    ->timezone("Asia/Yangon")
                    ->required(),
                // FileUpload::make('image')
                //     ->image()
                //     ->imageEditor()
                //     ->maxSize(1024)
                //     ->relationship(),
                MarkdownEditor::make('desc')
                    ->label('Job Description')
                    ->toolbarButtons([
                        'blockquote',
                        'bold',
                        'bulletList',
                        'heading',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'table',
                        'undo',
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label("No.")->sortable(),
                TextColumn::make('title')->searchable(),
                TextColumn::make("salary")->sortable(),
                TextColumn::make("type.name"),
                TextColumn::make("category.name"),
                TextColumn::make("status.title"),
                TextColumn::make("region.name"),
                TextColumn::make("created_at")->label("Published")->since()
            ])
            ->filters([
                SelectFilter::make("type_id")
                    ->label("Type")
                    ->multiple()
                    ->native(false)
                    ->options(Type::all()->pluck('name', 'id')),
                SelectFilter::make("category_id")
                    ->label("Category")
                    ->native(false)
                    ->options(Category::all()->pluck('name', 'id')),
                SelectFilter::make("region_id")
                    ->label("Region")
                    ->native(false)
                    ->options(Region::all()->pluck('name', 'id')),
                SelectFilter::make("status_id")
                    ->label("Status")
                    ->native(false)
                    ->options(Status::where('type', 'status')->pluck('title', 'id'))
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
            'index' => Pages\ListJobPosts::route('/'),
            'create' => Pages\CreateJobPost::route('/create'),
            'edit' => Pages\EditJobPost::route('/{record}/edit'),
        ];
    }
}
