@section("page-title") DASHBOARD @endsection
<x-main-content pageTitle="Dashboard" pageInfo="Menapilkan overview fakultas & user login">
  <!-- START: overview card -->
  <div class="grid grid-cols-3 gap-4 mb-5">
    <div class="card shadow-md px-4 py-4 bg-zinc-50 rounded">
      <div class="card-header text-gray-500 text-sm font-normal">FAKULTAS</div>
      <div class="card-body mt-3 text-sky-700 font-bold text-3xl">{{$this->totalFaculty}}</div>
    </div>
    <div class="card shadow-md px-4 py-4 bg-zinc-50 rounded">
      <div class="card-header text-gray-500 text-sm font-normal">TOTAL JALUR PENDAFTARAN</div>
      <div class="card-body mt-3 text-sky-700 font-bold text-3xl">{{$this->totalPmb}}</div>
    </div>
    <div class="card shadow-md px-4 py-4 bg-zinc-50 rounded">
      <div class="card-header text-gray-500 text-sm font-normal">TOTAL MAHASISWA</div>
      <div class="card-body mt-3 text-sky-700 font-bold text-3xl">{{$this->totalStudent}}</div>
    </div>
  </div>
  <!-- END: overview cart -->

  <!-- START: graph login -->
  <div class="card shadow-md px-4 py-4 bg-zinc-50 rounded">
    <div class="card-header text-gray-500 text-sm font-normal">GRAFIK MAHASISWA BARU PERIODE {{$this->periodDate}}</div>
    <div class="card-body mt-3 text-sky-700 font-bold text-3xl">
      <canvas id="barChart"></canvas>
    </div>
  </div>
  <!-- END: graph login -->
  <script>
    var data = <?php echo json_encode($this->invoices) ?>;
    var parsedData = {
      label: [],
      value: []
    };
    for (let d of data) {
      parsedData.label.push(d.date);
      parsedData.value.push(d.value);
    }
    console.log(parsedData);
    var ctx = document.getElementById('barChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: parsedData.label,
        datasets: [{
          label: 'MAHASISWA',
          data: parsedData.value,
          backgroundColor: 'rgba(12, 74, 110, 1)',
          borderColor: 'rgba(12, 74, 110, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
</x-main-content>