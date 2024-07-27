<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\PMB;
use App\Services\Midtrans;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
  public function paymentNotif(Request $request)
  {
    $status = $request->transaction_status;
    $orderId = $request->order_id;
    if ($status == "settlement" || $status == "capture") {
      Invoice::where("code", $orderId)->update(["paymentStatus" => "paid"]);
    }

    return true;
  }

  public function deletePmb(Request $request)
  {
    PMB::find($request->pmbId)->delete();
    return redirect("/pmb");
  }
}
