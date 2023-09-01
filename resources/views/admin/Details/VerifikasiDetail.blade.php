@extends('admin.admin')

@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Verifikasi</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>ID Verifikasi:</strong> {{ $verifikasi->id_verifikasi }}</p>
                        <p><strong>ID Pembelian:</strong> {{ $verifikasi->id_do }}</p>
                        <p><strong>Tanggal Verifikasi:</strong> {{ $verifikasi->tanggal_verifikasi }}</p>
                        <p><strong>Gp:</strong> {{ $verifikasi->gp }}</p>
                        <p><strong>Mati Susulan:</strong> {{ $verifikasi->mati_susulan }}</p>
                        <p><strong>Tonase Akhir:</strong> {{ $verifikasi->tonase_akhir }}</p>
                        <p><strong>Ekor:</strong> {{ $verifikasi->ekor }}</p>
                        <p><strong>Susut:</strong> {{ $verifikasi->susut }}</p>
                        <p><strong>KG Susut:</strong> {{ $verifikasi->kg_susut }}</p>
                        <p><strong>GP + Normal:</strong> {{ $verifikasi->gp_normal }}</p>
                        <p><strong>Gp(Rp):</strong> {{ $verifikasi->gp_rp }}</p>
                        <p><strong>Normal:</strong> {{ $verifikasi->normal }}</p>
                        <p><strong>Keterangan:</strong> {{ $verifikasi->keterangan }}</p>
                    </div>  
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
