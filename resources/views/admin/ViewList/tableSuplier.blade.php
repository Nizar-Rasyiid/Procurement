@extends('admin.admin')
@section('admin')
<div class="page-content">

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID Suplier</th>
                <th>Nama PT</th>
                <th>Alamat</th>
                <th>Nomor Telepon PT</th>
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
                <th>ID Suplier</th>
                <th>Nama PT</th>
                <th>Alamat</th>
                <th>Nomor Telepon PT</th>
                <th>Detail</th>
                <th>Download</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection