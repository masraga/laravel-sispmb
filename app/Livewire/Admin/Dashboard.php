<?php

namespace App\Livewire\Admin;

use App\Models\Faculties;
use App\Models\Invoice;
use App\Models\PMB;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
  public $invoices = [];

  public $periodDate = "";

  public $totalFaculty = 0;

  public $totalPmb = 0;

  public $totalStudent = 0;

  public function mount()
  {
    $invDataset = Invoice::where("paymentStatus", "paid")
      ->selectRaw('sum(1) as total')
      ->selectRaw("date_format(created_at, '%Y-%m-%e') as created_date_format")
      ->groupBy(DB::raw('created_at'))
      ->get()
      ->toArray();

    $dateStart = Carbon::now()->startOfMonth();
    $dateEnd = Carbon::now()->endOfMonth();
    $diff = round($dateEnd->diffInDays($dateStart, true));
    $currMonth = Carbon::now()->format("Y-m");
    $graphInv = [];
    for ($i = 1; $i <= $diff; $i++) {
      $graphInv[$currMonth . "-" . $i] = 0;
    }
    foreach ($invDataset as $dataset) {
      $graphInv[$dataset["created_date_format"]] = intval($dataset["total"]);
      $this->totalStudent++;
    }
    foreach ($graphInv as $key => $val) {
      $this->invoices[] = [
        "date" => $key,
        "value" => $val
      ];
    }

    $this->periodDate = Carbon::now()->format("M Y");
    $this->totalFaculty = Faculties::count();
    $this->totalPmb = PMB::count();
  }

  public function render()
  {
    return view('livewire.admin.dashboard');
  }
}
