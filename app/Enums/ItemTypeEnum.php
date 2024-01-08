<?php

namespace App\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum ItemTypeEnum: string implements HasLabel, HasColor, HasIcon
{
    case FOOD = 'food';
    case SUPPLIES = 'supplies';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::FOOD => __('food'),
            self::SUPPLIES => __('supplies'),
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::FOOD => 'success',
            self::SUPPLIES => 'gray',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::FOOD => 'heroicon-m-cake',
            self::SUPPLIES => 'heroicon-m-wrench',
        };
    }
}