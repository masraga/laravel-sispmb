@section("page-title") PMB @endsection
<x-main-content pageTitle="PMB" pageInfo="Pendaftaran Mahasiswa Baru">
  <div class="bg-zinc-50 px-2 py-2 rounded">
    @foreach ($this->invoice as $invoice)
    <p class="my-3">informasi mahasiswa</p>
    <table>
      <tr>
        <td class="text-gray-600 border px-2 py-2">NISN: &nbsp;</td>
        <td class="text-gray-600 border px-2 py-2">{{$invoice->student->code}}</td>
      </tr>
      <tr>
        <td class="text-gray-600 border px-2 py-2">Nama lengkap: &nbsp;</td>
        <td class="text-gray-600 border px-2 py-2">{{$invoice->student->name}}</td>
      </tr>
      <tr>
        <td class="text-gray-600 border px-2 py-2">Email: &nbsp;</td>
        <td class="text-gray-600 border px-2 py-2">{{$invoice->student->user->email}}</td>
      </tr>
      <tr>
        <td class="text-gray-600 border px-2 py-2">Kelamin &nbsp;</td>
        <td class="text-gray-600 font-medium border px-2 py-2">
          @if($invoice->student->gender == 1)
          Laki-Laki
          @else
          Perempuan
          @endif
        </td>
      </tr>
      <tr>
        <td class="text-gray-600 border px-2 py-2">Alamat: &nbsp;</td>
        <td class="text-gray-600 border px-2 py-2">{{$invoice->student->address}}</td>
      </tr>
    </table>
    <p class="my-3">Informasi jurusan</p>
    <table>
      <tr>
        <td class="text-gray-600 border px-2 py-2">Jurusan: &nbsp;</td>
        <td class="text-gray-600 border px-2 py-2">{{$invoice->pmbStudy->study->name}}</td>
      </tr>
    </table>
    <p class="my-3">status pembayaran</p>
    <table>
      <tr>
        <td class="text-gray-600 border px-2 py-2">Status pembayaran: &nbsp;</td>
        <td class="text-gray-600 border px-2 py-2">
          @if ($invoice->paymentStatus == "unpaid")
          <span class="text-orange-600">Belum lunas</span>
          @else
          <span class="text-green-600">Sudah lunas</span>
          @endif
        </td>
      </tr>
      <tr>
        <td class="text-gray-600 border px-2 py-2">Link pembayaran: &nbsp;</td>
        <td class="text-blue-500 border px-2 py-2">
          <a class="text-blue-500 font-medium" href="{{$invoice->payment_url}}">Lihat link pembayaran</a>
        </td>
      </tr>
    </table>
    @endforeach
  </div>
</x-main-content>