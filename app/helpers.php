<?php

function format_bool(mixed $value): string
{
    if (!!$value) {
        return 'Yes';
    } else {
        return 'No';
    }
}
