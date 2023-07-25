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
                        <input type="text" class="form-control border border-secondary" id="id_customer" placeholder="ID Customer">
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control border border-secondary" id="nama" placeholder="Nama">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 my-1">
                    <div class="form-group">
                        <label for="id_transaksi">Nomor Telepon</label>
                        <input type="text" class="form-control border border-secondary" id="id_transaksi" placeholder="Nomor Telepon">
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <label for="nama">Alamat</label>
                    <input type="text" class="form-control border border-secondary" id="nama" placeholder="Alamat">
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
                <th>Detail</th>
                <th>Download</th>
                <th>Tipe Customer</th>
                <th>Nomor NPWP</th>
            </tr>
        </thead>
        <tbody>
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
                </td>
                <td>
                    <button class="btn btn-danger text-white btn-sm">Download</button>
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
                <th>Detail</th>
                <th>Download</th>
                <th>Tipe Customer</th>
                <th>Nomor NPWP</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
