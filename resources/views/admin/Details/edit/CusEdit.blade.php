@extends('admin.admin')
@section('admin')
<div class="page-content pt-5">
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Input Customer</h5>
            <form action="{{ url('/admin-table/edit-cus') }}" method="POST" class="d-flex flex-column px-5 mt-1">
                <input hidden type="text" id="id" name="id" value="{{$customer->id}}">
                @csrf
                <div class="mb-3">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text">Nama</span>
                            <input type="text" class="form-control border border-secondary" id="nama" name="nama" value="{{$customer->nama}}" required>
                        </div>
                    </div>
                
                    <div class="form-group mt-3">
                        <div class="input-group">
                            <span class="input-group-text">Nomor Telepon</span>
                            <input type="number" class="form-control border border-secondary" id="nomor_telepon" name="nomor_telepon" value="{{$customer->nomor_telepon}}" required>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <div class="input-group">
                            <span class="input-group-text">Alamat</span>
                            <input type="text" class="form-control border border-secondary" id="alamat" name="alamat" value="{{$customer->alamat}}" required>
                        </div>
                    </div>
                    <input type="number" class="form-control border border-secondary" id="limit_plafon" name="limit_plafon" value="" hidden>
                                <!-- <div class="row">
                                    <div class="form-check form-check-inline col">
                                        <input type="checkbox" class="form-check-input" id="kredit" name="tipe_customer[]" value="{{$customer->tipe_customer}}" hidden>
                                        <label class="form-check-label" for="kredit">Kredit</label>
                                    </div>
                                    <div class="form-check form-check-inline col">
                                        <input type="checkbox" class="form-check-input" id="revisi" name="tipe_customer[]" value="{{$customer->tipe_customer}}" hidden>
                                        <label class="form-check-label" for="revisi">Revisi</label>
                                    </div>
                                </div> -->
                                <input type="text" id="tipe_customer" name="tipe_customer" value="{{$customer->tipe_customer}}" hidden>
                    <div class="form-group mt-3">
                        <div class="input-group">
                            <span class="input-group-text">Nomor NPWP</span>
                            <input type="number" class="form-control border border-secondary" id="nomor_npwp" name="nomor_npwp" value="{{$customer->nomor_npwp}}" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="input-group">
                            <span class="input-group-text">Foto NPWP</span>
                            <input type="file" class="form-control border border-secondary" id="npwp" name="npwp" accept=".pdf, .jpg, .jpeg, .png">
                        </div>
                        <div class="col col-ktp">
                            <p><strong>Foto KTP:</strong></p>
                            <div style="max-width: 100%; text-align: center;">
                                <img src="{{ asset('ktpCustomers/'.$customer->ktp) }}" alt="Foto KTP" style="max-height: 230px; max-width: 100%; display: inline-block;">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="input-group">
                            <span class="input-group-text">Foto KTP</span>
                            <input type="file" class="form-control border border-secondary" id="ktp" name="ktp" accept=".pdf, .jpg, .jpeg, .png">
                        </div>
                        <div class="col col-npwp">
                            <p><strong>Foto NPWP:</strong></p>
                            <div style="max-width: 100%; text-align: center;">
                                <img src="{{ asset('npwpCustomers/'.$customer->npwp) }}" alt="Foto NPWP" style="max-height: 230px; max-width: 100%; display: inline-block;">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
