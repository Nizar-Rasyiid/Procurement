@extends('admin.admin')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h5>AR Customer</h5>
                    </div>
                    <div class="card-body">
                        <p>ID Payment Penjualan : {{$ar->id_payment_so}} </p>
                        <p>Nama Customer :  {{$ar->nama}} </p>
                        <p>Tanggal Validation Pembelian : {{$ar->tanggal_verifikasi}} </p>
                        <p>Total KG : {{$ar->jumlahKgJual}}  </p>
                        <p>Harga / KG : {{$ar->hargaPerKgJual}} </p>
                        <p>Total Harga : {{$ar->harga_total}} </p>
                        <p>Total Bayar : {{$ar->jumlah_bayar}} </p>
                        <p>Piutang : {{$ar->hutang_customer}} </p>
                        <p>Saldo : {{$ar->saldo_customer}} </p>
                        <p>Keterangan : {{$ar->keterangan}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Verifikasi Penjualan</h5>
                    </div>
                    <div class="card-body">
                        <p>ID Verifikasi:{{ $ar->id_verifikasi }}</p>
                        <p>ID Pembelian:{{ $ar->id_do }}</p>
                        <p>Tanggal Verifikasi:{{ $ar->tanggal_verifikasi }}</p>
                        <p>Gp:{{ $ar->gp }}</p>
                        <p>Mati Susulan:{{ $ar->mati_susulan }}</p>
                        <p>Tonase Akhir:{{ $ar->tonase_akhir }}</p>
                        <p>Ekor:{{ $ar->ekor }}</p> 
                        <p>Susut:{{ $ar->susut }}</p>
                        <p>KG Susut:{{ $ar->kg_susut }}</p>
                        <p>GP + Normal:{{ $ar->gp_normal }}</p>
                        <p>Gp(Rp):{{ $ar->gp_rp }}</p>
                        <p>Normal:{{ $ar->normal }}</p>
                        <p>Keterangan:{{ $ar->keterangan_verifikasi }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Payment Penjualan</h5>
                    </div>
                    <div class="card-body">
                        <p>ID Penjualan : {{$ar->id_payment_so}} </p>
                        <p>ID Customer : {{$ar->id_customer}} </p>
                        <p>Nama Customer : {{$ar->nama}} </p>
                        <p>Alamat : {{$ar->alamat}}  </p>
                        <p>No HP : {{$ar->nomor_telepon}} </p>
                        <p>Tanggal Penjualan : {{$ar->tanggal_penjualan}} </p>
                        <p>Jumlah KG : {{$ar->jumlahKgJual}}  </p>
                        <p>Harga/Kg :  {{$ar->hargaPerKgJual}}</p>
                        <p>Keterangan : {{$ar->keteranganJual}} </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5>Data Penjualan</h5>
                                    <div class="row mt-3">
                                        <p>id Penjualan </p>
                                        </div>
                                        <div class="row mt-2">
                                            <p>Tanggal :</p>
               
                                        </div>
                                        <div class="status mt-2">
                                            <p>Status : </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <p>AR Actual : Rp. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Data Payment Penjualan</h5>
                                        <p class="mt-3">ID Penjualan : </p>
                                        <p>ID Customer : </p>
                                        <p>Nama Customer : </p>
                                        <p>Alamat :  </p>
                                        <p>No HP </p>
                                        <p>Tanggal Penjualan : </p>
                                        <p>Jumlah KG : </p>
                                        <p>Harga/lg : </p>
                                        <p>Keterngan : </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>AR Customer</h5>
                                            <p class="mt-3">ID Penjualan : </p>
                                            <p>ID Customer : </p>
                                            <p>Nama Customer : </p>
                                            <p>Alamat :  </p>
                                            <p>No HP </p>
                                            <p>Tanggal Penjualan : </p>
                                            <p>Jumlah KG : </p>
                                            <p>Harga/lg : </p>
                                            <p>Keterngan : </p>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div> -->

    </div>
</div>
@endsection
