@section("page-title") FAKULTAS @endsection
<x-main-content pageTitle="Fakultas" pageInfo="Pengaturan master data fakultas & prodi">
  <div class="card shadow-md mb-8 px-4 py-4 bg-zinc-50 mb-8 rounded">
    <div class="card-header text-gray-800 text-sm font-bold">TAMBAH FAKULTAS BARU</div>
    <div class="card-body mt-3 text-sky-700">
      <div class="text-green-700 text-sm font-medium">{{session("faculty_success")}}</div>
      <form wire:submit="store">
        @csrf
        <div class="form-control mb-3">
          <label class="block mb-1 text-sm text-gray-500 font-medium">FAKULTAS</label>
          <input type="text" wire:model="facultyForm.facultyName" autofocus class="w-full bg-zinc-50 border-gray-600 rounded focus:outline-gray-700 px-2 py-2 font-normal text-gray-600 border-solid border" />
          @error('facultyForm.facultyName') <span class="text-red-700 text-sm font-medium">{{$message}}</span> @enderror
        </div>
        <div class="form-control mb-3">
          <label class="block mb-1 text-sm text-gray-500 font-medium">JURUSAN</label>
          <input type="text" wire:model="facultyForm.firstStudyName" class="w-full bg-zinc-50 border-gray-600 rounded focus:outline-gray-700 px-2 py-2 font-normal text-gray-600 border-solid border" />
          @error('facultyForm.firstStudyName') <span class="text-red-700 text-sm font-medium">{{$message}}</span> @enderror
        </div>
        <div class="form-control mb-3">
          <button class="bg-sky-700 mb-3 hover:bg-sky-800 rounded text-zinc-50 font-medium px-10 py-2 mt-3" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <div class="card shadow-md mb-8 px-4 py-4 bg-zinc-50 mb-8 rounded">
    <div class="card-header text-gray-800 text-sm font-bold">TAMBAH JURUSAN BARU</div>
    <div class="card-body mt-3 text-sky-700">
      <div class="text-green-700 text-sm font-medium">{{session("study_success")}}</div>
      <form wire:submit="storeStudy">
        @csrf
        <div class="form-control mb-3">
          <label class="block mb-1 text-sm text-gray-500 font-medium">FAKULTAS</label>
          <select wire:model="studyForm.facultyId" id="facultyId" class="w-full bg-zinc-50 border-gray-600 rounded focus:outline-gray-700 px-2 py-2 font-normal text-gray-600 border-solid border">
            <option value="">--Pilih fakultas--</option>
            @foreach ($this->faculties as $faculties)
              <option value="{{$faculties['id']}}">{{$faculties['name']}}</option>
            @endforeach
          </select>
          @error('studyForm.facultyId') <span class="text-red-700 text-sm font-medium">{{$message}}</span> @enderror
        </div>
        <div class="form-control mb-3">
          <label class="block mb-1 text-sm text-gray-500 font-medium">JURUSAN</label>
          <input type="text" wire:model="studyForm.studyName" class="w-full bg-zinc-50 border-gray-600 rounded focus:outline-gray-700 px-2 py-2 font-normal text-gray-600 border-solid border" />
          @error('studyForm.studyName') <span class="text-red-700 text-sm font-medium">{{$message}}</span> @enderror
        </div>
        <div class="form-control mb-3">
          <button class="bg-sky-700 mb-3 hover:bg-sky-800 rounded text-zinc-50 font-medium px-10 py-2 mt-3" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</x-main-content>