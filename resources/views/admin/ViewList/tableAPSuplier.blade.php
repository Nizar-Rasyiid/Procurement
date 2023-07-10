@extends('admin.admin')
@section('admin')
<div class="page-content">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="customer_name">Suplier/Vendor</label>
                <input type="text" class="form-control" id="customer_name" placeholder="Nama Customer">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="date">Tanggal</label>
                <input type="date" class="form-control" id="date">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="date_range">Range Tanggal</label>
                <div class="input-group">
                    <input type="date" class="form-control" id="start_date">
                    <div class="input-group-append">
                        <span class="input-group-text">to</span>
                    </div>
                    <input type="date" class="form-control" id="end_date">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="status">Status AP</label>
                <select class="form-control" id="status">
                    <option value="">-- Select Status --</option>
                    <option value="Pending">Pending</option>
                    <option value="Paid">Paid</option>
                    <option value="Overdue">Overdue</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="ar_actual">AP Actual</label>
                <select class="form-control" id="ar_actual">
                    <option value="">-- Select AP Actual --</option>
                    <option value="AR1">AP1</option>
                    <option value="AR2">AP2</option>
                    <option value="AR3">AP3</option>
                </select>
            </div>
        </div>
    </div>


    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>ID AP Suplier</th>
                <th>ID Suplier</th>
                <th>Tanggal</th>
                <th>Suplier/Vendor</th>
                <th>Total Kg</th>
                <th>Total Harga</th>
                <th>Jumlah Bayar</th>
                <th>Sisa Hutang</th>
                <th>Durasi Hutang</th>
                <th>AP Actual</th>
                <th>Keterangan</th>
                <th>Detail</th>
            </tr>
            {{-- <a href="{{url('/admin-table/storeCustomer')}}" class="btn btn-success btn-sm text-white">Tambah Admin</a> --}}
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <th>ID Transaksi</th>
                <th>ID AP Suplier</th>
                <th>ID Suplier</th>
                <th>Tanggal</th>
                <th>Suplier/Vendor</th>
                <th>Total Kg</th>
                <th>Total Harga</th>
                <th>Jumlah Bayar</th>
                <th>Sisa Hutang</th>
                <th>Durasi Hutang</th>
                <th>AP Actual</th>
                <th>Keterangan</th>
                <th>Detail</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection