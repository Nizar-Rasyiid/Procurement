@extends('admin.admin')
@section('admin')
    <div class="page-content">
        <form action="{{ url('/admin-table/storeCustomer') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" required>
              <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
              <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection