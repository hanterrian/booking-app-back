<?php

namespace App\Models;

use App\Models\Traits\Uuid;

class Media extends \Spatie\MediaLibrary\MediaCollections\Models\Media
{
    use Uuid;

    protected $primaryKey = 'uuid';
}
