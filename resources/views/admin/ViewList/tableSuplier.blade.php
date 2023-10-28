@extends('admin.admin')
@section('admin')
@include('sweetalert::alert')
<div class="page-content">
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">Filters</h5>
            <div class="row">
                <div class="col-md-6 my-1">
                    <div class="form-group">
                        <label for="id_suplier">ID Suplier/Vendor</label>
                        <div class="input-group">

                        
                        <input type="text" class="form-control border border-secondary" id="id_suplier" placeholder="ID Suplier">
                        <button id="applyFilterIDSuplier" class="btn btn-primary btn-sm">
                            Apply
                        </button>
                    </div>
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <div class="form-group">
                        <label for="nama_suplier">Nama Suplier/Vendor</label>
                        <div class="input-group">

                        <input type="text" class="form-control border border-secondary" id="nama_suplier" placeholder="Nama Suplier/Vendor">
                        <button id="applyFilterNamaSuplier" class="btn btn-primary btn-sm">
                            Apply
                        </button>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 my-1">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <div class="input-group">

                        
                        <input type="text" class="form-control border border-secondary" id="alamat" placeholder="Alamat">
                        <button id="applyFilterAlamat" class="btn btn-primary btn-sm">
                            Apply
                        </button>
                    </div>
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
            </div>
            <div class="row">
                <div class="text-end mt-3">
                    <a href="{{ route('downloadSalesOrder') }}" class="btn btn-danger btn-sm">
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
                <th>ID Suplier/Vendor</th>
                <th>Nama Suplier/Vendor</th>
                <th>Alamat</th>
                <th>Nomor Telepon Suplier/Vendor</th>
                <th>Nomor NPWP</th>
                <th>Detail</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            @foreach ($supliers as $item)
            <tr>
                <td>{{$item->id_suplier}}</td>
                <td>{{$item->nama_suplier}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->nomor_telepon_suplier}}</td>
                <td>{{$item->nomor_npwp}}</td>
<<<<<<< HEAD
                <td>
                    <a href="" class="btn btn-success">Detail</a>
                    <a href="{{ route('EditSup', $item->id)}}" class="btn btn-danger">Edit</a>
                </td>
=======
                <td><a href="{{route('detailSup',$item->id)}}" class="btn btn-success">Detail</a></td>
                <td><a href="{{route('editSup',$item->id)}}" class="btn btn-success">Edit</a></td>
>>>>>>> 2351c56d96f4209a96b53bbc77d831642aa65967
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID Suplier/Vendor</th>
                <th>Nama PT</th>
                <th>Alamat</th>
                <th>Nomor Telepon PT</th>
                <th>Nomor NPWP</th>
                <th>Detail</th>
                <th>Edit</th>
            </tr>
        </tfoot>
    </table>
    <nav aria-label="Page navigation example">
        {{ $supliers->links() }}
    </nav>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const applyFilterIDSuplierButton = document.getElementById("applyFilterIDSuplier");
        const applyFilterNamaSuplierButton = document.getElementById("applyFilterNamaSuplier");
        const applyFilterAlamatButton = document.getElementById("applyFilterAlamat");
        const applyFilterNomorTeleponButton = document.getElementById("applyFilterNomorTelepon");
        const resetFilterButton = document.getElementById("resetFilter");
        const tableBody = document.getElementById("tableBody");
        const filterIDSuplierInput = document.getElementById("id_suplier");
        const filterNamaSuplierInput = document.getElementById("nama_suplier");
        const filterAlamatInput = document.getElementById("alamat");
        const filterNomorTeleponInput = document.getElementById("nomor_telepon");
        
        applyFilterIDSuplierButton.addEventListener("click", function () {
            applyFilter(filterIDSuplierInput, "id_suplier");
        });
        applyFilterNamaSuplierButton.addEventListener("click", function () {
            applyFilter(filterNamaSuplierInput, "nama_suplier");
        });
        applyFilterAlamatButton.addEventListener("click", function () {
            applyFilter(filterAlamatInput, "alamat");
        });
        applyFilterNomorTeleponButton.addEventListener("click", function () {
            applyFilter(filterNomorTeleponInput, "nomor_telepon_suplier");
        });
        resetFilterButton.addEventListener("click", function () {
            resetFilter();
        });

        function applyFilter(filterInput, filterType) {
            const filterValue = filterInput.value.toLowerCase();

            const rows = tableBody.getElementsByTagName("tr");
            for (let row of rows) {
                const cellValue = row.cells[filterType === "id_suplier" ? 0 : 
                                   filterType === "nama_suplier" ? 1 :
                                   filterType === "alamat" ? 2 :
                                   filterType === "nomor_telepon_suplier" ? 3 : 
                                   4].textContent.trim().toLowerCase();
                
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
