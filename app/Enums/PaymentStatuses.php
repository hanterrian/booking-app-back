<?php

namespace App\Enums;

enum PaymentStatuses: int
{
    case IN_PROCESS = 0;
    case COMPLETE = 1;
    case CANCEL = 2;
}
