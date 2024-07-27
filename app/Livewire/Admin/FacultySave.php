<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Livewire\Forms\FacultyForm;
use App\Livewire\Forms\StudyForm;
use App\Models\Faculties;

class FacultySave extends Component
{
    public FacultyForm $facultyForm;
    
    public StudyForm $studyForm;

    protected Faculties $facultyModel;

    protected array $faculties = [];

    public function boot()
    {
      $this->facultyModel = new Faculties();
    }

    public function mount()
    {
      $this->faculties = $this->facultyModel->get()->toArray();
    }

    public function store()
    {
      $this->facultyForm->store();
      $this->redirect("/faculty/save");
    }
    
    public function storeStudy()
    {
      $this->studyForm->store();
      $this->redirect("/faculty/save");
    }

    public function render()
    {
        return view('livewire.admin.faculty-save');
    }
}
