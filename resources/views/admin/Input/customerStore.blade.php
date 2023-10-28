@extends('admin.admin')
@section('admin')
<div class="page-content pt-5">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Input Customer</h5>
<<<<<<< HEAD
            <form action="{{ url('/admin-table/storeCustomer') }}" enctype = "multipart/form-data" method="POST" class="d-flex flex-column px-5 mt-1">
=======
            <form action="{{ url('/admin-table/storeCustomer') }}" enctype="multipart/form-data" method="POST" class="d-flex flex-column px-5 mt-1">
>>>>>>> 2351c56d96f4209a96b53bbc77d831642aa65967
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
                
                    <div class="form-group mt-3">
                        <div class="input-group">
                            <span class="input-group-text">Limit Plafon</span>
                            <input type="number" class="form-control border border-secondary" id="limit_plafon" name="limit_plafon" required>
                        </div>
                    </div>
                
                    <div class="form-group mt-3">
                        <div class="input-group">
                            <span class="input-group-text">Tipe Customer</span>
                            <div class="card p-2 w-75 border border-secondary d-flex align-items-center">
                                <div class="row">
                                    <div class="form-check form-check-inline col">
                                        <input type="checkbox" class="form-check-input" id="kredit" name="tipe_customer[]" value="Kredit">
                                        <label class="form-check-label" for="kredit">Kredit</label>
                                    </div>
                                    <div class="form-check form-check-inline col">
                                        <input type="checkbox" class="form-check-input" id="revisi" name="tipe_customer[]" value="Revisi">
                                        <label class="form-check-label" for="revisi">Revisi</label>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="input-group">
                            <span class="input-group-text">Nomor NPWP</span>
                            <input type="number" class="form-control border border-secondary" id="nomor_npwp" name="nomor_npwp" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="input-group">
                            <span class="input-group-text">Foto NPWP</span>
<<<<<<< HEAD
                            <input type="file" class="form-control border border-secondary" id="npwp" name="npwp" accept=".pdf, .jpg, .jpeg, .png">
=======
                            <input type="file" class="form-control border border-secondary" id="npwp" name="npwp" accept=".pdf, .jpg, .jpeg, .png" >
>>>>>>> 2351c56d96f4209a96b53bbc77d831642aa65967
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="input-group">
                            <span class="input-group-text">Foto KTP</span>
<<<<<<< HEAD
                            <input type="file" class="form-control border border-secondary" id="ktp" name="ktp" accept=".pdf, .jpg, .jpeg, .png">
=======
                            <input type="file" class="form-control border border-secondary" id="ktp" name="ktp" accept=".pdf, .jpg, .jpeg, .png" >
>>>>>>> 2351c56d96f4209a96b53bbc77d831642aa65967
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
