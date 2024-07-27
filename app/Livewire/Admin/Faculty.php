<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Faculties;

class Faculty extends Component
{
  public function render()
  {
    $faculties = Faculties::with(["study"])->get()->toArray();
    return view('livewire.admin.faculty', ["faculties" => $faculties]);
  }
}
