@section("page-title") PENGATURAN PRODI @endsection
<x-main-content pageTitle="Pengaturan prodi" pageInfo="{{$study->name}}">
  <div class="card shadow-md mb-8 px-4 py-4 bg-zinc-50 mb-8 rounded">
    <div class="card-header text-gray-800 text-sm font-bold">TAMBAH JALUR</div>
    <div class="card-body mt-3 text-sky-700">
      @if(session()->has('color'))
        <div class="text-{{session('color')}}-700 text-sm font-medium">{{session('msg')}}</div>
      @endif
      <form wire:submit="store">
        @csrf
        <div class="form-control mb-3">
          <label class="block mb-1 text-sm text-gray-500 font-medium">KUOTA PENDAFTARAN</label>
          <input type="number" wire:model="quota" autofocus class="w-full bg-zinc-50 border-gray-600 rounded focus:outline-gray-700 px-2 py-2 font-normal text-gray-600 border-solid border" />
        </div>
        <div class="form-control mb-3">
          <button class="bg-sky-700 mb-3 hover:bg-sky-800 rounded text-zinc-50 font-medium px-10 py-2 mt-3" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</x-main-content>