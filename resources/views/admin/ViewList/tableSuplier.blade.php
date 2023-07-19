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
                        <input type="text" class="form-control border border-secondary" id="id_suplier" placeholder="ID Suplier">
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <div class="form-group">
                        <label for="nama_suplier">Nama Suplier/Vendor</label>
                        <input type="text" class="form-control border border-secondary" id="nama_suplier" placeholder="Nama Suplier/Vendor">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 my-1">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control border border-secondary" id="alamat" placeholder="Alamat">
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <div class="form-group">
                        <label for="Nomor Telepon">Nomor Telepon</label>
                        <input type="text" class="form-control border border-secondary" id="Nomor Telepon" placeholder="Nomor Telepon">
                    </div>
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
                <th>Detail</th>
                <th>Download</th>
            </tr>
            {{-- <a href="{{url('/admin-table/storeCustomer')}}" class="btn btn-success btn-sm text-white">Tambah Admin</a> --}}
        </thead>
        <tbody>
            @foreach ($supliers as $item)
            <tr>
                <td>{{$item->id_suplier}}</td>
                <td>{{$item->nama_suplier}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->nomor_telepon_suplier}}</td>
                <td><button class="btn btn-success">Detail</button></td>
                <td><button class="btn btn-danger">Download</button></td>

            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID Suplier/Vendor</th>
                <th>Nama PT</th>
                <th>Alamat</th>
                <th>Nomor Telepon PT</th>
                <th>Detail</th>
                <th>Download</th>
            </tr>
        </tfoot>
    </table>

    {{-- <nav aria-label="Page navigation example">
        {{ $supliers->links() }}
    </nav> --}}
    <nav aria-label="Page navigation example">
        {{ $supliers->links() }}
    </nav>

</div>
@endsection