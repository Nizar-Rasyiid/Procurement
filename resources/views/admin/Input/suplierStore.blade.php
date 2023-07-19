@extends('admin.admin')
@section('admin')
@include('sweetalert::alert')
    <div class="page-content pt-5">
      <div class="card mt-5">
        <div class="card-body">
          <h5 class="card-title">Input Suplier/Vendor</h5>
          <form action="{{ url('/admin-table/storeSuplier') }}" method="POST" class="d-flex flex-column px-5 ">
            @csrf
            <div class="mb-3">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-text">Nama</span>
                    <input type="text" class="form-control border border-secondary" id="nama_suplier" name="nama_suplier" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                    <div class="input-group">
                      <span class="input-group-text">Nomor Telepon</span>
                    <input type="number" class="form-control border border-secondary" id="nomor_telepon_suplier" name="nomor_telepon_suplier" required>
                    </div>
                </div>
                <div class="form-group mt-3">
                  <div class="input-group">
                    <span class="input-group-text">Alamat</span>
                    <input type="text" class="form-control border border-secondary" id="alamat" name="alamat" required>
                  </div>
                </div>
                
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
      </div>

    </div>
@endsection
