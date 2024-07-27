@section("page-title") FAKULTAS @endsection
<x-main-content pageTitle="Fakultas" pageInfo="Pengaturan master data fakultas & prodi">
  <div class="card shadow-md px-4 py-4 bg-zinc-50 rounded">
  <a href="{{Route('faculty.save')}}" class="block text-sky-700 hover:text-sky-800 font-bold text-sm mb-5">+ Tambah fakultas baru</a>
  
  <ul>
    @foreach ($faculties as $fac)
      <li class="pb-2 container">
        <div class="title font-bold text-gray-700 mb-2">{{$fac["name"]}}</div>
        <ul class="ml-4 border-t border-gray-300">
          @foreach ($fac["study"] as $study)
            <li class="py-2 flex justify-between border-b border-gray-300">
              <div class="title group relative">
                <a href="{{Route('study.settings', $study['id'])}}" class="hover:text-sky-700 group relative">{{$study["name"]}} </a>
              </div>
              <div class="action flex group relative">
                <a href="{{Route('study.settings', $study['id'])}}" class="group text-sky-700" title="Pengaturan"><x-heroicons::outline.pencil-square /></a>
              </div>
            </li>
          @endforeach
        </ul>
      </li>
    @endforeach
  </ul>
  </div>
</x-main-content>