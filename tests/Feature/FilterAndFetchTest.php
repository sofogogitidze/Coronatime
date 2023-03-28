<?php

namespace Tests\Feature;

use App\Models\CountryStatistics;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FilterAndFetchTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
	public function test_filter_scope()
	{
		$first = CountryStatistics::factory()->create(['name' => 'England']);
		$second = CountryStatistics::factory()->create(['name' => 'United States']);

		$results = CountryStatistics::filter('United')->get();
		$this->assertFalse($results->contains($first));
		$this->assertTrue($results->contains($second));
	}

	public function test_console_command()
	{
		$this->artisan('fetch:statistics')->assertSuccessful();
	}
}
