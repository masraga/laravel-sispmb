<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Faculties;
use App\Models\Studies;

class FacultyForm extends Form
{
  #[Validate('required')]
  public $facultyName = '';

  #[Validate('required')]
  public $firstStudyName = '';

  public $studyId = '';

  public function store()
  {
    $this->validate();
    $faculty = Faculties::create([
      "name" => $this->facultyName
    ]);
    $study = Studies::create([
      "faculty_id"=> $faculty->id,
      "name" => $this->firstStudyName
    ]);
    session()->flash("faculty_success", "Fakultas berhasil ditambahkan");
  }
}
