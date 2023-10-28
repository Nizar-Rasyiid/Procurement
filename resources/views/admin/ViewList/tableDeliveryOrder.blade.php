@extends('admin.admin')
@section('admin')
<div class="page-content">
    <div class="card">
        <div class="card-body ">
            <h5 class="card-title">Filters</h5>
            <div class="row">
                <div class="col-md-6 my-1">
                    <div class="form-group">
                        <label for="id_do">ID Pembelian</label>
                        <div class="input-group">
                            <input type="text" class="form-control border border-secondary" id="id_do" placeholder="ID Pembelian">
                            <button id="applyFilterIdDo" class="btn btn-primary btn-sm">Apply</button>   
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
                <div class="text-end mt-3">
                    <a href="{{ route('downloadDeliveryOrder') }}" class="btn btn-danger btn-sm">
                        <i class="fas fa-file-csv"></i> Download CSV
                    </a>    
                    <button id="resetFilter" class="btn btn-secondary btn-sm">
                        Reset Filter
                    </button>
                </div>
            </div>
        </div>
    </div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID Pembelian</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @foreach ($do as $item)
            <tr>
                <td>{{$item->id_do}}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_pembelian)->format('m-d-Y') }}</td>
                <td>
                    @if ($item->status == 0)
                        Belum Lunas
                    @else
                      Lunas
                    @endif  
                </td>
                <td>
                    <a href="{{ route('detailDo', $item->id) }}" class="btn btn-success text-white btn-sm">Detail</a>
                </td>
            </tr>   
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID Pembelian</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const applyFilterIdDoButton = document.getElementById("applyFilterIdDo");
        const applyFilterStatusButton = document.getElementById("applyFilterStatus");
        const applyFilterTanggalButton = document.getElementById("applyFilterTanggal");
        const applyFilterRangeTanggalButton = document.getElementById("applyFilterRangeTanggal");
        const resetFilterButton = document.getElementById("resetFilter");
        const tableBody = document.getElementById("tableBody");
        const filterIdDoInput = document.getElementById("id_do");
        const filterStatusInput = document.getElementById("status");
        const filterTanggalInput = document.getElementById("tanggal");

        applyFilterIdDoButton.addEventListener("click", function () {
            applyFilter(filterIdDoInput, "id_do");
        });

        applyFilterStatusButton.addEventListener("click", function () {
            applyFilterStatus(filterStatusInput);
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

    const rows = tableBody.getElementsByTagName("tr");
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

            const rows = tableBody.getElementsByTagName("tr");
            for (let row of rows) {
                const cellValue = row.cells[filterType === "id_do" ? 0 :
                                    filterType === "status" ? 2 : // Adjust the index to match the "Status" column
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

            const rows = tableBody.getElementsByTagName("tr");
            for (let row of rows) {
                const cellValueText = row.cells[1].textContent.trim(); // Adjust the index to match the "Tanggal" column
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

            // Set the endValue to the end of the day
            endValue.setHours(23, 59, 59, 999);

            const rows = tableBody.getElementsByTagName("tr");
            for (let row of rows) {
                const cellValue = new Date(row.cells[filterType === "id_do" ? 0 :
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
            const rows = tableBody.getElementsByTagName("tr");
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

            // Set time to 00:00:00 for both start and end dates
            startDate.setHours(0, 0, 0, 0);
            endDate.setHours(0, 0, 0, 0);

            return cellDate >= startDate && cellDate <= endDate;
        }
    });
</script>
@endsection
