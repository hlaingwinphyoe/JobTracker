<?php

namespace App\Filament\Resources\AppliedJobResource\Pages;

use App\Filament\Resources\AppliedJobResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppliedJobs extends ListRecords
{
    protected static string $resource = AppliedJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
