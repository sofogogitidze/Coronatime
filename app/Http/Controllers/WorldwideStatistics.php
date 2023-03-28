<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class WorldwideStatistics extends Controller
{
	public function index(): View
	{
		return view('auth.worldwide-statistics', [
			'confirmed' => DB::table('country_statistics')->sum('confirmed'),
			'recovered' => DB::table('country_statistics')->sum('recovered'),
			'critical'  => DB::table('country_statistics')->sum('critical'),
			'deaths'    => DB::table('country_statistics')->sum('deaths'),
		]);
	}
}
