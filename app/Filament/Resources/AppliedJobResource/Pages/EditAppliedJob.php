<?php

namespace App\Filament\Resources\AppliedJobResource\Pages;

use App\Filament\Resources\AppliedJobResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppliedJob extends EditRecord
{
    protected static string $resource = AppliedJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
