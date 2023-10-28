@extends('admin.admin')

@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Customer</h5>
                    </div>
                    <div class="card-body">
                        <div style="border: 1px solid #ddd; padding: 20px; border-radius: 5px;">
                            <p><strong>ID Customer:</strong> {{ $customer->id_customer }}</p>
                            <p><strong>Tipe Customer:</strong> {{ $customer->tipe_customer }}</p>
                            <p><strong>Nama Customer:</strong> {{ $customer->nama }}</p>
                            <p><strong>Alamat Customer:</strong> {{ $customer->alamat }}</p>
                            <p><strong>Nomor Telepon:</strong> {{ $customer->nomor_telepon }}</p>
                            <p><strong>Nomor NPWP:</strong> {{ $customer->nomor_npwp }}</p>
                            
                            <p><strong>Foto KTP:</strong></p>
                            <div style="max-width: 100%; text-align: center;">
                                <img src="{{ asset('ktpCustomer/'.$customer->ktp) }}" alt="Foto KTP" style="max-height: 230px; max-width: 100%; display: inline-block;">
                            </div>

                            <p><strong>Foto NPWP:</strong></p>
                            <div style="max-width: 100%; text-align: center;">
                                <img src="{{ asset('npwpCustomer/'.$customer->npwp) }}" alt="Foto NPWP" style="max-height: 230px; max-width: 100%; display: inline-block;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
