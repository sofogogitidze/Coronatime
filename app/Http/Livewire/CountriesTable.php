<?php

namespace App\Http\Livewire;

use App\Models\CountryStatistics;
use Livewire\Component;

class CountriesTable extends Component
{
	public $sortField;

	public $sortAsc = true;

	public function sortBy($field)
	{
		if ($this->sortField === $field)
		{
			$this->sortAsc = !$this->sortAsc;
		}
		else
		{
			$this->sortAsc = true;
		}
		$this->sortField = $field;
	}

	public function render()
	{
//		$countries = CountryStatistics::query()
//			->when(request('search'), function ($query) {
//				$query->whereRaw('UPPER(name) LIKE ?', ['%' . strtoupper(request('search')) . '%']);
//			})
//
//			->when(isset($this->sortField), function ($query) {
//				$query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
//			}, function ($query) {
//				$query->orderBy('created_at', $this->sortAsc ? 'asc' : 'desc');
//			})
//			->get();
//		return view('livewire.countries-table', [
//			'country_statistics' => $countries,
//		]);

		return view('livewire.countries-table', [
			'country_statistics' => CountryStatistics::filter(request('search'))
				->orderBy(isset($this->sortField) ? $this->sortField : 'created_at', $this->sortAsc ? 'asc' : 'desc')
				->get(),
		]);
	}
}
