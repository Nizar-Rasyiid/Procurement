@extends('admin.admin')
@section('admin')
    <div class="page-content">
        <form action="{{ url('/admin-table/storeSuplier') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="id_so" class="form-label">ID SO</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="id_so" name="id_so" required>
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
                                        <label for="id_customer">ID Customer</label>
                                        <input type="text" class="form-control" id="id_customer" placeholder="ID Customer" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="namaCustomer">Nama Customer</label>
                                        <input type="text" class="form-control" id="namaCustomer" placeholder="Budi" value="Budi" readonly>
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
                                        <label for="jumlahEkor">Jumlah (ekor)</label>
                                        <input type="text" class="form-control" id="jumlahEkor" placeholder="Jumlah (ekor)" value="Jumlah (ekor)" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="jumlahKg">Jumlah (kg)</label>
                                        <input type="text" class="form-control" id="jumlahKg" placeholder="Jumlah (kg)" value="Jumlah (kg)" readonly>
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
                        <label for="tanggal" class="form-label">
                            <i class="fas fa-calendar-alt" style="color: white;"></i> Tanggal
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
                            <button type="search" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mt-1 mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="namaSuplier">Nama Suplier</label>
                                        <input type="text" class="form-control" id="namaSuplier" placeholder="PT.." value="PT.." readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="saldoHutang">Saldo Hutang</label>
                                        <input type="text" class="form-control" id="saldoHutang" placeholder="Saldo Hutang" value="Saldo Hutang" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="hargaTotal">Harga Total</label>
                                        <input type="text" class="form-control" id="hargaTotal" placeholder="Harga Total" value="Harga Total" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="alamatSuplier">Alamat Suplier</label>
                                        <input type="text" class="form-control" id="alamatSuplier" placeholder="Alamat" value="Alamat" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="saldoPiutang">Saldo Piutang</label>
                                        <input type="text" class="form-control" id="saldoPiutang" placeholder="Saldo Piutang" value="Saldo Piutang" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="noHp">No HP</label>
                                        <input type="text" class="form-control" id="noHp" placeholder="No Hp" value="No Hp" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="hargaPerEkor">Harga Per ekor/kg</label>
                                        <input type="text" class="form-control" id="hargaPerEkor" placeholder="Harga Per ekor/kg" value="Harga Per ekor/kg" readonly>
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
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
