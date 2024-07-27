<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Studies;
use App\Models\PMB;
use App\Models\PMBStudies;

class PMBSave extends Component
{
	public $studyItems = [];

	#[Validate('required')]
	public $name = "";

	#[Validate('required')]
	public $fee = 0;

	#[Validate('required')]
	public $date_start = "";

	#[Validate('required')]
	public $date_end = "";

	#[Validate('required')]
	public $studies = [];

	public function mount()
	{
		$this->studyItems = Studies::all();
	}

	public function store()
	{
		$this->validate();
		$pmb = PMB::create([
			"name" => $this->name,
			"fee" => $this->fee,
			"date_start" => $this->date_start,
			"date_end" => $this->date_end 
		]);
		
		$is_all = array_filter($this->studies, function($arr){
			return $arr == "all";
		});
		if(count($is_all) > 0) {
			$studies = Studies::all();
			foreach($studies as $study)
			{
				PMBStudies::create([
					"pmb_id" => $pmb->id,
					"studies_id" => $study->id
				]);
			}
		}
		else {
			foreach($this->studies as $study)
			{
				PMBStudies::create([
					"pmb_id" => $pmb->id,
					"studies_id" => $study
				]);
			}
		}

		session()->flash("msg", "Jalur berhasil ditambahkan");
		session()->flash("color", "green");
		
		$this->redirect("/pmb/save");
	}

	public function render()
	{
		return view('livewire.admin.p-m-b-save');
	}
}
