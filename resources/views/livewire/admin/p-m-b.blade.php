@section("page-title") PMB @endsection
<x-main-content pageTitle="PMB" pageInfo="Pendaftaran Mahasiswa Baru">
  <div class="card shadow-md px-4 py-4 bg-zinc-50 rounded">
    <a href="{{Route('pmb.save')}}" class="block text-sky-700 hover:text-sky-800 font-bold text-sm rounded">+ Tambah jalur pendaftaran</a>
  </div>
  <div class="grid grid-cols-3 gap-3 mt-5">
    @foreach ($pmbItems as $pmb)
    <a href="{{Route('admin.pmb.candidat', $pmb['id'])}}" class="bg-zinc-50 px-3 py-3 shadow-md rounded">
      <div class="text-sky-700 font-bold text-xl pb-3">{{$pmb["name"]}}</div>
      <table>
        <tr>
          <td class="text-sm text-gray-500">Dimulai &nbsp;</td>
          <td class="text-sm text-gray-700 font-medium">:&nbsp; {{date("d M Y", strtotime($pmb["date_start"]))}} - {{date("d M Y", strtotime($pmb["date_end"]))}}</td>
        </tr>
        <tr>
          <td class="text-sm text-gray-500">Jmlh. Prodi &nbsp;</td>
          <td class="text-sm text-gray-700 font-medium">:&nbsp; {{count($pmb["pmb_studies"])}}</td>
        </tr>
        <tr>
          <td class="text-sm text-gray-500">Status &nbsp;</td>
          <td class="text-sm text-gray-700 font-medium">:&nbsp;
            @if ($pmb["status"] == $START)
            <span class="text-green-600 text-sm font-medium rounded">{{$pmb["status"]}}</span>
            @else
            <span class="text-gray-400 text-sm font-medium rounded">{{$pmb["status"]}}</span>
            @endif
          </td>
        </tr>
      </table>
    </a>
    @endforeach
  </div>
</x-main-content>