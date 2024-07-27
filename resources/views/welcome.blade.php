<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  @vite('resources/css/app.css')
</head>
<body class="container min-w-full">
  <div class="flex">
    <div class="sidebar flex-initial w-1/4">
      <div class="brand py-2 px-5 text-left"><a href="" class="font-semibold text-2xl text-sky-900">SISTEM PPDB</a></div>
      <div class="nav mt-5">
        <a href="/dashboard" class="group">
          <div class="text group-hover:bg-sky-900 group-hover:text-neutral-50 px-5 py-3 rounded">Dashboard</div>
        </a>
        <a href="/dashboard" class="group">
          <div class="text group-hover:bg-sky-900 group-hover:text-neutral-50 px-5 py-3 rounded">Fakultas</div>
        </a>
        <a href="/dashboard" class="group">
          <div class="text group-hover:bg-sky-900 group-hover:text-neutral-50 px-5 py-3 rounded">Mahasiswa</div>
        </a>
        <a href="/dashboard" class="group">
          <div class="text group-hover:bg-sky-900 group-hover:text-neutral-50 px-5 py-3 rounded">Pembayaran</div>
        </a>
      </div>
    </div>
    <div class="flex-initial w-full">
      <div class="top-navbar">
        <div class="flex justify-end">
          <div class="relative inline-block">
            <button type="button" class="text-left group hover:bg-sky-900 py-2 px-5 rounded" id="setting-button" aria-expanded="true" aria-haspopup="true">
              <div class="text-gray-400 group-hover:text-neutral-50">Selamat datang,</div>
              <div class="text-gray-700 group-hover:text-neutral-50 font-bold block">RAGA MULIA KUSUMA</div>
            </button>
            <div class="setting-item hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="setting-button" tabindex="-1">
              <div class="py-1" role="none">
                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                <a href="#" class="block hover:bg-gray-100 px-4 py-2 text-gray-700" role="menuitem" tabindex="-1" id="menu-item-0">Profil saya</a>
                <a href="#" class="block hover:bg-gray-100 px-4 py-2 text-gray-700" role="menuitem" tabindex="-1" id="menu-item-1">Pengaturan & privasi</a>
                <form method="POST" action="#" role="none">
                  <button type="submit" class="block hover:bg-gray-100 w-full px-4 py-2 text-left text-red-600 font-medium" role="menuitem" tabindex="-1" id="menu-item-3">Keluar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="content-wrapper mt-2 bg-slate-100 min-h-[calc(100vh_-_5rem)] px-10 py-10">
        <div class="page-title">
          <div class="text-xl font-medium text-sky-900">Dashboard</dov>
          <div class="text-sm font-normal text-neutral-400 mt-1">Menampilkan grafik user yang login</div>
        </div>
        <div class="page-content my-5">
          <!-- START: overview card -->
          <div class="grid grid-cols-3 gap-4 mb-5">
            <div class="card shadow-md px-4 py-4 bg-zinc-50 rounded">
              <div class="card-header text-gray-500 text-sm font-normal">FAKULTAS</div>
              <div class="card-body mt-3 text-sky-700 font-bold text-3xl">10</div>
            </div>
            <div class="card shadow-md px-4 py-4 bg-zinc-50 rounded">
              <div class="card-header text-gray-500 text-sm font-normal">USER TERDAFTAR</div>
              <div class="card-body mt-3 text-sky-700 font-bold text-3xl">10</div>
            </div>
            <div class="card shadow-md px-4 py-4 bg-zinc-50 rounded">
              <div class="card-header text-gray-500 text-sm font-normal">USER LOGIN</div>
              <div class="card-body mt-3 text-sky-700 font-bold text-3xl">10</div>
            </div>
          </div>
          <!-- END: overview cart -->

          <!-- START: graph login -->
          <div class="card shadow-md px-4 py-4 bg-zinc-50 rounded">
            <div class="card-header text-gray-500 text-sm font-normal">GRAFIK USER LOGIN PERIODE 1 - 31 JANUARI 2024</div>
            <div class="card-body mt-3 text-sky-700 font-bold text-3xl">
              <canvas id="barChart"></canvas>
            </div>
          </div>
          <!-- END: graph login -->
        </div>
      </div>
    </div>
  </div>

@vite('resources/js/app.js')
<script>
  var ctx = document.getElementById('barChart').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: ['2024-01-01', '2024-01-02', '2024-01-03', '2024-01-04', '2024-01-05'],
          datasets: [{
              label: 'PENGGUNA',
              data: [65, 59, 80, 81, 56],
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
</body>
</html>