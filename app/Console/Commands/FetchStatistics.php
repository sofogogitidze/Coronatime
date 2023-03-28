<?php

namespace App\Console\Commands;

use App\Models\CountryStatistics;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchStatistics extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'fetch:statistics';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command for synchronising data for particular country statistics from API';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$client = new Client();
		$request = new Request('GET', 'https://devtest.ge/countries');
		$res = $client->sendAsync($request)->wait();
		$countries = json_decode($res->getBody(), true);

		foreach ($countries as $country)
		{
			$country = (array)$country;
			$code = $country['code'];
			$name = $country['name'];

			$response = Http::withHeaders([
				'Accept'       => 'application/json',
				'Content-Type' => 'application/json',
			])->post('https://devtest.ge/get-country-statistics', [
				'code' => $code,
			]);
			$data = $response->json();
			$countryStatistics = new CountryStatistics;
			$countryStatistics->confirmed = $data['confirmed'];
			$countryStatistics->code = $code;
			$countryStatistics->setTranslation('name', 'en', $name['en']);
			$countryStatistics->setTranslation('name', 'ka', $name['ka']);
			$countryStatistics->recovered = $data['recovered'];
			$countryStatistics->critical = $data['critical'];
			$countryStatistics->deaths = $data['deaths'];
			$countryStatistics->save();
		}
		$this->info('Successfully fetched country statistics');
	}
}
