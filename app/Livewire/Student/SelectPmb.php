<?php

namespace App\Livewire\Student;

use App\Models\Invoice;
use App\Models\PMB as PMBModel;
use App\Models\Students;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SelectPmb extends Component
{
    public $START = "Dimulai";

    public $END = "Berakhir";

    public $PREPARED = "Belum dimulai";

    public $pmbItems = [];

    public function boot()
    {
        $student = Students::where("user_id", Auth::user()->id)->first();
        $invoices = Invoice::where(["paymentStatus" => "paid", "students_id" => $student->id])
            ->orWhere(["expired_at" => ">" . Carbon::now(), "students_id" => $student->id])
            ->get();
        foreach ($invoices as $invoice) {
            if ($invoice->id) {
                return to_route("student.paid-pmb", $invoice->id);
            }
        }
    }

    public function mount()
    {
        $this->pmbItems = PMBModel::with("pmbStudies")->get()->toArray();;
        $this->pmbItems = array_map(function ($arr) {
            $dateStart = Carbon::createFromDate($arr["date_start"]);
            $dateEnd = Carbon::createFromDate($arr["date_end"]);
            $now = Carbon::now();
            $status = $this->START;
            if ($now->lt($dateStart) && $now->lt($dateEnd)) {
                $status = $this->PREPARED;
            }
            if ($now->gte($dateStart) && $now->gt($dateEnd)) {
                $status = $this->END;
            }
            $arr["status"] = $status;

            return $arr;
        }, $this->pmbItems);
    }

    public function render()
    {
        return view('livewire.student.select-pmb');
    }
}
