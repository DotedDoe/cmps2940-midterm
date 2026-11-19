<?php

namespace App\Enum;

enum OrderStatus: string
{
    case Pending = 'pending';
    case Preparing = 'preparing';
    case Fulfilled = 'fulfilled';

    public function label(): string
    {
        return ucfirst($this->value);
    }

    public function next(): ?self
    {
        return match ($this) {
            self::Pending => self::Preparing,
            self::Preparing => self::Fulfilled,
            self::Fulfilled => null,
        };
    }
}