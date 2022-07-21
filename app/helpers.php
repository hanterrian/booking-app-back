<?php

function format_bool(mixed $value): string
{
    if ((bool) $value) {
        return 'Yes';
    } else {
        return 'No';
    }
}
