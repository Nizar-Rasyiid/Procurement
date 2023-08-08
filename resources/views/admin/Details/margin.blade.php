@extends('admin.admin')
@section('admin')
<?php
$harga_total_beli = $margin->total_kg * $margin->hargaPerKgBeli;
$gp_total = $margin->gp * $margin->gp_rp;
$margin_kg = $margin->hargaPerKgBeli - $margin->hargaPerKgJual;
$penjualan_akhir = $margin->gp + $margin->normal;
$normal = $margin->hargaPerKgJual * $margin->tonase_akhir;
$margin_harian = $penjualan_akhir - $harga_total_beli;
$total_operational = $margin->uang_jalan + $margin->uang_tangkap + $margin->solar + $margin->etoll;
$laba = $margin_harian - $total_operational;
?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5>Margin</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <p>Harga</p>
                                    </div>
                                    <div class="card-body">
                                        <p>Harga beli : Rp. {{$margin->hargaPerKgBeli}}</p>
                                        <p>Gp (Rp) : Rp. {{$margin->gp_rp}}</p>
                                        <p>Harga jual : Rp. {{$margin->hargaPerKgJual}}</p>
                                        <p>Margin/Kg : Rp. {{$margin_kg}}</p>
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <p>Jumlah</p>
                                    </div>
                                    <div class="card-body">
                                        <p>Harga Total Pembelian : Rp. {{$harga_total_beli}}</p>
                                        <p>Gp Total : Rp. {{$gp_total}}</p>
                                        <p>Normal : Rp. {{$normal}}</p>
                                        <p>Penjualan Akhir : Rp. {{$penjualan_akhir}}</p>
                                        <p>Margin Harian : Rp. {{$margin_harian}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col mt-5">
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <p>Operasional</p>
                                    </div>
                                    <div class="card-body">
                                        <p>Uang Jalan : Rp.{{$margin->uang_jalan}}</p>
                                        <p>Uang Tangkap : Rp. {{$margin->uang_tangkap}}</p>
                                        <p>Solar : Rp. {{$margin->solar}}</p>
                                        <p>E-Toll : Rp. {{$margin->etoll}}</p>
                                        <p>Total Operasional : Rp. {{$total_operational}}</p>
                                    </div>
                                </div>
                                <div class="input-group mt-4">
                                    <span for="etoll" class="input-group-text">LABA</span>
                                    <input type="number" class="form-control border border-secondary" id="etoll" name="etoll" placeholder="Rp" value={{$laba}} readonly>                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Penjualan</h5>
                    </div>
                    <div class="card-body">
                        <p>ID Penjualan : {{$margin->id_so}}</p>
                        <p>ID Customer : {{$margin->id_customer}}</p>
                        <p>Nama Customer : {{$margin->nama}}</p>
                        <p>Nomor Hp : {{$margin->nomor_telepon}}</p>
                        <p>Alamat : {{$margin->alamat}}</p>
                        <p>Tipe Pemesanan : {{$margin->order_type}}</p>
                        <p>Tanggal : {{$margin->tanggal_penjualan}}</p>
                        <p>Jumlah (Kg) : {{$margin->jumlahKgJual}}</p>
                        <p>Harga/Kg : {{$margin->hargaPerKgJual}}</p>
                        <p>Keterangan : </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Pembelian</h5>
                    </div>
                    <div class="card-body">
                        <p>ID Pembelian : {{$margin->id_do}}</p>
                        <p>ID Supplier : {{$margin->id_suplier}}</p>
                        <p>Nomor Hp : {{$margin->nomor_telepon}}</p>
                        <p>Kandang : {{$margin->kandang}}</p>
                        <p>Nomor Kendaraan : {{$margin->nomor_kendaraan}}</p>
                        <p>Nama Supir : {{$margin->nama_supir}}</p>
                        <p>Nomor Sim : {{$margin->nomor_sim}}</p>
                        <p>Total Ekor : {{$margin->total_ekor}}</p>
                        <p>Total Kg :  {{$margin->total_kg}}</p>
                        <p>Harga/Kg : {{$margin->hargaPerKg}}</p>
                        <p>Keterangan : </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Payment Penjualan</h5>
                    </div>
                    <div class="card-body">
                        <p>ID Customer :</p>
                        <p>Nama Custom</p>
                        <p>Alamat :  </p>
                        <p>No HP </p>
                        <p>Order Type :</p>
                        <p>Tanggal Penjualan </p>
                        <p>Jumlah KG :</p>
                        <p>Jumlah Bayar : </p>
                        <p>Keterangan : </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Payment Pembelian</h5>
                    </div>
                    <div class="card-body">
                        <p>ID Penjualan : </p>
                        <p>ID Customer : </p>
                        <p>Nama Customer : </p>
                        <p>Alamat :  </p>
                        <p>No HP </p>
                        <p>Tanggal Penjualan : </p>
                        <p>Jumlah KG : </p>
                        <p>Harga/lg : </p>
                        <p>Keterangan : </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Margin</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p>ID margin : </p>
                                <p>ID Penjualan : </p>
                                <p>Tanggal : </p>
                                <p>Customer :  </p>
                                <p>ID Pembelian </p>
                                <p>Tanggal : </p>
                                <p>Suplier/Vendor : </p>
                                <p>Harga Beli per Kg : </p>
                                <p>Total Harga Beli  : </p>
                                <p>Harga Jual per Kg  : </p>
                                <p>Total Harga Jual : </p>
                                <p>Gp : {{$margin->gp}}</p>
                                <p>Harga Validation Pembelian : </p>
                                <p>Harga Penjualan Akhir : </p>
                                <p>Margin Harian : </p>
                            </div>
                            <div class="col-6">
                                <span>Data Kg</span>
                                <p>Bobot Beli(Kg) : {{$margin->total_kg_tiba}}</p>
                                <p>Gp : </p>
                                <p>Bobot Validation Pembelian : </p>
                                <p>Mati Susulan : {{$margin->mati_susulan}}</p>
                                <p>Tonase Akhir : {{$margin->tonase_akhir}}</p>

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
@endsection
