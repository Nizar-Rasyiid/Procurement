@extends('admin.admin')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Penjualan</h5>
                    </div>
                    <div class="card-body">
                        <p>ID AP : </p>
                        <p>Nama Customer : </p>
                        <p>Tanggal Validation Pembelian :  </p>
                        <p>Total KG :  </p>
                        <p>Harga / KG : </p>
                        <p>Total Harga : </p>
                        <p>Total Bayar : </p>
                        <p>Sisa : </p>
                        <p>Keterangan : </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Validation Pembelian</h5>
                    </div>
                    <div class="card-body">
                        <p>Tanggal Validasi :</p>
                        <p>Total KG Tiba : </p>
                        <p>GP :</p>
                        <p>Ekor :</p>
                        <p>KG :</p>
                        <p>Susut % :</p>
                        <p>Mati Susulan :</p>
                        <p>Total Final KG : </p>
                        <p>Tonase Akhir : </p>
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
                                <p>ID Transaksi : </p>
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
                                <p>Gp : </p>
                                <p>Harga Validation Pembelian : </p>
                                <p>Harga Penjualan Akhir : </p>
                                <p>Margin Harian : </p>
                            </div>
                            <div class="col-6">
                                <span>Data Kg</span>
                                <p>Bobot Beli(Kg) : </p>
                                <p>Gp : </p>
                                <p>Bobot Validation Pembelian : </p>
                                <p>Mati Susulan : </p>
                                <p>Tonase Akhir : </p>

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
