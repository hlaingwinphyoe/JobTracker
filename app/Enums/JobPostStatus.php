<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum JobPostStatus: string implements HasIcon, HasColor, HasLabel
{
    case AVAILABLE = 'available';
    case CLOSED = 'closed';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::AVAILABLE => 'Available',
            self::CLOSED => 'Closed',
        };
    }

    public function getColor(): string|array|null
    {
        return match($this) {
            self::AVAILABLE => 'success',
            self::CLOSED => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match($this) {
            self::AVAILABLE => 'fa-solid fa-circle-check',
            self::CLOSED => 'fa-solid fa-circle-xmark',
        };
    }
}