@extends('admin.admin')
@section('admin')
<div class="page-content">
    <div class="card">
        <div class="card-body filters">
            <h5 class="card-title">Filters</h5>
            <div class="row">
                <div class="col-md-6 my-1">
                    <div class="form-group">
                        <label for="id_so">ID Penjualan</label>
                        <div class="input-group">
                            <input type="text" class="form-control border border-secondary" id="id_so" placeholder="ID Penjualan">
                            <button id="applyFilterIdSo" class="btn btn-primary btn-sm">Apply</button>   
                        </div>
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <label for="status">Status</label>
                    <div class="input-group">
                        <select class="form-control border border-secondary" id="status">
                            <option value="">-- Pilih Status --</option>
                            <option value="lunas">Lunas</option>
                            <option value="belum lunas">Belum Lunas</option>
                        </select>
                        <button id="applyFilterStatus" class="btn btn-primary btn-sm">Apply</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 my-1">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <div class="input-group">
                            <input type="date" class="form-control border border-secondary" id="tanggal" placeholder="Tanggal">
                            <button id="applyFilterTanggal" class="btn btn-primary btn-sm">Apply</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_range">Range Tanggal</label>
                        <div class="input-group">
                            <input type="date" class="form-control border border-secondary" id="start_date">
                            <div class="input-group-append">
                                <span class="input-group-text">to</span>
                            </div>
                            <input type="date" class="form-control border border-secondary" id="end_date">
                            <button id="applyFilterRangeTanggal" class="btn btn-primary btn-sm">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3">
                    <a href="{{ route('downloadSalesOrder') }}" class="btn btn-danger btn-sm">
                        <i class="fas fa-file-csv"></i> Download CSV
                    </a>    
                    <button id="resetFilter" class="btn btn-secondary btn-sm">
                        Reset Filter
                    </button>
                </div>
                <div class="col text-end mt-3">
                    <button type="button" id="apply-filter" class="btn btn-danger btn-sm">Filter</button>
                </div>
            </div>
        </div>
    </div>
    <table id="filtered-data" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID Penjualan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Tipe Pemesanan</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($so as $item)
            <tr>
                <td>{{$item->id_so}}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('m-d-Y') }}</td>
                <td>
                    @if ($item->status == 0)
                        Belum Lunas
                    @else
                        Lunas
                    @endif  
                </td>
                <td>{{$item->order_type}}</td>
                <td>
                    <a href="{{ route('detailSo', $item->id) }}" class="btn btn-success text-white btn-sm">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot> 
            <tr>
                <th>ID Penjualan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Tipe Pemesanan</th>
                <th>Detail</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const applyFilterIdSoButton = document.getElementById("applyFilterIdSo");
        const applyFilterStatusButton = document.getElementById("applyFilterStatus");
        const applyFilterTanggalButton = document.getElementById("applyFilterTanggal");
        const applyFilterRangeTanggalButton = document.getElementById("applyFilterRangeTanggal");

        const resetFilterButton = document.getElementById("resetFilter");

        const filterIdSoInput = document.getElementById("id_so");
        const filterStatusInput = document.getElementById("status");
        const filterTanggalInput = document.getElementById("tanggal");

        applyFilterIdSoButton.addEventListener("click", function () {
            applyFilter(filterIdSoInput, "id_so");
        });

        applyFilterStatusButton.addEventListener("click", function () {
            applyFilterStatus();
        });

        applyFilterTanggalButton.addEventListener("click", function () {
            applyFilterTanggal();
        });

        applyFilterRangeTanggalButton.addEventListener("click", function () {
            applyRangeFilter(filterTanggalInput, "tanggal");
        });

        resetFilterButton.addEventListener("click", function () {
            resetFilter();
        });

        function applyFilterStatus() {
            const filterStatusSelect = document.getElementById("status");
            const selectedValue = filterStatusSelect.value.toLowerCase();

            const rows = document.querySelectorAll("#example tbody tr");
            for (let row of rows) {
                const cellValue = row.cells[2].textContent.trim().toLowerCase();

                if (selectedValue === "" || selectedValue === "semua" || cellValue === selectedValue) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }

        function applyFilter(filterInput, filterType) {
            const filterValue = filterInput.value.toLowerCase();

            const rows = document.querySelectorAll("#example tbody tr");
            for (let row of rows) {
                const cellValue = row.cells[filterType === "id_so" ? 0 :
                                    filterType === "status" ? 2 :
                                    filterType === "tanggal" ? 1 :
                                    3
                                ].textContent.trim().toLowerCase();

                if (filterMatches(cellValue, filterValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }

        function applyFilterTanggal() {
            const filterValue = filterTanggalInput.value;

            const rows = document.querySelectorAll("#example tbody tr");
            for (let row of rows) {
                const cellValueText = row.cells[1].textContent.trim();
                const cellValueDate = new Date(cellValueText);

                if (filterMatchesDate(cellValueDate, filterValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }

        function applyRangeFilter(filterInput, filterType) {
            const startValue = new Date(document.getElementById("start_date").value);
            const endValue = new Date(document.getElementById("end_date").value);

            endValue.setHours(23, 59, 59, 999);

            const rows = document.querySelectorAll("#example tbody tr");
            for (let row of rows) {
                const cellValue = new Date(row.cells[filterType === "id_so" ? 0 :
                                    filterType === "status" ? 2 :
                                    filterType === "tanggal" ? 1 :
                                    3
                                ].textContent.trim());

                if (filterInRange(cellValue, startValue, endValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }

        function resetFilter() {
            const rows = document.querySelectorAll("#example tbody tr");
            for (let row of rows) {
                row.style.display = "";
            }
        }

        function filterMatches(cellValue, filterValue) {
            return cellValue.includes(filterValue);
        }

        function filterMatchesDate(cellValue, filterValue) {
            const cellDate = new Date(cellValue);
            const filterDate = new Date(filterValue);

            return cellDate.toDateString() === filterDate.toDateString();
        }

        function filterInRange(cellValue, startValue, endValue) {
            const cellDate = new Date(cellValue);
            const startDate = new Date(startValue);
            const endDate = new Date(endValue);

            startDate.setHours(0, 0, 0, 0);
            endDate.setHours(0, 0, 0, 0);

            return cellDate >= startDate && cellDate <= endDate;
        }
    });
</script>
@endsection
