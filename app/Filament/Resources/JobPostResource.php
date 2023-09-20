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
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Grid as ComponentsGrid;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section as ComponentsSection;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobPostResource extends Resource
{
    protected static ?string $model = JobPost::class;

    // for global search
    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationIcon = 'fas-briefcase';

    protected static ?string $navigationGroup = 'Jobs Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("Job Details")
                    ->columns([
                        'sm' => 1,
                        'md' => 2,
                    ])
                    ->schema([
                        TextInput::make('title')->required()->columnSpanFull(),
                        Select::make('category_id')
                            ->label('Category')
                            ->placeholder('Choose Cateogry')
                            ->relationship("category", "name")
                            ->preload()
                            ->searchable()
                            ->required(),
                        Select::make('type_id')
                            ->label('Type')
                            ->placeholder('Choose Type')
                            ->relationship("type", "name")
                            ->native(false)
                            ->required(),
                    ])->columnSpan(1),
                Section::make("Job Status")
                    ->schema([
                        Select::make('region_id')
                            ->label('Region')
                            ->placeholder('Choose Region')
                            ->relationship("region", "name")
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
                    ])->columnSpan(1),
                Section::make("Job Description")
                    ->columns(2)
                    ->schema([
                        TextInput::make('salary')
                            ->placeholder('eg: nego')
                            ->suffix("lakhs")
                            ->required(),
                        DateTimePicker::make('deadline_date')
                            ->placeholder("dd/mm/yyyy")
                            ->native(false)
                            ->seconds(false)
                            ->timezone("Asia/Yangon")
                            ->required(),
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
                            ])->columnSpanFull(),
                    ])->columnSpan(1),
                Section::make("Image")
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->maxSize(1024)
                    ])->columnSpan(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label("No.")->sortable(),
                ImageColumn::make('image')
                    ->label('Image'),
                TextColumn::make('title')->searchable(),
                TextColumn::make("salary")->suffix('Lakhs')->sortable(),
                TextColumn::make("type.name"),
                TextColumn::make("category.name"),
                TextColumn::make('status.title')
                    ->color(fn (string $state): string => match ($state) {
                        'Available' => 'success',
                        'Closed' => 'danger',
                    }),
                // ToggleColumn::make('status.title'),
                TextColumn::make("region.name"),
                TextColumn::make("user.name"),
                TextColumn::make("created_at")->label("Published")->since(),
            ])
            ->filters([
                SelectFilter::make("type_id")
                    ->label("Type")
                    ->multiple()
                    ->native(false)
                    ->relationship('type', 'name')
                    ->preload(),
                SelectFilter::make("category_id")
                    ->label("Category")
                    ->native(false)
                    ->searchable()
                    ->relationship('category', 'name')
                    ->preload(),
                SelectFilter::make("region_id")
                    ->label("Region")
                    ->native(false)
                    ->searchable()
                    ->relationship('region', 'name')
                    ->preload(),
                SelectFilter::make("status_id")
                    ->label("Status")
                    ->native(false)
                    ->relationship(
                        name: "status",
                        titleAttribute: "title",
                        modifyQueryUsing: fn (Builder $query) => $query->where('type', 'status')
                    )->preload()
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                ComponentsSection::make()
                    ->schema([
                        Split::make([
                            ComponentsGrid::make()
                                ->schema([
                                    Group::make([
                                        TextEntry::make('title')->weight(FontWeight::Bold),
                                        TextEntry::make('slug'),
                                        TextEntry::make('created_at')
                                            ->label('Published At')
                                            ->since()
                                    ]),
                                    Group::make([
                                        TextEntry::make('user.name'),
                                        TextEntry::make('category.name')
                                            ->badge()
                                            ->color('success'),
                                        TextEntry::make('type.name')
                                            ->badge()
                                    ]),
                                ]),
                            ImageEntry::make('image')
                                ->hiddenLabel()
                                ->grow(false),
                        ])->from('lg')
                    ]),
                ComponentsSection::make('Job Description')
                    ->schema([
                        TextEntry::make('desc')
                            ->prose()
                            ->markdown()
                            ->hiddenLabel(),
                    ])
                    ->collapsible(),
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
            'view' => Pages\ViewJobPost::route('/{record}'),
        ];
    }
}
