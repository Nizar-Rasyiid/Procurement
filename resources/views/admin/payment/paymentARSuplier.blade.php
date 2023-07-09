@extends('admin.admin')
@section('admin')
<div class="page-content">
    <form action="{{ url('/admin-table/store-so') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="id_do" class="form-label">ID DO</label>
                    <div class="input-group">
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
                            <div class="col-md-4 my-2">
                                <div class="form-group">
                                    <label for="nama">Nama </label>
                                    <input type="text" class="form-control" id="nama" placeholder="Budi" value="Budi" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 my-2">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" placeholder="Alamat" value="Alamat" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 my-2">
                                <div class="form-group">
                                    <label for="noHp">No Hp</label>
                                    <input type="text" class="form-control" id="noHp" placeholder="No Hp" value="No Hp" readonly>
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
                    <label for="tanggal" class="form-label">Tanggal DO</label>
                    <input type="date" class="form-control" id="tanggal" placeholder="Tanggal">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="jumlah_ekor" class="form-label">Jumlah (ekor)</label>
                    <input type="text" class="form-control" id="jumlah_ekor" name="jumlah_ekor" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="jumlahKg" class="form-label">Jumlah (kg)</label>
                    <input type="text" class="form-control" id="jumlahKg" name="jumlahKg" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="hargaPerEkor(kg)" class="form-label">Harga per ekor/kg</label>
                    <input type="text" class="form-control" id="hargaPerEkor(kg)" name="hargaPerEkor(kg)" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="hargaTotal" class="form-label">Harga Total</label>
                    <input type="text" class="form-control" id="hargaTotal" name="hargaTotal" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label for="Data Payment" class="form-label">Data Payment</label>
                <div class="row">
                    <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="id_do" class="form-label">ID Transaksi</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="id_do" name="id_do" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="id_do" class="form-label">Tanggal Transaksi</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="id_do" name="id_do" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="id_do" class="form-label">Status Transaksi</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="id_do" name="id_do" required>
                                        <button type="search" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <div class="card my-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 my-2">
                                <div class="form-group">
                                    <label for="saldoHutang">Saldo Hutang</label>
                                    <input type="text" class="form-control" id="saldoHutang" placeholder="Saldo Hutang" value="Saldo Hutang" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 my-2">
                                <div class="form-group">
                                    <label for="saldoPiutang">Saldo Piutang</label>
                                    <input type="text" class="form-control" id="saldoPiutang" placeholder="Saldo Piutang" value="Saldo Piutang" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jumlahBayar">Jumlah Bayar</label>
                                    <input type="text" class="form-control" id="jumlahBayar" placeholder="Jumlah Bayar" value="Jumlah Bayar" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="buktiBayarSO">Bukti Bayar AP</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control" id="buktiBayarSO" name="buktiBayarSO">
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
        <button type="submit" class="btn btn-primary">Input Payment DO</button>
    </form>
</div>
@endsection
