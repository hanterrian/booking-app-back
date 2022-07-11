<?php

namespace App\Enums;

enum OrderStatuses: int
{
    case OPEN = 0;
    case PENDING = 2;
    case IN_PROCESS = 3;
    case COMPLETE = 4;
    case CANCEL = 5;
}
