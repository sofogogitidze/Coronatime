<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CountryStatistics extends Model
{
	use HasFactory;

	use HasTranslations;

	protected $guarded = ['id'];

	public $translatable = ['name'];

	public function scopeFilter($query, $search = null)
	{
		if ($search)
		{
			$query->whereRaw('UPPER(name) LIKE ?', ['%' . strtoupper($search) . '%']);
		}
		return $query;
	}
}
