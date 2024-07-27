<?php

namespace App\Livewire\Guest;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\User;
use App\Models\Students;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
  #[Validate('required')]
  public $code = "";

  #[Validate('required')]
  public $email = "";

  #[Validate('required')]
  public $password = "";

  #[Validate('required')]
  public $name = "";

  #[Validate('required')]
  public $gender = null;

  #[Validate('required')]
  public $address = "";

  #[Validate('required')]
  public $schoolOrigin = "";

  public function store()
  {
    $this->validate();

    $user = User::create([
      "email" => $this->email,
      "password" => Hash::make($this->password),
      "name" => $this->name,
    ]);
    $student = Students::create([
      "code" => $this->code,
      "name" => $this->name,
      "gender" => $this->gender,
      "address" => $this->address,
      "schoolOrigin" => $this->schoolOrigin,
      "user_id" => $user->id
    ]);

    $user->assignRole("mahasiswa");

    session()->flash("color", "green");
    session()->flash("msg", "User brhasil didaftarkan silahkan login");

    if (Auth::attempt(["email" => $this->email, "password" => $this->password])) {
      if ($user->hasRole("mahasiswa")) {
        return to_route("student.select-pmb");
      }
    }
  }

  public function render()
  {
    return view('livewire.guest.register');
  }
}
