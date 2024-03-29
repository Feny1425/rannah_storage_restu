<?php

namespace App\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum CloseTypeEnum: string implements HasLabel, HasColor, HasIcon
{
    case SOLD = 'sold';
    case SPOILED = 'spoiled';
    case STAFF_MEAL = 'staff_meals';
    case MEAL_PROVISION = 'meal_provision';
    case DONATION = 'donation';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SOLD => __('sold'),
            self::SPOILED => __('spoiled'),
            self::STAFF_MEAL => __('staff_meals'),
            self::MEAL_PROVISION => __('meal_provision'),
            self::DONATION => __('donation'),
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::SOLD, self::DONATION, self::MEAL_PROVISION => 'success',
            self::SPOILED => 'danger',
            self::STAFF_MEAL => 'orange',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::SOLD => 'heroicon-m-banknotes',
            self::SPOILED => 'heroicon-m-x-circle',
            self::STAFF_MEAL => 'heroicon-m-cake',
            self::MEAL_PROVISION => 'heroicon-m-building-office',
            self::DONATION => 'heroicon-m-heart',
        };
    }

    public static function fromValue(string $value): CloseTypeEnum
    {
        return match ($value) {
            'sold' => self::SOLD,
            'spoiled' => self::SPOILED,
            'staff_meals' => self::STAFF_MEAL,
            'meal_provision' => self::MEAL_PROVISION,
            'donation' => self::DONATION,
            default => throw new \InvalidArgumentException("Unknown value: $value"),
        };
    }
}