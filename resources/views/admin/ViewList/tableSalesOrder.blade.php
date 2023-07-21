@extends('admin.admin')
@section('admin')
<div class="page-content">
    <div class="card">
        <div class="card-body ">
            <h5 class="card-title">Filters</h5>
            <div class="row">
                <div class="col-md-6 my-1">
                    <div class="form-group">
                        <label for="id_do">ID Penjualan</label>
                        <input type="text" class="form-control border border-secondary" id="id_do" placeholder="ID Penjualan">
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <label for="Status">Status</label>
                    <input type="text" class="form-control border border-secondary" id="Status" placeholder="Status">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 my-1">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="text" class="form-control border border-secondary" id="tanggal" placeholder="Nomor Telepon">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID Penjualan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Detail</th>
                <th>Download</th>
            </tr>
            {{-- <a href="{{url('/admin-table/storeCustomer')}}" class="btn btn-success btn-sm text-white">Tambah Admin</a> --}}
        </thead>
        <tbody>
            @foreach ($so as $item)
            <tr>
                <td>{{$item->id_so}}</td>
                <td>{{$item->tanggal}}</td>
                <td>
                    @if ($item->status == 0)
                        Belum Lunas
                      @else
                      Lunas
                    @endif
                    
                
                </td>
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
                <th>ID Penjualan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Detail</th>
                <th>Download</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection