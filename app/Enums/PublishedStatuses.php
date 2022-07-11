<?php

namespace App\Enums;

enum PublishedStatuses: int
{
    case UNPUBLISHED = 0;
    case DRAFT = 1;
    case PUBLISHED = 2;
}
