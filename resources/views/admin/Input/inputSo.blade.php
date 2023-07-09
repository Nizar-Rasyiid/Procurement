@extends('admin.admin')
@section('admin')
    <div class="page-content">
        <form action="{{ url('/admin-table/store-so') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="id_customer" class="form-label">ID Customer</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="id_customer" name="id_customer" required>
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
                                        <label for="namaCustomer">Nama Customer</label>
                                        <input type="text" class="form-control" id="namaCustomer" placeholder="Budi" value="Budi" readonly>
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
                            <div class="row">
                                <div class="col-md-4 my-2">
                                    <div class="form-group">
                                        <label for="saldoHutang">Saldo Hutang</label>
                                        <input type="text" class="form-control" id="saldoHutang" placeholder="Saldo Hutang" value="Saldo Hutang" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 my-2">
                                    <div class="form-group">
                                        <label for="saldoPiutang">Saldo Piutang</label>
                                        <input type="text" class="form-control" id="saldoPiutang" placeholder="Saldo Piutang" value="Saldo Piutang" readonly>
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
                        <label for="tanggal" class="form-label">Tanggal</label>
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
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
