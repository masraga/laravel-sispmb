<?php

namespace App\Livewire\Student;

use App\Models\Faculties;
use App\Models\Invoice;
use App\Models\PMBStudies;
use App\Models\Students;
use App\Models\Studies;
use App\Services\Midtrans;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class PmbDetail extends Component
{
  use WithFileUploads;

  public $facultyList;

  public $step = 1;

  public $route;

  public $userInfo;

  public $pmbId;

  #[Validate('required')]
  public $studyName;

  #[Validate("required")]
  public $skl;

  #[Validate('required')]
  public $photo;

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

  public function mount(Request $request)
  {
    $this->pmbId = $request->id;
    $this->getFaculties($request);
    $this->getUserInfo($request);
  }

  private function getUserInfo(Request $request)
  {
    $this->userInfo = Students::with("user")->where("user_id", Auth::user()->id)->first();
  }

  private function getFaculties(Request $request)
  {
    $pmbStudies = PMBStudies::with(["study", "pmb"])->where("pmb_studies.pmb_id", $request->id)->get();
    $faculties = [];
    foreach ($pmbStudies as $pmbStudy) {
      $faculties[] = $pmbStudy->study->faculty->id;
    }
    $this->facultyList = Faculties::with(["study"])->whereIn("id", $faculties)->get();
  }

  #[On('setStep')]
  public function setStep($step)
  {
    $this->step = $step;
  }

  public function store()
  {
    $this->validate();

    $uploadPath = "public/";
    $userCode = $this->userInfo->code;
    $sklName = "skl-{$userCode}.jpg";
    $photoName = "photo-{$userCode}.jpg";
    $study = Studies::where("name", $this->studyName)->first();
    $currentInvoice = Invoice::where("p_m_b_studies_id", $this->pmbId)
      ->where("paymentStatus", "paid")
      ->count();

    if ($currentInvoice == $study->quota) {
      return $this->addError("quota", "study quota is insufficient");
    }

    $this->skl->store($uploadPath . $sklName,);
    $this->photo->store($uploadPath . $photoName);

    $pmbStudy = PMBStudies::with(["pmb"])
      ->where(["pmb_id" => $this->pmbId, "studies_id" => $study->id])->first();
    $invoiceCode = "INV" . Carbon::now()->format("Ymdhis");
    $expiredDb = Carbon::now()->addHours(1);

    $mid = new Midtrans();
    $token = $mid->generateToken([
      "order_id" => $invoiceCode,
      "amount" => intval($pmbStudy->pmb->fee),
      "customerName" => $this->userInfo->name,
      "customerEmail" => Auth::user()->email,
      "itemName" => "pembayaran pmb {$this->userInfo->name}",
    ]);

    $invoice = Invoice::create([
      "fee" => $pmbStudy->pmb->fee,
      "code" => $invoiceCode,
      "expired_at" => $expiredDb,
      "p_m_b_studies_id" => $pmbStudy->id,
      "students_id" => $this->userInfo->id,
      "payment_url" => $token
    ]);

    $this->dispatch("midtrans-url", $token);
  }

  public function render()
  {
    return view('livewire.student.pmb-detail');
  }
}
