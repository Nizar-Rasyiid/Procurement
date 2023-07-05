@extends('admin.admin')
@section('admin')
    <div class="page-content">
        <form action="{{ url('/admin-table/storeSuplier') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="nama_suplier" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama_suplier" name="nama_suplier" required>
              <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
              <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
              <label for="alamat_suplier" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat_suplier" name="alamat_suplier" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection