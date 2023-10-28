@extends('admin.admin')

@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Supplier</h5>
                    </div>
                    <div class="card-body">
                        <div style="border: 1px solid #ddd; padding: 20px; border-radius: 5px;">
                            <p><strong>ID Supplier:</strong> {{ $Suplier->id_suplier }}</p>
                            <p><strong>Nama Supplier:</strong> {{ $Suplier->nama_suplier }}</p>
                            <p><strong>Alamat Supplier:</strong> {{ $Suplier->alamat }}</p>
                            <p><strong>Nomor Telepon Supplier:</strong> {{ $Suplier->nomor_telepon_suplier }}</p>
                            <p><strong>Nomor NPWP Supplier:</strong> {{ $Suplier->nomor_npwp }}</p>
                            
                            <p><strong>Foto KTP Supplier:</strong></p>
                            <div style="max-width: 100%; text-align: center;">
                                <img src="{{ asset('ktpSuplier/'.$Suplier->ktp) }}" alt="Foto KTP" style="max-height: 230px; max-width: 100%; display: inline-block;">
                            </div>

                            <p><strong>Foto NPWP Supplier:</strong></p>
                            <div style="max-width: 100%; text-align: center;">
                                <img src="{{ asset('npwpSuplier/'.$Suplier->npwp) }}" alt="Foto NPWP" style="max-height: 230px; max-width: 100%; display: inline-block;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
