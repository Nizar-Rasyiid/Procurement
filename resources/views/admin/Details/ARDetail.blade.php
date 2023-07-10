@extends('admin.admin')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h5>AR Customer</h5>
                    </div>
                    <div class="card-body">
                        <p>ID AR : </p>
                        <p>Nama Customer : </p>
                        <p>Tanggal Validation DO :  </p>
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
                        <h5>Data Validation DO</h5>
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
                        <h5>Data Payment SO</h5>
                    </div>
                    <div class="card-body">
                        <p>ID SO : </p>
                        <p>ID Customer : </p>
                        <p>Nama Customer : </p>
                        <p>Alamat :  </p>
                        <p>No HP </p>
                        <p>Tanggal SO : </p>
                        <p>Jumlah KG : </p>
                        <p>Harga/lg : </p>
                        <p>Keterangan : </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Data SO</h5>
                    </div>
                    <div class="card-body">
                        <p>ID SO :</p>
                        <p>Tanggal : </p>
                        <p>Status : </p>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-header">
                        <h5>AR Actival</h5>
                    </div>
                    <div class="card-body">
                        <p>AR Actual : Rp. </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5>Data SO</h5>
                                    <div class="row mt-3">
                                        <p>id SO </p>
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
                                        <h5>Data Payment SO</h5>
                                        <p class="mt-3">ID SO : </p>
                                        <p>ID Customer : </p>
                                        <p>Nama Customer : </p>
                                        <p>Alamat :  </p>
                                        <p>No HP </p>
                                        <p>Tanggal SO : </p>
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
                                            <p class="mt-3">ID SO : </p>
                                            <p>ID Customer : </p>
                                            <p>Nama Customer : </p>
                                            <p>Alamat :  </p>
                                            <p>No HP </p>
                                            <p>Tanggal SO : </p>
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
