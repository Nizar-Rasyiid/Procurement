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
                        <p>ID Penjualan : {{$salesOrder -> id_so}} </p>
                        <p>ID Customer : {{$salesOrder -> id_customer}} </p>
                        <p>Nama Customer : {{ $salesOrder->nama }}</p>
                        <p>Tanggal Input Penjualan : {{$salesOrder -> tanggal}} </p>
                        <p>Jumlah KG : {{$salesOrder -> jumlahKg}} </p>
                        <p>Harga / KG : {{$salesOrder -> hargaPerKg}}</p>
                        <p>Keterangan : {{$salesOrder -> keterangan}} </p>
                        <p>Status : @if ($salesOrder -> status == 1)
                                            Lunas
                                        @else
                                            Belum Lunas
                                        @endif 
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Verifikasi</h5>
                    </div>
                    <div class="card-body">
                        <p>Id Verifikasi : {{$salesOrder -> id_verifikasi}} </p>
                        <p>Tanggal Verifikasi :{{$salesOrder -> tanggal_verifikasi}}</p>
                        <p>Total KG Tiba : {{$salesOrder -> normal}}</p>
                        <p>GP : {{$salesOrder -> gp}}</p>
                        <p>GP(RP) :{{$salesOrder -> gp_rp}}</p>
                        <p>Ekor : {{$salesOrder -> ekor}}</p>
                        <p>KG Susut : {{$salesOrder -> kg_susut}}</p>
                        <p>Susut % : {{$salesOrder -> susut}}</p>
                        <p>Mati Susulan :{{$salesOrder -> mati_susulan}} </p>
                        <p>Tonase Akhir :{{$salesOrder -> tonase_akhir}} </p>
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
                        <p>ID Penjualan : {{$salesOrder -> id_payment_so}}  </p>
                        <p>Tanggal Verifikasi :  {{$salesOrder -> tanggal_verifikasi}}</p>
                        <p>Harga Total :{{$salesOrder -> harga_total}} </p>
                        <p>Jumlah Bayar : {{$salesOrder -> jumlah_bayar}} </p>
                        <div style="max-width: 100%; text-align: center;">
                            <img src="{{ asset('buktiPembayaranSo/'.$salesOrder->bukti_bayar_penjualan) }}" alt="Bukti Pembayaran" style="max-height: 230px; max-width: 100%; display: inline-block;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                {{-- <div class="card">
                    <div class="card-header">
                        <h5>Data Penjualan</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 border">
                                <p>ID Penjualan</p>
                            </div>
                            <div class="col border">
                                <p> Null</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 border">
                                <p>Tanggal </p>
                            </div>
                            <div class="col border">
                                <p> Null</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 border">
                                <p>Status </p>
                            </div>
                            <div class="col border">
                                <p> Null</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="card mt-2">
                    <div class="card-header">
                        <h5>AP Actual</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 border">
                                <p>AP Actual</p>
                            </div>
                            <div class="col border">
                                <p>Rp. </p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
