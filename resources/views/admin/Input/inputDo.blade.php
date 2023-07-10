@extends('admin.admin')
@section('admin')
    <div class="page-content">
        <form action="{{ url('/admin-table/storeSuplier') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="id_so" class="form-label">ID DO</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="id_so" name="id_so" required>
                            <button type="search" class="btn btn-secondary">Auto Increment</button>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="id_so" class="form-label">ID SO</label>
                        <div class="input-group">
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
                                        <label for="tanggalSO">Tanggal SO</label>
                                        <input type="text" class="form-control" id="tanggalSO" placeholder="dd/mm/yy" value="dd/mm/yy" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4 my-2">
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
            <div class="row my-3">
                <div class="col-12">
                    <label for="Data DO" class="form-label">Data DO</label>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">
                            <i class="fas fa-calendar-alt" style="color: white;"></i> Tanggal DO
                        </label>
                        <input type="date" class="form-control" id="tanggal" placeholder="Tanggal">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="id_suplier" class="form-label">ID Suplier</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="id_suplier" name="id_suplier" required>
                            <button type="search" class="btn btn-primary">Select</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mt-0 mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="namaSuplier">Suplier/Vendor</label>
                                        <input type="text" class="form-control" id="namaSuplier" placeholder="PT.." value="PT.." readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="alamatSuplier">Alamat</label>
                                        <input type="text" class="form-control" id="alamatSuplier" placeholder="Alamat" value="Alamat" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="noHp">No Hp</label>
                                        <input type="text" class="form-control" id="noHp" placeholder="noHp" value="noHp" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="saldoHutang">Saldo Hutang</label>
                                        <input type="text" class="form-control" id="saldoHutang" placeholder="Saldo Hutang" value="Saldo Hutang" readonly>
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
                        <label for="Kandang" class="form-label">Kandang</label>
                        <input type="text" class="form-control" id="Kandang" placeholder="Kandang">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="No Kendaraan" class="form-label">No Kendaraan</label>
                        <input type="text" class="form-control" id="No Kendaraan" placeholder="No Kendaraan">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="Nama Supir" class="form-label">Nama Supir</label>
                        <input type="text" class="form-control" id="Nama Supir" placeholder="Nama Supir">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="No SIM" class="form-label">No SIM</label>
                        <input type="text" class="form-control" id="No SIM" placeholder="No SIM">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="Total Ekor" class="form-label">Total Ekor</label>
                        <input type="text" class="form-control" id="Total Ekor" placeholder="Total Ekor">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="Total Kg" class="form-label">Total Kg</label>
                        <input type="text" class="form-control" id="Total Kg" placeholder="Total Kg">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="Harga/Kg" class="form-label">Harga/Kg</label>
                        <input type="text" class="form-control" id="Harga/Kg" placeholder="Harga/Kg">
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
            <button type="submit" class="btn btn-primary">Input DO</button>
        </form>
    </div>
@endsection
