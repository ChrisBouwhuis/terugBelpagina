<?php

namespace App\Enums;

enum status : string
{
    case new = 'New';
    case inProgress = 'In progress';
    case done = 'Done';
}
