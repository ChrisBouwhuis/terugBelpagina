<?php

namespace App\Enums;

enum status : string
{
    case new = 'New';
    case inProgress = 'In progress';
    case done = 'Done';

    public function getLabel(): string
    {
        return match ($this) {
            self::new => 'New',
            self::inProgress => 'In progress',
            self::done => 'Done',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::new => 'gray',
            self::inProgress => 'yellow',
            self::done => 'green',
        };
    }
}
