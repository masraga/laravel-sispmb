<?php

namespace App\Livewire\Admin;

use App\Models\Invoice;
use App\Models\PMB;
use Illuminate\Http\Request;
use Livewire\Component;

class PmbCandidat extends Component
{
  public $invoices;

  public $pmb;

  public function mount(Request $request)
  {
    $this->pmb = PMB::where("id", $request->pmbId)->first();
    $this->invoices = Invoice::where([
      "paymentStatus" => "paid"
    ])
      ->join("pmb_studies", "pmb_studies.id", "=", "invoices.p_m_b_studies_id")
      ->where("pmb_studies.pmb_id", $this->pmb->id)
      ->get();
  }

  public function render()
  {
    return view('livewire.admin.pmb-candidat');
  }
}
