@extends('admin.admin')
@section('admin')
<div class="page-content">

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID Customer</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
            {{-- <a href="{{url('/admin-table/storeCustomer')}}" class="btn btn-success btn-sm text-white">Tambah Admin</a> --}}
        </thead>
        <tbody>
             @foreach ($ar as $item)
            <tr>
                <td>{{$item->id_customer}}</td>
                <td>{{$item->tanggal}}</td>
                <td>{{$item->status}}</td>
            </tr>
            @endforeach 
        </tbody>
        <tfoot>
            <tr>
                <th>ID Customer</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection