@extends('admin.admin')
@section('admin')
<div class="page-content">
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Status</th>
                <th>Terima</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)
            <tr>
                <td>{{$item->name}}</td>
                    <td>
                        @if ($item->accepted == 0)
                            Belum Diterima
                        @else
                            Sudah Diterima
                        @endif
                    </td>
                <td>
                    <form action="{{ route('users.accept', $item->id) }}" method="POST">
                        @csrf
                        <button class="btn  btn-success" type="submit">Terima</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Nama</th>
                <th>Status</th>
                <th>Terima</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
