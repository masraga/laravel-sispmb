<?php

namespace App\Livewire\Student;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Livewire\Component;

class PaidPmb extends Component
{
  public $invoiceInfo;

  public $invoice;

  public function mount(Request $request)
  {
    $this->invoice = Invoice::with(["pmbStudy", "student"])->where("id", $request->invoiceId)->get();
  }

  public function render()
  {
    return view('livewire.student.paid-pmb');
  }
}
