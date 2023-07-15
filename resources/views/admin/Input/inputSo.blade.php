@extends('admin.admin')
@section('admin')
    <div class="page-content">
        <form action="{{ url('/admin-table/store-so') }}" method="POST" class="px-5 d-flex flex-column">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="input-group">
                        <span for="id_customer" class="input-group-text">ID Customer</span>
                            <input type="text" class="form-control border border-secondary" id="id_customer" name="id_customer" required>
                            <button type="search" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card my-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text text-sm" for="namaCustomer">Nama Customer</span>
                                        <input type="text" class="form-control" id="namaCustomer" placeholder="Nama" value="Nama" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text" for="alamat">Alamat</span>
                                        <input type="text" class="form-control" id="alamat" placeholder="Alamat" value="Alamat" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text" for="noHp">No Hp</span>
                                        <input type="text" class="form-control" id="noHp" placeholder="No Hp" value="No Hp" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text" for="saldoPiutang">Saldo Piutang</span>
                                        <input type="text" class="form-control" id="saldoPiutang" placeholder="Saldo Piutang" value="Saldo Piutang" readonly>
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
                        <div class="input-group">
                        <span for="tanggal" class="input-group-text w-flex">Tanggal</span>
                        <input type="date" class="form-control border border-secondary" id="tanggal" placeholder="Tanggal">
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="input-group">
                        <span for="jumlahKg" class="input-group-text w-flex">Jumlah (kg)</span>
                        <input type="number" class="form-control border border-secondary" id="jumlahKg" name="jumlahKg" required>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="input-group">
                        <span for="hargaPerKg" class="input-group-text w-flex">Harga/kg</span>
                        <input type="number" class="form-control border border-secondary" id="hargaPerKg" name="hargaPerKg" required>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="input-group">
                        <span for="keterangan" class="input-group-text w-flex">Keterangan</span>
                        <textarea class="form-control border border-secondary" id="keterangan" rows="3"></textarea>
                    </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Input SO</button>
        </form>
    </div>
@endsection
