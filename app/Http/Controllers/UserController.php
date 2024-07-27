<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return to_route("login");
  }

  public function checkPmbRedirect(Request $request)
  {
    $user = User::find(Auth::user()->id);
    if ($user->hasRole('admin')) {
    } else if ($user->hasRole('mahasiswa')) {
      return redirect("/student/detail-pmb/{$request->id}");
    }
  }

  public function checkStudentPmbPayment(Request $request)
  {
    $student = Students::where("user_id", Auth::user()->id)->first();
    $invoices = Invoice::where(["paymentStatus" => "paid", "students_id" => $student->id])
      ->orWhere(["expired_at" => ">" . Carbon::now(), "students_id" => $student->id])
      ->get();
    foreach ($invoices as $invoice) {
      if ($invoice->paymentStatus == "paid") {
        return redirect("/student/pmb/invoice/" . $invoice->id);
      } else {
        return redirect("/select-pmb");
      }
    }
    return redirect("/select-pmb");
  }
}
