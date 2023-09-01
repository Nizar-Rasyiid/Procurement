@extends('admin.admin')
@section('admin')
<div class="page-content">
    <div class="card">
        <div class="card-body ">
        <h5 class="card-title">Filters</h5>
            <div class="row">
                <div class="col-md-6 my-1">
                    <div class="form-group">
                        <label for="id_verifikasi">ID Verifikasi</label>
                        <div class="input-group">
                        <input type="text" class="form-control border border-secondary" id="id_verifikasi" placeholder="ID Verifikasi">
                        <button class="btn btn-primary btn-sm" id="applyFilterIdVerifikasi">Apply</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <label for="id_do">ID Pembelian</label>
                    <div class="input-group">
                    <input type="text" class="form-control border border-secondary" id="id_do" placeholder="ID Pembelian">
                    <button class="btn btn-primary btn-sm" id="applyFilterIdDo">Apply</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 my-1">
                    <div class="form-group">
                        <label for="tanggal_verifikasi">Tanggal Verifikasi </label>
                        <div class="input-group">
                        <input type="date" class="form-control border border-secondary" id="tanggal_verifikasi">
                        <button id="applyFilterTanggalVerifikasi" class="btn btn-primary btn-sm">Apply</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_range">Range Tanggal Verifikasi</label>
                        <div class="input-group">
                            <input type="date" class="form-control border border-secondary" id="start_date_verifikasi">
                            <div class="input-group-append">
                                <span class="input-group-text">to</span>
                            </div>
                            <input type="date" class="form-control border border-secondary" id="end_date_verifikasi">
                            <button class="btn btn-primary btn-sm" id="applyFilterRangeTanggalVerifikasi">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="text-end mt-3">
                    <a href="{{ route('verifikasiDownload') }}" class="btn btn-danger btn-sm">
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
                <th>ID Verifikasi</th>
                <th>ID Pembelian</th>
                <th>Tanggal Verifikasi</th>
                <th>Gp</th>                
                <th>Mati Susulan</th>
                <th>Tonase Akhir</th>
                <th>Ekor</th>
                <th>Susut</th>
                <th>KG Susut</th>
                <th>GP + Normal</th>
                <th>Gp Rp</th>
                <th>Normal</th>
                <th>Keterangan</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($verifikasi as $item)
            <tr>
                <td>{{$item->id_verifikasi}}</td>
                <td>{{$item->id_do}}</td>
                <td>{{\Carbon\Carbon::parse($item->tanggal_verifikasi)->format('m-d-Y')}}</td>
                <td>{{$item->gp}}</td>
                <td>{{$item->mati_susulan}}</td>
                <td>{{$item->tonase_akhir}}</td>
                <td>{{$item->ekor}}</td>
                <td>{{$item->susut}}</td>
                <td>{{$item->kg_susut}}</td>
                <td>{{$item->gp_normal}}</td>
                <td>{{$item->gp_rp}}</td>
                <td>{{$item->normal}}</td>
                <td>{{$item->keterangan}}</td>
                <td>
                    <a href="{{ route('showVerifikasi', $item->id) }}" class="btn btn-success text-white btn-sm">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID Verifikasi</th>
                <th>ID Pembelian</th>
                <th>Tanggal Verifikasi</th>
                <th>Gp</th>                
                <th>Mati Susulan</th>
                <th>Tonase Akhir</th>
                <th>Ekor</th>
                <th>Susut</th>
                <th>KG Susut</th>
                <th>GP + Normal</th>
                <th>Gp Rp</th>
                <th>Normal</th>
                <th>Keterangan</th>
                <th>Detail</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
        document.addEventListener("DOMContentLoaded", function () {
        // Ids
        const applyFilterIdVerifikasiButton = document.getElementById("applyFilterIdVerifikasi");
        const applyFilterIdDoButton = document.getElementById("applyFilterIdDo");

        // Tanggal
        const applyFilterTanggalVerifikasiButton = document.getElementById("applyFilterTanggalVerifikasi");
        const applyFilterTanggalPenjualanButton = document.getElementById("applyFilterTanggalPenjualan");
        const applyFilterRangeTanggalVerifikasiButton = document.getElementById("applyFilterRangeTanggalVerifikasi");
        const applyFilterRangeTanggalPenjualanButton = document.getElementById("applyFilterRangeTanggalPenjualan");

        // Reset
        const resetFilterButton = document.getElementById("resetFilter");

        const tableBody = document.querySelector("#example tbody");
        // IDS
        const filterIdVerifikasiiInput = document.getElementById("id_verifikasi");
        const filterIdDoInput = document.getElementById("id_do");
        // Tanggal
        const filterTanggalVerifikasiInput = document.getElementById("tanggal_verifikasi");
        //Applies
        applyFilterIdVerifikasiButton.addEventListener("click", function () {
            applyFilter(filterIdVerifikasiiInput, "id_verifikasi");
        });
        applyFilterIdDoButton.addEventListener("click", function () {
            applyFilter(filterIdDoInput, "id_do");
        });
        // Tanggal
        applyFilterTanggalVerifikasiButton.addEventListener("click", function () {
            applyFilterTanggalVerifikasi();

        });
        applyFilterRangeTanggalVerifikasiButton.addEventListener("click", function () {
            applyRangeFilterVerifikasi(filterTanggalVerifikasiInput, "tanggal_verifikasi");
        });
        //reset
        resetFilterButton.addEventListener("click", function () {
            resetFilter();
        });


        function applyFilter(filterInput, filterType) {
            const filterValue = filterInput.value.toLowerCase();

            const rows = document.querySelectorAll("#example tbody tr");
            for (let row of rows) {
                const cellValue = row.cells[filterType === "id_verifikasi" ? 0 :
                                    filterType === "id_do" ? 1 :
                                    filterType === "tanggal_verifikasi" ? 2 :
                                    3
                                ].textContent.trim().toLowerCase();

                if (filterMatches(cellValue, filterValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }

        function applyFilterTanggalVerifikasi() {
            const filterValue = filterTanggalVerifikasiInput.value;

            const rows = document.querySelectorAll("#example tbody tr");
            for (let row of rows) {
                const cellValueText = row.cells[2].textContent.trim();
                const cellValueDate = new Date(cellValueText);

                if (filterMatchesDate(cellValueDate, filterValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }
        
        function applyRangeFilterVerifikasi(filterInput, filterType) {
            const startValue = new Date(document.getElementById("start_date_verifikasi").value);
            const endValue = new Date(document.getElementById("end_date_verifikasi").value);

            endValue.setHours(23, 59, 59, 999);

            const rows = document.querySelectorAll("#example tbody tr");
            for (let row of rows) {
                const cellValue = new Date(row.cells[filterType === "id_verifikasi" ? 0 :
                                    filterType === "id_do" ? 1 :
                                    filterType === "tanggal_verifikasi" ? 2 :
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

            startDate.setHours(0, 0, 0, 0);
            endDate.setHours(0, 0, 0, 0);

            return cellDate >= startDate && cellDate <= endDate;
        }
    });
</script>
@endsection
