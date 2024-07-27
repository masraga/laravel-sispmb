<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Studies;

class StudySettings extends Component
{
    public $study = null;
    
    #[Validate('required')]
    public $quota = 0;

    public function mount(Request $request)
    {
      $this->study = Studies::find($request->id);
      $this->quota = $this->study->quota;
    }

    public function store()
    {
      $this->validate();
      
      $this->study->quota = $this->quota;
      $this->study->save();

      session()->flash("color", "green");
      session()->flash("msg", "Quota pendaftaran berhasil ditambahkan");

      $this->redirect("/studies/settings/".$this->study->id);
    }
    
    public function render()
    {
      return view('livewire.admin.study-settings');
    }
}
