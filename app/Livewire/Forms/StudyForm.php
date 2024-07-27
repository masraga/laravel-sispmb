<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Studies;

class StudyForm extends Form
{
  #[Validate('required')]
  public $facultyId = '';

  #[Validate('required')]
  public $studyName = '';

  public function store()
  {
    Studies::create([
      "faculty_id" => $this->facultyId,
      "name" => $this->studyName,
    ]);
    session()->flash("study_success", 'Prodi berhasil ditambahkan');
    $this->validate();
  }
}
