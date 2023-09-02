@extends('admin.admin')

@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Pembelian</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>ID Penjualan:</strong> {{ $deliveryOrder->id_do }}</p>
                        <p><strong>ID Suplier:</strong> {{ $deliveryOrder->id_suplier }}</p>
                        <p><strong>ID Customer:</strong> {{ $deliveryOrder->id_customer }}</p>
                        <p><strong>Nama Customer:</strong> {{ $deliveryOrder->nama }}</p>
                        <p><strong>Nama Suplier:</strong> {{ $deliveryOrder->nama_suplier }}</p>
                        <p><strong>Kandang:</strong> {{ $deliveryOrder->kandang }}</p>
                        <p><strong>Nama Supir:</strong> {{ $deliveryOrder->nama_supir }}</p>
                        <p><strong>Nomor Kendaraan:</strong> {{ $deliveryOrder->nomor_kendaraan }}</p>
                        <p><strong>Nomor SIM:</strong> {{ $deliveryOrder->nomor_sim }}</p>
                        <p><strong>Tanggal Input Pembelian:</strong> {{ $deliveryOrder->tanggal_pembelian }}</p>
                        <p><strong>Total Ekor:</strong> {{ $deliveryOrder->total_ekor }}</p>
                        <p><strong>Jumlah KG:</strong> {{ $deliveryOrder->total_kg }}</p>
                        <p><strong>Harga / KG:</strong> {{ $deliveryOrder->hargaPerKg }}</p>
                        <p><strong>Keterangan:</strong> {{ $deliveryOrder->keterangan }}</p>
                        <p><strong>Uang Jalan:</strong> {{ $deliveryOrder->uang_jalan }}</p>
                        <p><strong>Uang Tangkap:</strong> {{ $deliveryOrder->uang_tangkap }}</p>
                        <p><strong>Solar:</strong> {{ $deliveryOrder->solar }}</p>
                        <p><strong>Tipe Pemesanan:</strong> {{ $deliveryOrder->order_type }}</p>
                        <p><strong>Etoll:</strong> {{ $deliveryOrder->etoll }}</p>
                        <p><strong>Status:</strong>
                            @if ($deliveryOrder->status == 1)
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
                        <p><strong>ID Verifikasi:</strong> {{ $deliveryOrder->id_verifikasi }}</p>
                        <p><strong>Tanggal Verifikasi:</strong> {{ $deliveryOrder->tanggal_verifikasi }}</p>
                        <p><strong>Total KG Tiba:</strong> {{ $deliveryOrder->normal }}</p>
                        <p><strong>GP:</strong> {{ $deliveryOrder->gp }}</p>
                        <p><strong>GP(RP):</strong> {{ $deliveryOrder->gp_rp }}</p>
                        <p><strong>Ekor:</strong> {{ $deliveryOrder->ekor }}</p>
                        <p><strong>KG Susut:</strong> {{ $deliveryOrder->kg_susut }}</p>
                        <p><strong>Susut %:</strong> {{ $deliveryOrder->susut }}</p>
                        <p><strong>Mati Susulan:</strong> {{ $deliveryOrder->mati_susulan }}</p>
                        <p><strong>Tonase Akhir:</strong> {{ $deliveryOrder->tonase_akhir }}</p>
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
                        <p><strong>ID Pembelian:</strong> {{ $deliveryOrder->id_payment_order }}</p>
                        <p><strong>Tanggal Verifikasi:</strong> {{ $deliveryOrder->tanggal_verifikasi }}</p>
                        <p><strong>Harga Total:</strong> {{ $deliveryOrder->harga_total }}</p>
                        <p><strong>Jumlah Bayar:</strong> {{ $deliveryOrder->total_bayar }}</p>
                        <p><strong>Bukti Pembayaran:</strong></p>
                        <div style="max-width: 100%; text-align: center;">
                            <img src="{{ asset('buktiPembayaranDo/'.$deliveryOrder->bukti_bayar) }}" alt="Bukti Pembayaran" style="max-height: 230px; max-width: 100%; display: inline-block;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
