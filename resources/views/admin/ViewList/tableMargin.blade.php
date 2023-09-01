@extends('admin.admin')
@section('admin')
<div class="page-content">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">FILTERS</h5>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="id_transaksi">ID Transaksi</label>
                        <div class="input-group">
                        <input type="text" class="form-control border border-secondary" id="id_transaksi" placeholder="ID Transaksi">
                        <button class="btn btn-primary btn-sm" id="applyFilterIdTransaksi">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_pembelian">Tanggal Pembelian </label>
                        <div class="input-group">
                        <input type="date" class="form-control border border-secondary" id="tanggal_pembelian">
                        <button id="applyFilterTanggalPembelian" class="btn btn-primary btn-sm">Apply</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_range">Range Tanggal Pembelian</label>
                        <div class="input-group">
                            <input type="date" class="form-control border border-secondary" id="start_date_pembelian">
                            <div class="input-group-append">
                                <span class="input-group-text">to</span>
                            </div>
                            <input type="date" class="form-control border border-secondary" id="end_date_pembelian">
                            <button class="btn btn-primary btn-sm" id="applyFilterRangeTanggalPembelian">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="customer_name">Nama Customer</label>
                        <div class="input-group">
                        <input type="text" class="form-control border border-secondary" id="customer_name" placeholder="Nama Customer">
                        <button class="btn btn-primary btn-sm" id="applyFilterNamaCustomer">Apply</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="vendor">Suplier/Vendor</label>
                        <div class="input-group">
                        <input type="text" class="form-control border border-secondary" id="vendor" placeholder="Suplier/Vendor">
                        <button class="btn btn-primary btn-sm" id="applyFilterNamaSuplier">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_penjualan">Tanggal Penjualan </label>
                        <div class="input-group">
                        <input type="date" class="form-control border border-secondary" id="tanggal_penjualan">
                        <button class="btn btn-primary btn-sm" id="applyFilterTanggalPenjualan">Apply</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_range">Range Tanggal Penjualan</label>
                        <div class="input-group">
                            <input type="date" class="form-control border border-secondary" id="start_date_penjualan">
                            <div class="input-group-append">
                                <span class="input-group-text">to</span>
                            </div>
                            <input type="date" class="form-control border border-secondary" id="end_date_penjualan">
                            <button class="btn btn-primary btn-sm" id="applyFilterRangeTanggalPenjualan">Apply</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="text-end mt-3">
                        <a href="{{ route('marginDownload') }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-file-csv"></i> Download CSV
                        </a>      
                        <button id="resetFilter" class="btn btn-secondary btn-sm">
                            Reset Filter
                        </button>
                    </div>
                </div>
        
            </div>
        </div>
    </div>

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>ID Penjualan</th>
                <th>Nama Customer</th>
                <th>ID Pembelian</th>
                <th>Nama Supplier</th>
                <th>Tanggal Penjualan</th>
                <th>Tanggal Pembelian</th>
                <th>Harga Penjualan</th>
                <th>Harga Pembelian</th>
                <th>Margin Harian</th>
                <th>Keterangan</th>
                <th>Detail</th>
            </tr>
            {{-- <a href="{{url('/admin-table/storeCustomer')}}" class="btn btn-success btn-sm text-white">Tambah Admin</a> --}}
        </thead>
        <tbody>
            @foreach ($margin as $index => $item)
            <?php
            $harga_total_beli = $item->total_kg * $item->hargaPerKgBeli;
            $gp_total = $item->gp * $item->gp_rp;
            $margin_kg = $item->hargaPerKgJual - $item->hargaPerKgBeli;
            $normal = $item->hargaPerKgJual * $item->tonase_akhir;
            $penjualan_akhir = $gp_total + $normal;
            $margin_harian = $penjualan_akhir - $harga_total_beli;
            $total_operational = $item->uang_jalan + $item->uang_tangkap + $item->solar + $item->etoll;
            $laba = $margin_harian - $total_operational;
            ?>
                    <tr id="result">
                        <td>TRANS-{{ str_pad($index + 1, 6, '0', STR_PAD_LEFT) }}</td>
                        <td>{{$item->id_so}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->id_do}}</td>
                        <td>{{$item->nama_suplier}}</td>
                        <td>{{\Carbon\Carbon::parse($item->tanggal_penjualan)->format('m-d-Y')}}</td>
                        <td>{{\Carbon\Carbon::parse($item->tanggal_pembelian)->format('m-d-Y')}}</td>
                        <td>{{$item->hargaPerKgJual}}</td>
                        <td>{{$item->hargaPerKgBeli}}</td>
                        <td>{{($margin_harian)}}</td>
                        <td>{{$item->keterangan}}</td>
                        <td>
                        <a href="{{ route('margin', $item->id) }}" class="btn btn-success text-white btn-sm">Detail</a>
                        </td>
                    </tr>
            @endforeach

        </tbody>
        <tfoot>
            <tr>
            <th>ID Transaksi</th>
                <th>ID Penjualan</th>
                <th>Nama Customer</th>
                <th>ID Pembelian</th>
                <th>Nama Supplier</th>
                <th>Tanggal Penjualan</th>
                <th>Tanggal Pembelian</th>
                <th>Harga Penjualan</th>
                <th>Harga Pembelian</th>
                <th>Margin Harian</th>
                <th>Keterangan</th>
                <th>Detail</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    const id = '1';
    fetch(`/get-data/${id}`)
        .then(response => response.json())
        .then(data=> {
            const resultElement = document.getElementById('result');
            resultElement.innerHTML = '';

            data.foreach(item=>{
                const resultItem = document.createElement('tr');
                resultItem.textContent = `ID: ${item.id_so}, Name: ${item.nama}, Status: ${item.id_do}`;
                resultElement.appendChild(resultItem);
            });
        });


        document.addEventListener("DOMContentLoaded", function () {
        // Id transaksi
        const applyFilterIdTransaksiButton = document.getElementById("applyFilterIdTransaksi");

        // Nama
        const applyFilterNamaCustomerButton = document.getElementById("applyFilterNamaCustomer");
        const applyFilterNamaSuplierButton = document.getElementById("applyFilterNamaSuplier");
        // Tanggal
        const applyFilterTanggalPembelianButton = document.getElementById("applyFilterTanggalPembelian");
        const applyFilterTanggalPenjualanButton = document.getElementById("applyFilterTanggalPenjualan");
        const applyFilterRangeTanggalPembelianButton = document.getElementById("applyFilterRangeTanggalPembelian");
        const applyFilterRangeTanggalPenjualanButton = document.getElementById("applyFilterRangeTanggalPenjualan");

        // Reset
        const resetFilterButton = document.getElementById("resetFilter");

        const tableBody = document.querySelector("#example tbody");

        const filterIdTransaksiInput = document.getElementById("id_transaksi");
        // Nama
        const filterNamaCustomerInput = document.getElementById("customer_name");
        const filterNamaSuplierInput = document.getElementById("vendor");
        const filterStatusInput = document.getElementById("status");
        // Tanggal
        const filterTanggalPembelianInput = document.getElementById("tanggal_pembelian");
        const filterTanggalPenjualanInput = document.getElementById("tanggal_penjualan");

        applyFilterIdTransaksiButton.addEventListener("click", function () {
            applyFilter(filterIdTransaksiInput, "id_transaksi");
        });
        // Nama
        applyFilterNamaCustomerButton.addEventListener("click", function () {
            applyFilter(filterNamaCustomerInput, "customer_name");
        });
        applyFilterNamaSuplierButton.addEventListener("click", function () {
            applyFilter(filterNamaSuplierInput, "vendor");
        });

 
        // Tanggal
        applyFilterTanggalPembelianButton.addEventListener("click", function () {
            applyFilterTanggalPembelian();

        });
        applyFilterTanggalPenjualanButton.addEventListener("click", function () {
            applyFilterTanggalPenjualan();
        });

        applyFilterRangeTanggalPembelianButton.addEventListener("click", function () {
            applyRangeFilterPembelian(filterTanggalPembelianInput, "tanggal_pembelian");
        });
        applyFilterRangeTanggalPenjualanButton.addEventListener("click", function () {
            applyRangeFilterPenjualan(filterTanggalPenjualanInput, "tanggal_penjualan");
        });

        resetFilterButton.addEventListener("click", function () {
            resetFilter();
        });


        function applyFilter(filterInput, filterType) {
            const filterValue = filterInput.value.toLowerCase();

            const rows = document.querySelectorAll("#example tbody tr");
            for (let row of rows) {
                const cellValue = row.cells[filterType === "id_transaksi" ? 0 :
                                    filterType === "customer_name" ? 2 :
                                    filterType === "vendor" ? 4 :
                                    filterType === "tanggal_penjualan" ? 5 :
                                    filterType === "tanggal_pembelian" ? 6 :
                                    3
                                ].textContent.trim().toLowerCase();

                if (filterMatches(cellValue, filterValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }

        function applyFilterTanggalPembelian() {
            const filterValue = filterTanggalPembelianInput.value;

            const rows = document.querySelectorAll("#example tbody tr");
            for (let row of rows) {
                const cellValueText = row.cells[6].textContent.trim();
                const cellValueDate = new Date(cellValueText);

                if (filterMatchesDate(cellValueDate, filterValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }
        
        function applyFilterTanggalPenjualan() {
            const filterValue = filterTanggalPenjualanInput.value;

            const rows = document.querySelectorAll("#example tbody tr");
            for (let row of rows) {
                const cellValueText = row.cells[5].textContent.trim();
                const cellValueDate = new Date(cellValueText);

                if (filterMatchesDate(cellValueDate, filterValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }
        function applyRangeFilterPembelian(filterInput, filterType) {
            const startValue = new Date(document.getElementById("start_date_pembelian").value);
            const endValue = new Date(document.getElementById("end_date_pembelian").value);

            endValue.setHours(23, 59, 59, 999);

            const rows = document.querySelectorAll("#example tbody tr");
            for (let row of rows) {
                const cellValue = new Date(row.cells[filterType === "id_transaksi" ? 0 :
                                    filterType === "customer_name" ? 2 :
                                    filterType === "vendor" ? 4 :
                                    filterType === "tanggal_penjualan" ? 5 :
                                    filterType === "tanggal_pembelian" ? 6 :
                                    3
                                ].textContent.trim());

                if (filterInRange(cellValue, startValue, endValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }
        function applyRangeFilterPenjualan(filterInput, filterType) {
            const startValue = new Date(document.getElementById("start_date_penjualan").value);
            const endValue = new Date(document.getElementById("end_date_penjualan").value);

            endValue.setHours(23, 59, 59, 999);

            const rows = document.querySelectorAll("#example tbody tr");
            for (let row of rows) {
                const cellValue = new Date(row.cells[filterType === "id_transaksi" ? 0 :
                                    filterType === "customer_name" ? 2 :
                                    filterType === "vendor" ? 4 :
                                    filterType === "tanggal_penjualan" ? 5 :
                                    filterType === "tanggal_pembelian" ? 6 :
                                    3
                                ].textContent.trim());

                if (filterInRange(cellValue, startValue, endValue)) {
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