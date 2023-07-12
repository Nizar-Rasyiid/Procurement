@extends('admin.admin')
@section('admin')
    <div class="page-content mx-2" style="">
        <form action="{{ url('/admin-table/store-so') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="id_customer" class="form-label">ID Customer</label>
                        <div class="input-group">
                            <input type="text" class="form-control border border-white" id="id_customer" name="id_customer" required>
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
                                <div class="col-md-6 my-2">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="namaCustomer">Nama Customer</label>
                                            </div>
                                            <div class="col border-bottom rounded">
                                                <p>: </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label for="alamat">Alamat</label>
                                            </div>
                                            <div class="col border-bottom rounded">
                                                <p>: </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 my-2">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="saldoPiutang">Saldo Piutang</label>
                                            </div>
                                            <div class="col border-bottom rounded">
                                                <p>: </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label for="noHp">No Hp</label>
                                            </div>
                                            <div class="col border-bottom rounded">
                                                <p>: </p>
                                            </div>
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
                    <div class="mb-3 mt-2">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control border border-white" id="tanggal" placeholder="Tanggal">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="jumlahKg" class="form-label">Jumlah (kg)</label>
                        <input type="number" class="form-control border border-white" id="jumlahKg" name="jumlahKg" placeholder="kg" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="hargaPerKg" class="form-label">Harga/kg</label>
                        <input type="number" class="form-control borde border-white" id="hargaPerKg" name="hargaPerKg" placeholder="Rp. " required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control border-white" id="keterangan" placeholder="Ketik disini.." rows="3"></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Input SO</button>
        </form>
    </div>
@endsection
