<?php

use Trans\Models\Translate;

if (! function_exists('trans_db')) {
    function trans_db($str) {
        return Translate::trans($str);
    }
}