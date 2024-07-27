<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin;
use App\Livewire\Guest;
use App\Livewire\Student;
use App\Http\Controllers\UserController;

Route::middleware("guest")->group(function () {
  Route::get("/", Guest\Register::class)->name("");
  Route::get("/login", App\Livewire\Login::class)->name("login");
});

Route::middleware(["auth"])->group(function () {
  Route::post("/logout", [UserController::class, "logout"])->name("logout");
  Route::get("/check-pmb-redirect/{id}", [UserController::class, "checkPmbRedirect"])->name("checkPmbRedirect");
});

Route::middleware(["auth", "role:admin"])->group(function () {
  Route::get("/dashboard", Admin\Dashboard::class)->name("dashboard");
  Route::get("/faculty", Admin\Faculty::class)->name("faculty");
  Route::get("/faculty/save", Admin\FacultySave::class)->name("faculty.save");
  Route::get("/studies/settings/{id}", Admin\StudySettings::class)->name("study.settings");
  Route::get("/pmb", Admin\PMB::class)->name("pmb");
  Route::get("/pmb/save", Admin\PMBSave::class)->name("pmb.save");
  Route::get("/admin/pmb/candidat/{pmbId}", Admin\PmbCandidat::class)->name("admin.pmb.candidat");
  Route::get("/admin/pmb/delele/{pmbId}", [PaymentController::class, "deletePmb"])->name("admin.pmb.delete");
});

Route::group(["middleware" => ["auth", "role:mahasiswa"]], function () {
  Route::get("/check-student-payment", [UserController::class, "checkStudentPmbPayment"])->name("student.check-pmb-payment");
  Route::get("/select-pmb", Student\SelectPmb::class)->name("student.select-pmb");
  Route::get("/student/detail-pmb/{id}", Student\PmbDetail::class)->name("student.pmb-detail");
  Route::get("/student/pmb/invoice/{invoiceId}", Student\PaidPmb::class)->name("student.paid-pmb");
});
