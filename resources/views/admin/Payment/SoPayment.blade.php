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
                                    <div class="input-group text-sm">
                                        <label for="id_customer" class="input-group-text">ID Customer</label>
                                        <input type="text" class="form-control" id="id_customer" placeholder="ID Customer" value="" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="namaCustomer">Nama Customer</label>
                                        <input type="text" class="form-control" id="namaCustomer" placeholder="Nama" value="Nama" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" placeholder="Alamat" value="Alamat" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="noHp">No Hp</label>
                                        <input type="text" class="form-control" id="noHp" placeholder="No Hp" value="No Hp" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="tanggalSO">Tanggal Penjualan</label>
                                        <input type="text" class="form-control" id="tanggalSO" placeholder="dd/mm/yy" value="dd/mm/yy" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="jumlahKg">Jumlah Kg</label>
                                        <input type="text" class="form-control" id="jumlahKg" placeholder="Kg" value="Kg" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="hargaKg">Harga/Kg</label>
                                        <input type="text" class="form-control" id="hargaKg" placeholder="Rp" value="Rp" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="keterangan">Keterangan</label>
                                        <textarea type="text" class="form-control" id="keterangan" placeholder="" value="" readonly></textarea>
                                    </div>
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
                                    <div class="input-group text-sm">
                                        <label for="id_customer" class="input-group-text">Tanggal Validasi</label>
                                        <input type="text" class="form-control" id="id_customer" placeholder="mm/dd/yyyy" value="" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="namaCustomer">Nama Customer</label>
                                        <input type="text" class="form-control" id="namaCustomer" placeholder="Nama" value="Nama" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="alamat">GP</label>
                                        <input type="text" class="form-control" id="alamat" placeholder="Gp" value="Gp" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="noHp">Ekor</label>
                                        <input type="text" class="form-control" id="noHp" placeholder="No Hp" value="Ekor" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="tanggalSO">Tanggal Penjualan</label>
                                        <input type="text" class="form-control" id="tanggalSO" placeholder="dd/mm/yy" value="dd/mm/yy" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="jumlahKg">Susut%</label>
                                        <input type="text" class="form-control" id="jumlahKg" placeholder="Kg" value="%" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="hargaKg">Mati susulan</label>
                                        <input type="text" class="form-control" id="hargaKg" placeholder="" value="" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="hargaKg">Total Final KG</label>
                                        <input type="text" class="form-control" id="hargaKg" placeholder="" value="" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="hargaKg">Tonase akhir</label>
                                        <input type="text" class="form-control" id="hargaKg" placeholder="" value="" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="keterangan">Keterangan</label>
                                        <textarea type="text" class="form-control" id="keterangan" placeholder="" value="" readonly></textarea>
                                    </div>
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
                                    <div class="input-group">
                                        <label class="input-group-text" for="jumlahBayar">Jumlah Bayar</label>
                                        <input type="text" class="form-control" id="jumlahBayar" placeholder="Jumlah Bayar" value="Jumlah Bayar" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="buktiBayarSO">Bukti Bayar Penjualan</label>
                                            <input type="file" class="custom-file-input mt-2" id="buktiBayarSO" name="buktiBayarSO">
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
