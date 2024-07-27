<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
  #[Validate('email|required')]
  public $email = "";

  #[Validate('required')]
  public $password = "";

  public function store()
  {
    if (Auth::attempt($this->validate())) {
      $user = User::find(Auth::user()->id);
      if ($user->hasRole("admin")) {
        return to_route("dashboard");
      } else if ($user->hasRole("mahasiswa")) {
        return to_route("student.check-pmb-payment");
      }
    }

    session()->flash('error-login', 'Wrong email / password');
  }

  public function render()
  {
    return view('livewire.login');
  }
}
