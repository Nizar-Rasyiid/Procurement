@extends('admin.admin')
@section('admin')
<div class="page-content">
    <div class="card">
        <div class="card-body ">
        <h5 class="card-title">Filters</h5>
        <div class="row">
            <div class="col-md-6 my-1">
                <div class="form-group">
                    <label for="id_customer">ID Customer</label>
                    <div class="input-group">
                        <input type="text" class="form-control border border-secondary" id="id_customer" placeholder="ID Customer">
                        <button id="applyFilterIDCustomer" class="btn btn-primary btn-sm">
                            Apply
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-1">
                <label for="nama">Nama</label>
                <div class="input-group">
                    <input type="text" class="form-control border border-secondary" id="nama" placeholder="Nama">
                    <button id="applyFilterNama" class="btn btn-primary btn-sm">
                        Apply
                    </button>
                </div>
            </div>
            <div class="col-md-6 my-1">
                <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon</label>
                    <div class="input-group">
                        <input type="text" class="form-control border border-secondary" id="nomor_telepon" placeholder="Nomor Telepon">
                        <button id="applyFilterNomorTelepon" class="btn btn-primary btn-sm">
                            Apply
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-1">
                <label for="alamat">Alamat</label>
                <div class="input-group">
                    <input type="text" class="form-control border border-secondary" id="alamat" placeholder="Alamat">
                    <button id="applyFilterAlamat" class="btn btn-primary btn-sm">
                        Apply
                    </button>
                </div>
            </div>
            <div class="col-md-12 text-end mt-3">
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
                <th>ID Customer</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>                
                <th>Tipe Customer</th>
                <th>Nomor NPWP</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @foreach ($customer as $item)
            <tr>
                <td>{{$item->id_customer}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->nomor_telepon}}</td>
                <td>{{$item->tipe_customer}}</td>
                <td>{{$item->nomor_npwp}}</td>
                <td>
                    <button class="btn btn-success text-white btn-sm">Detail</button>
                    <a href="{{route('EditCus', $item->id)}}" class="btn btn-danger btn-sm">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID Customer</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>                
                <th>Tipe Customer</th>
                <th>Nomor NPWP</th>
                <th>Detail</th>
            </tr>
        </tfoot>
    </table>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const resetFilterButton = document.getElementById("resetFilter");
        const tableBody = document.getElementById("tableBody");
        const filterIDCustomerInput = document.getElementById("id_customer");
        const filterNamaInput = document.getElementById("nama");
        const filterNomorTeleponInput = document.getElementById("nomor_telepon");
        const filterAlamatInput = document.getElementById("alamat");
        const applyFilterIDCustomerButton = document.getElementById("applyFilterIDCustomer");
        const applyFilterNamaButton = document.getElementById("applyFilterNama");
        const applyFilterNomorTeleponButton = document.getElementById("applyFilterNomorTelepon");
        const applyFilterAlamatButton = document.getElementById("applyFilterAlamat");
        
        applyFilterIDCustomerButton.addEventListener("click", function () {
            applyFilter(filterIDCustomerInput, "id_customer");
        });
        applyFilterNamaButton.addEventListener("click", function () {
            applyFilter(filterNamaInput, "nama");
        });
        applyFilterAlamatButton.addEventListener("click", function () {
            applyFilter(filterAlamatInput, "alamat");
        });
        applyFilterNomorTeleponButton.addEventListener("click", function () {
            applyFilter(filterNomorTeleponInput, "nomor_telepon");
        });
        
        resetFilterButton.addEventListener("click", function () {
            resetFilter();
        });

        function applyFilter(filterInput, filterType) {
            const filterValue = filterInput.value.toLowerCase();

            const rows = tableBody.getElementsByTagName("tr");
            for (let row of rows) {
                const cellValue = row.cells[
                    filterType === "nama" ? 1 :
                    (filterType === "alamat" ? 2 :
                    (filterType === "id_customer" ? 0 :
                    3))
                ].textContent.trim().toLowerCase();
                
                if (filterMatches(cellValue, filterValue)) {
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
    });
</script>
@endsection
