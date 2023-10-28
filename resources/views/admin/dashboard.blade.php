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
                    @auth
                    <div class="  rounded shadow mt-5">
                        {{$chartData->container()}}
                    </div>
                    @endauth
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-xl-3 grid-margin stretch-card">
                <div class="card btn">
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title mb-3 text-primary">Margin Data for Current Week</h6>
                        @auth
                        @if ($totalMargin > 0)
                        <p class="mb-1">Margin for This Week:</p>
                        <p class="text-success">RP.{{ $totalMargin }}</p>
                        @else
                        <p class="mb-1">Margin for This Week:</p>
                        <p class="text-danger">RP.{{ $totalMargin }}</p>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        
            <div class="col-12 col-sm-6 col-xl-3 grid-margin stretch-card">
                <div class="card btn">
                    <div class="card-body">
                        <h6 class="card-title mb-3 text-primary">AP Data for Current Week</h6>
                        @php
                        use Carbon\Carbon;
                        $sevenDaysAgo = Carbon::now()->subDays(7);
                        $totalHutang7Days = 0;
                        $totalPiutang7Days = 0;
                        @endphp
                        @auth
                        @foreach ($Ap as $item)
                            @if ($item->created_at >= $sevenDaysAgo)
                                {{-- <p>Ap: {{$item->hutang}}</p> --}}
                                @php
                                $totalHutang7Days += $item->hutang;
                                @endphp
                            @endif
                        @endforeach
                        @endauth
                        <p class="mb-1">Total Ap 7 Hari Terakhir: {{$totalHutang7Days}}</p>
                    </div>
                </div>
            </div>
        
            <div class="col-12 col-sm-6 col-xl-3 grid-margin stretch-card">
                <div class="card btn">
                    <div class="card-body">
                        <h6 class="card-title mb-3 text-primary">AR Data for Current Week</h6>
                        @auth
                        @foreach ($Ar as $ar)
                            @if ($ar->created_at >= $sevenDaysAgo)
                                {{-- <p>Ap: {{$ar->hutang}}</p> --}}
                                @php
                                $totalPiutang7Days += $ar->hutang_customer;
                                @endphp
                            @endif
                        @endforeach
                        @endauth
                        <p class="mb-1">Total Ar 7 Hari Terakhir: {{$totalPiutang7Days}}</p>
                        @auth
                        @endauth
                    </div>
                </div>
            </div>
        
            <div class="col-12 col-sm-6 col-xl-3 grid-margin stretch-card">
                <div class="card btn">
                    <div class="card-body">
                        <h6 class="card-title mb-3 text-primary">DO Data for Today</h6>
                        @auth
                        @foreach ($totalDo as $do)
                            @if ($do->total_harga > 0)
                                <p class="mb-1">Total DO Hari Ini:</p>
                                <p class="text-success">RP.{{ $do->total_harga }}</p>
                            @else
                                <p class="mb-1">Total DO Hari Ini:</p>
                                <p class="text-danger">RP.{{ $do->total_harga }}</p>
                            @endif
                        @endforeach
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        


        
    </div> <!-- row -->
</div>
@auth
<script src="{{ $chartData->cdn() }}"></script>

{{ $chartData->script() }}
<script>
    var marginData = @json($filteredMarginData);

console.log("Margin 7 Hari Terakhir:");

for (var key in marginData) {
    if (marginData.hasOwnProperty(key)) {
        var marginHarian = marginData[key]['Margin Harian'];
        console.log("Margin Harian:", marginHarian);
    }
}

var dates = [];
var margins = [];

for (var i = 0; i < 7; i++) {
    dates.push(new Date(Date.now() - (i * 24 * 60 * 60 * 1000)));
    margins.push(marginData[i]['Margin Harian']);
}

var ctx = document.getElementById('marginChart').getElementsByTagName('canvas')[0].getContext('2d');

var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: dates,
        datasets: [{
            label: 'Margin Harian',
            data: margins,
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            fill: false,
        }]
    },
    options: {
        scales: {
            x: {
                type: 'time',
                time: {
                    unit: 'day',
                },
            },
            y: {
                beginAtZero: true,
            },
        },
    },
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
@endauth


@endsection
