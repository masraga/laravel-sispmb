@section("page-title") LOGIN @endsection
<div class="w-full h-lvh flex justify-center items-center bg-slate-100">
  <div class="wrapper bg-zinc-50 px-4 py-4 rounded w-1/3 shadow-md">
    <div class="app-name text-sky-700 font-bold text-2xl text-center flex justify-center"><x-heroicons::solid.academic-cap class="w-10 h-10 pr-2" /> <span class="pt-1">{{config("app.name")}}</span></div>
    <div class="capitalize text-gray-500 font-light text-normal text-center mt-1">Silahkan login ke dalam sistem {{config("app-name")}}</div>
    <form class="mt-5" wire:submit="store">
      @if(session()->has("error-login"))
        <div class="text-red-700 text-center font-medium">{{session("error-login")}}</div>
      @endif

      @if(session()->has('color'))
        <div class="text-{{session('color')}}-700 text-center font-medium">{{session('msg')}}</div>
      @endif
      <div class="form-control mb-3">
        <label for="" class="block mb-1 text-sm text-gray-500 font-medium">EMAIL</label>
        <input wire:model="email" type="text" autofocus class="w-full bg-zinc-50 border-gray-600 rounded focus:outline-gray-700 px-2 py-2 font-normal text-gray-600 border-solid border">
        @error('email') <span class="text-red-700 text-sm font-medium">{{$message}}</span> @enderror
      </div>
      <div class="form-control mb-3">
        <label for="" class="block mb-1 text-sm text-gray-500 font-medium">PASSWORD</label>
        <input wire:model="password" type="password" class="w-full bg-zinc-50 border-gray-600 rounded focus:outline-gray-700 px-2 py-2 font-normal text-gray-600 border-solid border">
        @error('password') <span class="text-red-700 text-sm font-medium">{{$message}}</span> @enderror
      </div>
      <button class="bg-sky-700 mb-3 hover:bg-sky-800 rounded w-full text-zinc-50 font-medium px-10 py-2 mt-3" type="submit">Login</button>
      <div class="flex justify-between w-full">
        <a href="" class="text-left mb-3 rounded w-full text-sky-700 hover:text-sky-800 font-normal">Lupa password</a>
        <a href="/" class="text-right mb-3 rounded w-full text-sky-700 hover:text-sky-800 font-normal">Belum memiliki akun ?</a>
      </div>
    </form>
  </div>
</div>
