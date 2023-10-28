@extends('admin.admin')
@section('admin')
<div class="page-content pt-5">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Edit Supplier</h5>
            <form action="{{ url('/admin-table/edit-sup') }}" method="POST" class="d-flex flex-column px-5 mt-1">
                <input type="text" hidden name="id" value="{{$Suplier->id}}">
                @csrf
                <div class="mb-3">  
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text">Nama</span>
                            <input type="text" class="form-control border border-secondary" id="nama_suplier" name="nama_suplier" value="{{$Suplier->nama_suplier}}">
                        </div>
                    </div>
                
                    <div class="form-group mt-3">
                        <div class="input-group">
                            <span class="input-group-text">Nomor Telepon</span>
                            <input type="number" class="form-control border border-secondary" id="nomor_telepon_suplier" name="nomor_telepon_suplier" value="{{$Suplier->nomor_telepon_suplier}}">
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <div class="input-group">
                            <span class="input-group-text">Alamat</span>
                            <input type="text" class="form-control border border-secondary" id="alamat" name="alamat" value="{{$Suplier->alamat}}">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="input-group">
                            <span class="input-group-text">Nomor NPWP</span>
                            <input type="number" class="form-control border border-secondary" id="nomor_npwp" name="nomor_npwp" value="{{$Suplier->nomor_npwp}}">
                        </div>  
                    </div>
                        <div class="form-group mt-3">
                            <div class="input-group">
                            <span class="input-group-text">Foto NPWP</span>
                                <input type="file" class="form-control border border-secondary" id="npwp" name="npwp" accept=".pdf, .jpg, .jpeg, .png">
                            </div>
                            <div class="col col-ktp">
                                <p><strong>Foto KTP Supplier:</strong></p>
                                <div style="max-width: 100%; text-align: center;">
                                    <img src="{{ asset('ktpSuplier/'.$Suplier->ktp) }}" alt="Foto KTP" style="max-height: 230px; max-width: 100%; display: inline-block;">
                                </div>
                            </div>
                        </div>
                    <div class="form-group mt-3">
                        <div class="input-group">
                            <span class="input-group-text">Foto KTP</span>
                            <input type="file" class="form-control border border-secondary" id="ktp" name="ktp" accept=".pdf, .jpg, .jpeg, .png">
                        </div>
                        <div class="col col-npwp">
                            <p><strong>Foto NPWP Supplier:</strong></p>
                            <div style="max-width: 100%; text-align: center;">
                                <img src="{{ asset('npwpSuplier/'.$Suplier->npwp) }}" alt="Foto NPWP" style="max-height: 230px; max-width: 100%; display: inline-block;">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
    <div class="row mt-2">
        
    </div>
</div>
@endsection
