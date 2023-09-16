<?php

namespace App\Filament\Resources\EmployersResource\Pages;

use App\Filament\Resources\EmployersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmployers extends EditRecord
{
    protected static string $resource = EmployersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
