@section("page-title") PMB @endsection
<x-main-content pageTitle="PMB" pageInfo="Pendaftaran Mahasiswa Baru">
  <div class="card shadow-md px-4 py-4 bg-zinc-50 rounded">
    @error('studyName') <span class="text-red-700 block text-sm font-medium">{{$message}}</span> @enderror
    @error('skl') <span class="text-red-700 block text-sm font-medium">{{$message}}</span> @enderror
    @error('photo') <span class="text-red-700 block text-sm font-medium">{{$message}}</span> @enderror
    @error('quota') <span class="text-red-700 block text-sm font-medium">{{$message}}</span> @enderror
    <form wire:submit="store">
      @if ($this->step == 1)
      <div class="card-header text-gray-800 text-sm font-bold">PILIH FAKULTAS DAN JURUSAN</div>
      <br>
      <div class="step1">
        @foreach ($this->facultyList as $faculty)
        <label class="text-gray-600 uppercase text-sm font-bold" for="">{{$faculty->name}}</label>
        @foreach ($faculty->study as $study)
        <label class="block mt-2 cursor-pointer">
          <input type="radio" wire:model="studyName" class="mr-2" name="study" value="{{$study->name}}">{{$study->name}}
        </label>
        @endforeach
        @endforeach
        <div class="next-button w-full flex justify-end">
          <a href="javascript:void(0)" @click="$dispatch('setStep', {step: '2'})" class="bg-sky-700 mb-3 hover:bg-sky-800 rounded text-zinc-50 font-medium px-10 py-2 mt-3">Selanjutnya</a>
        </div>
      </div>
      @endif
      @if ($this->step == 2)
      <div class="step2">
        <div class="form-control mb-3">
          <label for="" class="block mb-1 text-sm text-gray-500 font-medium">SKL / IJAZAH</label>
          <input type="file" wire:model="skl" class="w-full bg-zinc-50 border-gray-600 rounded focus:outline-gray-700 px-2 py-2 font-normal text-gray-600 border-solid border">
        </div>
        <div class="form-control mb-3">
          <label for="" class="block mb-1 text-sm text-gray-500 font-medium">PAS FOTO 3X4</label>
          <input type="file" wire:model="photo" class="w-full bg-zinc-50 border-gray-600 rounded focus:outline-gray-700 px-2 py-2 font-normal text-gray-600 border-solid border">
        </div>
        <div class="next-button w-full flex justify-end gap-3">
          <a href="javascript:void(0)" @click="$dispatch('setStep', {step: 1})" class="rounded text-sky-800 font-medium px-10 py-2 mt-3">Sebelumnya</a>
          <a href="javascript:void(0)" @click="$dispatch('setStep', {step: 3})" class="bg-sky-700 mb-3 hover:bg-sky-800 rounded text-zinc-50 font-medium px-10 py-2 mt-3">Selanjutnya</a>
        </div>
      </div>
      @endif
      @if ($this->step == 3)
      <div class="step3">
        <div class="text-gray-400">Informasi Mahasiswa</div>
        <table>
          <tr>
            <td class="text-gray-600 border px-2 py-2">NISN: &nbsp;</td>
            <td class="text-gray-800 font-medium border px-2 py-2">{{$this->userInfo->code}}</td>
          </tr>
          <tr>
            <td class="text-gray-600 border px-2 py-2">Nama lengkap: &nbsp;</td>
            <td class="text-gray-800 font-medium border px-2 py-2">{{$this->userInfo->name}}</td>
          </tr>
          <tr>
            <td class="text-gray-600 border px-2 py-2">Email &nbsp;</td>
            <td class="text-gray-800 font-medium border px-2 py-2">{{$this->userInfo->user->email}}</td>
          </tr>
          <tr>
            <td class="text-gray-600 border px-2 py-2">Kelamin &nbsp;</td>
            <td class="text-gray-800 font-medium border px-2 py-2">
              @if($this->userInfo->gender == 1)
              Laki-Laki
              @else
              Perempuan
              @endif
            </td>
          </tr>
          <tr>
            <td class="text-gray-600 border px-2 py-2">Alamat &nbsp;</td>
            <td class="text-gray-800 font-medium border px-2 py-2">{{$this->userInfo->address}}</td>
          </tr>
        </table>
        <br>
        <div class="text-gray-400">Informasi Kelas</div>
        <table>
          <tr>
            <td class="text-gray-600 border px-2 py-2">Jurusan: &nbsp;</td>
            <td class="text-gray-800 font-medium border px-2 py-2">{{$this->studyName}}</td>
          </tr>
        </table>
        <div class="next-button w-full flex justify-end gap-3">
          <a href="javascript:void(0)" @click="$dispatch('setStep', {step: 2})" class="rounded text-sky-800 font-medium px-10 py-2 mt-3">Sebelumnya</a>
          <button type="submit" class="bg-sky-700 mb-3 hover:bg-sky-800 rounded text-zinc-50 font-medium px-10 py-2 mt-3">Pilih metode pembayaran</button>
        </div>
      </div>
      @endif
    </form>
  </div>

  @script
  <script>
    $wire.on('midtrans-url', (url) => {
      window.location = url;
    })
  </script>
  @endscript
</x-main-content>