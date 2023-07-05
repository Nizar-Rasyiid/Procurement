@extends('admin.admin')
@section('admin')
<div class="page-content">

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>

                {{-- <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th> --}}
            </tr>
            <a href="{{url('/admin-table/storeAdmin')}}" class="btn btn-success btn-sm text-white">Tambah Admin</a>
        </thead>
        <tbody>
            @foreach ($admins as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nama}}</td>

            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nama</th>
            </tr>
        </tfoot>
    </table>

</div>
@endsection