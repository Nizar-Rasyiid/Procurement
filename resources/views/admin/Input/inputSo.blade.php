@extends('admin.admin')
@section('admin')
    <div class="page-content">
        <form action="{{ url('/admin-table/store-so') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="id_so" class="form-label">ID SO</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="id_so" name="id_so" required>
                            <button type="search" class="btn btn-secondary">Auto</button>
                        </div>
                    </div>
                </div>
            </div>
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
                        <label for="jumlahKg" class="form-label">Jumlah (kg)</label>
                        <input type="number" class="form-control" id="jumlahKg" name="jumlahKg" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="hargaPerKg" class="form-label">Harga/kg</label>
                        <input type="number" class="form-control" id="hargaPerKg" name="hargaPerKg" required>
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
            <button type="submit" class="btn btn-primary">Input SO</button>
        </form>
    </div>
@endsection
