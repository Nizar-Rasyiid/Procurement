@extends('admin.admin')
@section('admin')
    <div class="page-content">
        <form action="{{ url('/admin-table/storeCustomer') }}" method="POST" class="d-flex flex-column p-5  mt-5">
            @csrf
            <div class="mb-3">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text">Nama</span>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <div class="input-group">
                        <span class="input-group-text">Nomor Telepon</span>
                        <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <div class="input-group">
                        <span class="input-group-text">Alamat</span>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
@endsection
