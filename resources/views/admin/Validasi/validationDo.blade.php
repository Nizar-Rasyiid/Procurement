@extends('admin.admin')
@section('admin')
    <div class="page-content">
        <form action="{{ url('/admin-table/storeSuplier') }}" method="POST">
            @csrf
            <div class="row my-3">
                <div class="col-12">
                    <span>Data DO</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="id_so" class="form-label">ID DO</label>
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
                                        <label for="tanggalDo">Tanggal DO</label>
                                        <input type="text" class="form-control" id="tanggalDo" placeholder="dd/mm/yy" value="dd/mm/yy" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="kandang">Kandang</label>
                                        <input type="text" class="form-control" id="kandang" placeholder="kandang" value="kandang" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="No Kendaraan">No Kendaraan</label>
                                        <input type="text" class="form-control" id="No Kendaraan" placeholder="No Kendaraan" value="No Kendaraan" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="Nama Supir">Nama Supir</label>
                                        <input type="text" class="form-control" id="Nama Supir" placeholder="Nama Supir" value="Nama Supir" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="No SIM">No SIM</label>
                                        <input type="text" class="form-control" id="No SIM" placeholder="No SIM" value="No SIM" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="Total Ekor">Total Ekor</label>
                                        <input type="text" class="form-control" id="Total Ekor" placeholder="Total Ekor" value="Total Ekor" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="Total Kg">Total Kg</label>
                                        <input type="text" class="form-control" id="Total Kg" placeholder="Total Kg" value="Total Kg" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="Harga/Kg">Harga/Kg</label>
                                        <input type="text" class="form-control" id="Harga/Kg" placeholder="Harga/Kg" value="Harga/Kg" readonly>
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
            <div class="row my-3">
                <div class="col-12">
                    <label for="Data Validasi" class="form-label">Data Validasi</label>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">
                            <i class="fas fa-calendar-alt" style="color: white;"></i> Tanggal Validasi
                        </label>
                        <input type="date" class="form-control" id="tanggal" placeholder="Tanggal">
                    </div>
                </div>
            </div>
            {{-- <div class="row">
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
            </div> --}}
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="Total Kg Tiba" class="form-label">Total Kg Tiba</label>
                        <input type="text" class="form-control" id="Total Kg Tiba" placeholder="Total Kg Tiba">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="Gp" class="form-label">Gp</label>
                        <input type="text" class="form-control" id="Gp" placeholder="Gp">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="Ekor" class="form-label">Ekor</label>
                        <input type="text" class="form-control" id="Ekor" placeholder="Ekor">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="Kg" class="form-label">Kg</label>
                        <input type="text" class="form-control" id="Kg" placeholder="Kg">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="Susut %" class="form-label">Susut %</label>
                        <input type="text" class="form-control" id="Susut %" placeholder="Susut %">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="Mati Susulan" class="form-label">Mati Susulan</label>
                        <input type="text" class="form-control" id="Mati Susulan" placeholder="Mati Susulan">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="Total Final Kg" class="form-label">Total Final Kg</label>
                        <input type="text" class="form-control" id="Total Final Kg" placeholder="Total Final Kg">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="Tonase Akhir" class="form-label">Tonase Akhir</label>
                        <input type="text" class="form-control" id="Tonase Akhir" placeholder="Tonase Akhir">
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
            <button type="submit" class="btn btn-primary">Input Validasi DO</button>
        </form>
    </div>
@endsection
