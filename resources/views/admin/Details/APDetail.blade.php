@extends('admin.admin')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h5>AP Supplier</h5>
                    </div>
                    <div class="card-body">
                        <p>ID Pembayaran : {{$ap->id_payment_order}} </p>
                        <p>Nama Supplier : {{$ap->nama_suplier}} </p>
                        <p>Tanggal Validation Pembelian :  {{$ap->tanggal_verifikasi}} </p>
                        <p>Total KG :   {{$ap->totalKgBeli}}</p>
                        <p>Harga / KG :  {{$ap->hargaPerKgBeli}} </p>
                        <p>Total Harga :  {{$ap->harga_total}} </p>
                        <p>Total Bayar :  {{$ap->total_bayar}} </p>
                        <p>Hutang :  {{$ap->hutang}} </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Verifikasi Pembelian</h5>
                    </div>
                    <div class="card-body">
                        <p>ID Verifikasi:{{ $ap->id_verifikasi }}</p>
                        <p>ID Pembelian:{{ $ap->id_do }}</p>
                        <p>Tanggal Verifikasi:{{ $ap->tanggal_verifikasi }}</p>
                        <p>Gp:{{ $ap->gp }}</p>
                        <p>Mati Susulan:{{ $ap->mati_susulan }}</p>
                        <p>Tonase Akhir:{{ $ap->tonase_akhir }}</p>
                        <p>Ekor:{{ $ap->ekor }}</p> 
                        <p>Susut:{{ $ap->susut }}</p>
                        <p>KG Susut:{{ $ap->kg_susut }}</p>
                        <p>GP + Normal:{{ $ap->gp_normal }}</p>
                        <p>Gp(Rp):{{ $ap->gp_rp }}</p>
                        <p>Normal:{{ $ap->normal }}</p>
                        <p>Keterangan:{{ $ap->keterangan_verifikasi }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Payment Pembelian</h5>
                    </div>
                    <div class="card-body">
                        <p>ID Pembelian :  {{$ap->id_do}} </p>
                        <p>ID Supplier : {{$ap->id_suplier}}  </p>
                        <p>Nama Supplier : {{$ap->nama_suplier}} </p>
                        <p>Alamat : {{$ap->alamat}}   </p>
                        <p>No HP : {{$ap->nomor_telepon_suplier}}  </p>
                        <p>Tanggal Pembelian : {{$ap->tanggal_pembelian}}   </p>
                        <p>Keterangan : {{$ap->keteranganBeli}}  </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
