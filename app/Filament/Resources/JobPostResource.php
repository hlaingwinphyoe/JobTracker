<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobPostResource\Pages;
use App\Filament\Resources\JobPostResource\Pages\CreateJobPost;
use App\Filament\Resources\JobPostResource\Pages\EditJobPost;
use App\Filament\Resources\JobPostResource\Pages\ListJobPosts;
use App\Filament\Resources\JobPostResource\Pages\ViewJobPost;
use App\Filament\Resources\JobPostResource\RelationManagers;
use App\Models\Category;
use App\Models\JobPost;
use App\Models\Region;
use App\Models\Status;
use App\Models\Type;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
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
use Filament\Forms\Get;
use Filament\Forms\Set;
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
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobPostResource extends Resource
{
    protected static ?string $model = JobPost::class;

    // for global search
    protected static ?string $recordTitleAttribute = 'title';

    protected static int $globalSearchResultsLimit = 3;

    protected static ?string $navigationIcon = 'fas-briefcase';

    protected static ?string $navigationGroup = 'Jobs Settings';

    // protected static array $statuses = [
    //     'available' => "Available",
    //     'closed' => "Closed",
    // ];

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
                        TextInput::make('title')
                            ->required()
                            ->placeholder('eg. Senior Engineer')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                if (($get('slug') ?? '') !== Str::slug($old)) {
                                    return;
                                }

                                $set('slug', Str::slug($state));
                            })
                            ->columnSpanFull(),

                        TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->unique(JobPost::class, 'slug', ignoreRecord: true),
                        Select::make('region_id')
                            ->label('Region')
                            ->placeholder('Choose Region')
                            ->relationship("region", "name")
                            ->preload()
                            ->searchable()
                            ->required(),
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
                        TextInput::make('salary')
                            ->placeholder('eg: 50, 100, nego...')
                            ->suffix("lakhs")
                            ->required()
                            ->columnSpanFull(),
                    ])->columnSpan(1),
                Section::make("Job Status")
                    ->schema([
                        Select::make('status_id')
                            ->label('Status')
                            ->placeholder('Choose Status')
                            ->relationship(
                                name: "status",
                                titleAttribute: "title",
                                modifyQueryUsing: fn (Builder $query) => $query->where('type', 'job_status')
                            )
                            ->native(false)
                            ->required(),
                    ])->columnSpan(1),
                Section::make("Job Description")
                    ->columns(2)
                    ->schema([

                        // DateTimePicker::make('deadline_date')
                        //     ->placeholder("dd/mm/yyyy")
                        //     ->native(false)
                        //     ->seconds(false)
                        //     ->timezone("Asia/Yangon")
                        //     ->required(),
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
                // ImageColumn::make('image')
                //     ->circular()
                //     ->label('Image'),
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make("salary")->suffix('Lakhs')->sortable(),
                TextColumn::make("type.name")->badge()->toggleable(),
                TextColumn::make("category.name")->toggleable(),
                // ToggleColumn::make('status.title'),
                TextColumn::make("region.name")->toggleable(),
                TextColumn::make("user.name")->label('Created By')->toggleable(),
                TextColumn::make('status.title')
                    ->badge()
                    // ->icon(fn (string $state): string => match ($state) {
                    //     'Available' => 'fas-check-circle',
                    //     'Closed' => 'fas-x-mark'
                    // })
                    ->color(fn (string $state): string => match ($state) {
                        'Available' => 'success',
                        'Closed' => 'danger',
                    })->toggleable(),
                TextColumn::make("created_at")->label("Published")->since()->sortable(),
                TextColumn::make("applied_jobs_count")->counts('applied_jobs')->label('Applied Employers'),
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
                    )->preload(),
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('from')
                            ->label('Start Date')
                            ->native(false)
                            ->placeholder('dd/mm/yyyy'),
                        DatePicker::make('until')
                            ->label('End Date')
                            ->native(false)
                            ->placeholder('dd/mm/yyyy'),
                    ])
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];

                        if ($data['from'] ?? null) {
                            $indicators['from'] = 'Created from ' . Carbon::parse($data['from'])->toFormattedDateString();
                        }

                        if ($data['until'] ?? null) {
                            $indicators['until'] = 'Created until ' . Carbon::parse($data['until'])->toFormattedDateString();
                        }

                        return $indicators;
                    })
            ])->filtersTriggerAction(
                fn (Action $action) => $action
                    ->button()
                    ->label('Filter'),
            )
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

    public static function getEloquentQuery(): Builder
    {
        $employer = Type::where('slug', 'employer')->first();

        if (auth()->user()->type->id == $employer->id) {
            return parent::getEloquentQuery()->where('user_id', auth()->user()->id);
        } else {
            return parent::getEloquentQuery();
        }
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
            'index' => ListJobPosts::route('/'),
            'create' => CreateJobPost::route('/create'),
            'edit' => EditJobPost::route('/{record}/edit'),
            'view' => ViewJobPost::route('/{record}'),
        ];
    }
}
