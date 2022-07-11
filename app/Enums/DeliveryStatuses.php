<?php

namespace App\Enums;

enum DeliveryStatuses: int
{
    case IN_PROCESS = 0;
    case COMPLETE = 1;
    case CANCEL = 2;
}
