@extends('admin.admin')
@section('admin')
@include('sweetalert::alert')
    <div class="page-content pt-5">
      <div class="card mt-5">
        <div class="card-body">
          <h5 class="card-title">Edit Suplier/Vendor</h5>

          <form action="{{ url('/admin-table/updateSuplier/{id}') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column px-5 ">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-text">Nama</span>
                    
                    <input type="text" value="{{ old('nama_suplier', $Suplier->nama_suplier) }}"  class="form-control border border-secondary" id="nama_suplier" name="nama_suplier" {{ old('nama_suplier', $Suplier->nama_suplier) }} >
                  </div>
                </div>
                <div class="form-group mt-3">
                    <div class="input-group">
                      <span class="input-group-text">Nomor Telepon</span>
                    <input type="number" value="{{ old('nomor_telepon_suplier', $Suplier->nomor_telepon_suplier) }}" class="form-control border border-secondary" id="nomor_telepon_suplier" name="nomor_telepon_suplier" >
                    </div>
                </div>
                <div class="form-group mt-3">
                  <div class="input-group">
                    <span class="input-group-text">Alamat</span>
                    <input type="text" value="{{ old('alamat', $Suplier->alamat) }}" class="form-control border border-secondary" id="alamat" name="alamat" >
                  </div>
                </div>
                <div class="form-group mt-3">
                  <div class="input-group">
                      <span class="input-group-text">Nomor NPWP</span>
                      <input type="number"value="{{ old('nomor_npwp', $Suplier->nomor_npwp) }}" class="form-control border border-secondary" id="nomor_npwp" name="nomor_npwp" >
                  </div>
              </div>
              <div class="form-group mt-3">
                  <div class="input-group">
                      <span class="input-group-text">Foto NPWP</span>
                      @if($Suplier->npwp)
                      <img src="{{ asset('npwpSuplier/' . $Suplier->npwp) }}" alt="NPWP" height="250">
                  @else
                      <p>Tidak ada gambar NPWP</p>
                  @endif
                      <input type="file" value="{{ old('npwp', $Suplier->npwp) }}" class="form-control border border-secondary" id="npwp" name="npwp" accept=".pdf, .jpg, .jpeg, .png" >
                  </div>
              </div>
              <div class="form-group mt-3">
                <div class="input-group">
                    <span class="input-group-text">Foto KTP</span>
                    @if($Suplier->ktp)
                    <img src="{{ asset('ktpSuplier/' . $Suplier->ktp) }}" alt="KTP" height="250">
                @else
                    <p>Tidak ada gambar KTP</p>
                @endif
                    <input type="file" value="{{ old('ktp', $Suplier->ktp) }}" class="form-control border border-secondary" id="ktp" name="ktp" accept=".pdf, .jpg, .jpeg, .png" >
                </div>
            </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>
      </div>

    </div>
@endsection
