<?php

use Illuminate\Support\Facades\Cache;
use Trans\Models\Translate;

if (!function_exists('trans_db')) {
	function trans_db($str, $time = 600)
	{
		$k = 'trans_db_' . md5($str . app()->getLocale());
		if (Cache::store('file')->has($k)) {
			$c = Cache::store('file')->get($k);
			if (!empty($c)) {
				return $c;
			}
			Cache::forget($k);
		}

		$t = Translate::trans($str);
		Cache::store('file')->put($k, $t, $time);
		return $t;
	}
}
