@section("page-title") DAFTAR @endsection
<div class="w-full my-5 flex justify-center items-center bg-slate-100">
  <div class="wrapper bg-zinc-50 px-4 py-4 rounded w-1/3 shadow-md">
    <div class="app-name text-sky-700 font-bold text-2xl text-center flex justify-center"><x-heroicons::solid.academic-cap class="w-10 h-10 pr-2" /> <span class="pt-1">{{config("app.name")}}</span></div>
    <div class="capitalize text-gray-500 font-light text-normal text-center mt-1">Daftar sebagai calon mahasiswa</div>
    <form class="mt-5" wire:submit="store">
      <div class="text-red-700 text-center font-medium">{{session("error-login")}}</div>
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
      <div class="form-control mb-3">
        <label for="" class="block mb-1 text-sm text-gray-500 font-medium">NIM</label>
        <input wire:model="code" type="text" class="w-full bg-zinc-50 border-gray-600 rounded focus:outline-gray-700 px-2 py-2 font-normal text-gray-600 border-solid border">
        @error('code') <span class="text-red-700 text-sm font-medium">{{$message}}</span> @enderror
      </div>
      <div class="form-control mb-3">
        <label for="" class="block mb-1 text-sm text-gray-500 font-medium">NAMA</label>
        <input wire:model="name" type="text" class="w-full bg-zinc-50 border-gray-600 rounded focus:outline-gray-700 px-2 py-2 font-normal text-gray-600 border-solid border">
        @error('name') <span class="text-red-700 text-sm font-medium">{{$message}}</span> @enderror
      </div>
      <div class="form-control mb-3">
        <label for="" class="block mb-1 text-sm text-gray-500 font-medium">ASAL SEKOLAH</label>
        <input wire:model="schoolOrigin" type="text" class="w-full bg-zinc-50 border-gray-600 rounded focus:outline-gray-700 px-2 py-2 font-normal text-gray-600 border-solid border">
        @error('schoolOrigin') <span class="text-red-700 text-sm font-medium">{{$message}}</span> @enderror
      </div>
      <div class="form-control mb-3">
        <label for="" class="block mb-1 text-sm text-gray-500 font-medium">JENIS KELAMIN</label>
        <select wire:model="gender" type="text" class="w-full bg-zinc-50 border-gray-600 rounded focus:outline-gray-700 px-2 py-2 font-normal text-gray-600 border-solid border">
            <option value="">--pilih kelamin--</option>
            <option value="1">Laki-laki</option>
            <option value="0">Perempuan</option>
        </select>
        @error('schoolOrigin') <span class="text-red-700 text-sm font-medium">{{$message}}</span> @enderror
      </div>
      <div class="form-control mb-3">
        <label for="" class="block mb-1 text-sm text-gray-500 font-medium">ALAMAT RUMAH</label>
        <textarea wire:model="address" type="text" class="w-full bg-zinc-50 border-gray-600 rounded focus:outline-gray-700 px-2 py-2 font-normal text-gray-600 border-solid border" rows="4"></textarea>
        @error('address') <span class="text-red-700 text-sm font-medium">{{$message}}</span> @enderror
      </div>
      <button class="bg-sky-700 mb-3 hover:bg-sky-800 rounded w-full text-zinc-50 font-medium px-10 py-2 mt-3" type="submit">Daftar PPDB</button>
      <div class="flex justify-between w-full">
        <a href="/login" class="text-right mb-3 rounded w-full text-sky-700 hover:text-sky-800 font-normal">Sudah memiliki akun ?</a>
      </div>
    </form>
  </div>
</div>
