@extends('admin.admin')
@section('admin')
    <div class="page-content pt-5">
      <div class="card mt-5">
        <div class="card-body">
          <h5 class="card-title ">Input Customer</h5>
          <form action="{{ url('/admin-table/storeCustomer') }}" method="POST" class="d-flex flex-column px-5  mt-1">
            @csrf
            <div class="mb-3">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text">Nama</span>
                        <input type="text" class="form-control border border-secondary" id="nama" name="nama" required>
                    </div>
                </div>
                
                <div class="form-group mt-3">
                    <div class="input-group">
                        <span class="input-group-text">Nomor Telepon</span>
                        <input type="number" class="form-control border border-secondary" id="nomor_telepon" name="nomor_telepon" required>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <div class="input-group">
                        <span class="input-group-text">Alamat</span>
                        <input type="text" class="form-control border border-secondary" id="alamat" name="alamat" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
        </div>
      </div>

    </div>
@endsection
