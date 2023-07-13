@extends('admin.admin')
@section('admin')
<div class="page-content">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">FILTERS</h5>
            <div class="row my-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_transaksi">ID Transaksi</label>
                        <input type="text" class="form-control border border-secondary" id="id_transaksi" placeholder="ID Transaksi">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input type="date" class="form-control border border-secondary" id="date">
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="customer_name">Nama Customer</label>
                        <input type="text" class="form-control border border-secondary" id="customer_name" placeholder="Nama Customer">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="vendor">Suplier/Vendor</label>
                        <input type="text" class="form-control border border-secondary" id="vendor" placeholder="Suplier/Vendor">
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_range">Range Tanggal</label>
                        <div class="input-group">
                            <input type="date" class="form-control border border-secondary" id="start_date">
                            <div class="input-group-append">
                                <span class="input-group-text">to</span>
                            </div>
                            <input type="date" class="form-control border border-secondary" id="end_date">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control border border-secondary" id="status">
                            <option value="">-- Select Status --</option>
                            <option value="Pending">Pending</option>
                            <option value="Paid">Paid</option>
                            <option value="Overdue">Overdue</option>
                        </select>
                    </div>
                </div>
            </div>
        
            <div class="row my-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ar_actual">AR Actual</label>
                        <select class="form-control border border-secondary" id="ar_actual">
                            <option value="">-- Select AR Actual --</option>
                            <option value="AR1">AR1</option>
                            <option value="AR2">AR2</option>
                            <option value="AR3">AR3</option>
                        </select>
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
                <th>ID Pembelian</th>
                <th>Tanggal Penjualan</th>
                <th>Nama Customer</th>
                <th>Suplier/Vendor</th>
                <th>Tanggal Pembelian</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Detail</th>
                <th>Download</th>
            </tr>
            {{-- <a href="{{url('/admin-table/storeCustomer')}}" class="btn btn-success btn-sm text-white">Tambah Admin</a> --}}
        </thead>
        <tbody>
            {{-- @foreach ($customer as $item)
            <tr>
                <td>{{$item->id_customer}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->nomor_telepon}}</td>
            </tr>
            @endforeach --}}
        </tbody>
        <tfoot>
            <tr>
                <th>ID Transaksi</th>
                <th>ID Penjualan</th>
                <th>ID Pembelian</th>
                <th>Tanggal Penjualan</th>
                <th>Nama Customer</th>
                <th>Suplier/Vendor</th>
                <th>Tanggal Pembelian</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Detail</th>
                <th>Download</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection