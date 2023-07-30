@extends('admin.admin')
@section('admin')
<div class="page-content">
    <form action="{{ url('/admin-table/store-so') }}" method="POST" class="d-flex flex-column px-5  mt-0">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <div class="input-group">
                    <span for="id_do" class="input-group-text">ID Pemesanan</span>
                        <input type="text" class="form-control" id="id_do" name="id_do" required>
                        <button type="search" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="tanggalDo">Tanggal DO</label>
                                        <input type="text" class="form-control" id="tanggalDo" placeholder="dd/mm/yy" value="dd/mm/yy" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="kandang">Kandang</label>
                                    <input type="text" class="form-control" id="kandang" placeholder="kandang" value="kandang" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="No Kendaraan">No Kendaraan</label>
                                    <input type="text" class="form-control" id="No Kendaraan" placeholder="No Kendaraan" value="No Kendaraan" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                   <div class="input-group">
                                     <label class="input-group-text" for="Nama Supir">Nama Supir</label>
                                    <input type="text" class="form-control" id="Nama Supir" placeholder="Nama Supir" value="Nama Supir" readonly>
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                   <div class="input-group">
                                     <label class="input-group-text" for="No SIM">No SIM</label>
                                    <input type="text" class="form-control" id="No SIM" placeholder="No SIM" value="No SIM" readonly>
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="Total Ekor">Total Ekor</label>
                                        <input type="text" class="form-control" id="Total Ekor" placeholder="Total Ekor" value="Total Ekor" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="Total Kg">Total Kg</label>
                                    <input type="text" class="form-control" id="Total Kg" placeholder="Total Kg" value="Total Kg" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="Harga/Kg">Harga/Kg</label>
                                    <input type="text" class="form-control" id="Harga/Kg" placeholder="Harga/Kg" value="Harga/Kg" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label for="Keterangan">Keterangan</label>
                                    <textarea type="text" class="form-control" id="Keterangan" placeholder="Keterangan" value="Keterangan" readonly></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mt-3 mb-3">
                <label for="Data Payment" class="input-group-text">Data Payment</label>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="Harga Total">Harga Total</label>
                                    <input type="text" class="form-control" id="Harga Total" placeholder="Harga Total" value="Harga Total" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="TotalBayar">Total Bayar</label>
                                    <input type="text" class="form-control" id="TotalBayar" placeholder="Total Bayar" value="Total Bayar" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="buktiBayarSO">Bukti Bayar Penjualan</label>
                                        <input type="file" class="custom-file-input mt-2" id="buktiBayarSO" name="buktiBayarSO">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Input Payment DO</button>
    </form>
</div>
@endsection
