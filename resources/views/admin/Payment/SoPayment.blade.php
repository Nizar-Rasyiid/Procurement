@extends('admin.admin')
@section('admin')
<div class="page-content">
    <form action="{{ url('/admin-table/store-so') }}" method="POST" class="px-5 column-flex ">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <div class="input-group">
                    <span for="id_so" class="input-group-text">ID Penjualan</span>
                        <input type="text" class="form-control" id="id_so" name="id_so" required>
                        <button type="search" class="btn btn-primary">Select</button>
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
                                    <label for="id_customer">ID Customer</label>
                                    <input type="text" class="form-control" id="id_customer" placeholder="ID Customer" value="" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <label for="namaCustomer">Nama Customer</label>
                                    <input type="text" class="form-control" id="namaCustomer" placeholder="Nama" value="Nama" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" placeholder="Alamat" value="Alamat" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <label for="noHp">No Hp</label>
                                    <input type="text" class="form-control" id="noHp" placeholder="No Hp" value="No Hp" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <label for="tanggalSO">Tanggal Penjualan</label>
                                    <input type="text" class="form-control" id="tanggalSO" placeholder="dd/mm/yy" value="dd/mm/yy" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <label for="jumlahKg">Jumlah Kg</label>
                                    <input type="text" class="form-control" id="jumlahKg" placeholder="Kg" value="Kg" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <label for="hargaKg">Harga/Kg</label>
                                    <input type="text" class="form-control" id="hargaKg" placeholder="Rp" value="Rp" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea type="text" class="form-control" id="keterangan" placeholder="" value="" readonly></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-0">
            <div class="col-12">
                <label for="Data Validasi" class="form-label">Data Validasi</label>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tanggalValidasi">Tanggal Validasi</label>
                                    <input type="text" class="form-control" id="tanggalValidasi" placeholder="Tanggal Validasi" value="dd/mm/yy" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <label for="Total Kg Tiba">Nama Customer</label>
                                    <input type="text" class="form-control" id="Total Kg Tiba" placeholder="Nama" value="Nama" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <label for="Gp">Gp</label>
                                    <input type="text" class="form-control" id="Gp" placeholder="Gp" value="Gp" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <label for="ekor">Ekor</label>
                                    <input type="text" class="form-control" id="ekor" placeholder="Ekor" value="Ekor" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <label for="Kg">Tanggal Penjualan</label>
                                    <input type="text" class="form-control" id="Kg" placeholder="Kg" value="Kg" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <label for="Susut %">Susut %</label>
                                    <input type="text" class="form-control" id="Susut %" placeholder="%" value="%" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <label for="muatSusulan">Mati Susulan</label>
                                    <input type="text" class="form-control" id="muatSusulan" placeholder="Mati Susulan" value="Mati Susulan" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <label for="Total Final Kg">Total Final Kg</label>
                                    <input type="text" class="form-control" id="Total Final Kg" placeholder="Kg" value="Kg" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <label for="Tonase Akhir">Tonase Akhir</label>
                                    <input type="text" class="form-control" id="Tonase Akhir" placeholder="Tonase Akhir" value="Tonase Akhir" readonly>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea type="text" class="form-control" id="keterangan" placeholder="" value="" readonly></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-0">
            <div class="col-12">
                <label for="Data Payment" class="form-label">Data Payment</label>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jumlahBayar">Jumlah Bayar</label>
                                    <input type="text" class="form-control" id="jumlahBayar" placeholder="Jumlah Bayar" value="Jumlah Bayar" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="buktiBayarSO">Bukti Bayar Penjualan</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="buktiBayarSO" name="buktiBayarSO">
                                        <label class="custom-file-label" for="buktiBayarSO">
                                            <i class="fas fa-upload"></i> 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" rows="3"></textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary col-12">Input Payment Penjualan</button>
    </form>
</div>
@endsection
