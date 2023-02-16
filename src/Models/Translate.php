<?php

namespace Trans\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Translate extends Model
{
	use HasFactory;

	protected $guarded = [];

	// Translate from database
	public static function trans($str)
	{
		$locale = app()->getLocale();
		return Translate::text($str)->locale($locale)->first()->value ?? trans($str);
	}

	// Add to db
	public static function add($key, $value, $locale = 'en')
	{
		if (!empty($key) && !empty($value) && !empty($locale)) {
			Translate::updateOrCreate([
				'locale' => $locale, 'key' => $key
			], ['value' => $value]);

			return true;
		}
		return false;
	}

	public static function clearCache()
	{
		return Cache::store('file')->flush();
	}

	// Scope key
	public function scopeText($query, $key)
	{
		$query->where('key', $key);
	}

	// Scope locale
	public function scopeLocale($query, $locale = 'pl')
	{
		$query->where('locale', $locale);
	}
}
