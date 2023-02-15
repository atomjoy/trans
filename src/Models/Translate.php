<?php

namespace Trans\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translate extends Model
{
	use HasFactory;

	protected $guarded = [];

	// Translate from database
	public static function trans($str)
	{
		$locale = app()->getLocale();
		return self::text($str)->locale($locale)->first()->value ?? trans($str);
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