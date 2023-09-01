@extends('admin.admin')

@section('admin')
<div class="page-content">
    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                        <h6 class="card-title mb-0">Data Margin</h6>
                        <div class="dropdown">
                            <a type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-start">
                        <div class="col-md-7">
                            <p class="text-muted tx-13 mb-3 mb-md-0">Margin Data is HERE.</p>
                        </div>
                        <div class="col-md-5 d-flex justify-content-md-end">
                            <div class="btn-group mb-3 mb-md-0" role="group" aria-label="Basic example">
                                {{-- <button type="button" class="btn btn-outline-primary">Today</button> --}}
                                <button type="button" class="btn btn-primary d-none d-md-block">Week</button>
                                {{-- <button type="button" class="btn btn-outline-primary">Month</button>
                                <button type="button" class="btn btn-outline-primary">Year</button> --}}
                            </div>
                        </div>
                    </div>
                    <div id="">
                      <canvas id="marginChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title mb-3">Margin Data for Current Week</h6>
                    {{-- @foreach ($tota as $mar) --}}
                    <p class="mb-1">Margin for This Week: RP.{{ $totalMargin }}</p>
                    {{-- @endforeach --}}
                @php
                use Carbon\Carbon;
                $sevenDaysAgo = Carbon::now()->subDays(7);
                $totalHutang7Days = 0;
                $totalPiutang7Days = 0;
            @endphp
            
            @foreach ($Ap as $item)
                @if ($item->created_at >= $sevenDaysAgo)
                    {{-- <p>Ap: {{$item->hutang}}</p> --}}
                    @php
                        $totalHutang7Days += $item->hutang;
                    @endphp
                @endif
            @endforeach
            @foreach ($Ar as $ar)
            @if ($ar->created_at >= $sevenDaysAgo)
                {{-- <p>Ap: {{$ar->hutang}}</p> --}}
                @php
                    $totalPiutang7Days += $ar->hutang_customer;
                @endphp
            @endif
        @endforeach
            
            <p>Total Ap 7 Hari Terakhir: {{$totalHutang7Days}}</p>
            <p>Total Ar 7 Hari Terakhir: {{$totalPiutang7Days}}</p>
            @foreach ($totalDo as $do)
            <p class="mb-1">Total Do Hari ini: RP.{{ $do->total_harga }}</p>
        @endforeach
            
                </div>
            </div>
        </div>

        
    </div> <!-- row -->
</div>
<script>
  // Data margin minggu ini (contoh)
  var marginData = {!! json_encode($filteredMarginData) !!};

  // Ekstrak nilai margin harian dari data
  var labels = [];
  var marginValues = [];
  for (var i = 0; i < marginData.length; i++) {
      labels.push('Transaksi ' + (i + 1));
      marginValues.push(marginData[i]['Margin Harian']);
  }

  // Fungsi untuk mengubah format angka menjadi ribuan, jutaan, miliaran, dst.
  function formatNumber(value) {
      var suffixes = ["", "rb", "jt", "M", "B"];
      var suffixNum = 0;
      while (value >= 1000 && suffixNum < suffixes.length - 1) {
          value /= 1000;
          suffixNum++;
      }
      return value.toFixed(2) + " " + suffixes[suffixNum];
  }

  // Buat chart menggunakan Chart.js dengan tipe Line Chart
  var ctx = document.getElementById('marginChart').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'line', // Ganti tipe chart menjadi Line Chart
      data: {
          labels: labels,
          datasets: [{
              label: 'Margin Mingguan',
              data: marginValues,
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 2,
              fill: true // Mengisi area di bawah garis
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: false,
                  ticks: {
                      callback: function(value, index, values) {
                          return formatNumber(value);
                      }
                  }
              }
          }
      }
  });
</script>


@endsection
