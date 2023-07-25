@extends('admin.admin')
@section('admin')
    <div class="page-content">
        <form action="{{ url('/admin-table/store-do')}}" id="inputDOForm" method="POST" class="d-flex flex-column px-5 ">
            @csrf
            <div class="row ">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text">
                                ID Customer
                            </span>
                            <input type="text" class="form-control" id="id_customer" name="id_so" required>
                            <button type="search" class="btn btn-primary" onclick="searchSalesOrder()">Search</button>
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
                                    <div class="form-group border">
                                        <div class="input-group">
                                       <span class="input-group-text w-flex">ID Customer</span>
                                        <input type="text" class="form-control" id="id_customer" placeholder="ID Customer" value="Id" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-text w-flex">Nama Customer</span>
                                        <input type="text" class="form-control" id="namaCustomer" placeholder="Nama" value="Nama" name="NamaCustomer" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                           <span class="input-group-text w-flex"> Alamat</span>
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="Alamat" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-text w-flex">Nomor Hp</span>
                                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="No Hp" value="No Hp" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-text w-flex">Tanggal Penjualan</span>
                                        <input type="text" class="form-control" id="tanggalSO" placeholder="dd/mm/yy" value="dd/mm/yy" readonly>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-text w-flex">Keterangan</span>
                                        <textarea type="text" class="form-control" id="keterangan" placeholder="" value="" readonly></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-12">
                    <label for="Data DO" class="form-label">Data Pembelian</label>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="input-group">
                            <span for="tanggal" class="input-group-text">
                                Tanggal Pembelian
                             </span>
                             <input type="date" class="form-control" id="tanggal" placeholder="Tanggal">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="input-group">
                            <div class="input-group">
                                <span for="id_suplier" class="input-group-text">ID Suplier</span>
                                <input type="text" class="form-control" id="id_suplier" name="id_suplier">
                                <button type="search" class="btn btn-primary">Select</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mt-0 mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span for="namaSuplier" class="input-group-text">Suplier/Vendor</span>
                                            <input type="text" class="form-control" id="namaSuplier" placeholder="PT.." value="PT..." readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span for="alamatSuplier" class="input-group-text">Alamat</span>
                                            <input type="text" class="form-control" id="alamatSuplier" placeholder="Alamat" value="Alamat" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                         <span for="noHp" class="input-group-text">No Hp</span>
                                            <input type="text" class="form-control" id="noHp" placeholder="noHp" value="noHp" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span for="saldoHutang" class="input-group-text">Saldo Hutang</span>
                                            <input type="text" class="form-control" id="saldoHutang" placeholder="Saldo Hutang" value="Saldo Hutang" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="row mx-3 mt-3 mb-0">
                    <div class="col-12">
                        <label for="Data DO" class="form-label">Input Data</label>
                    </div>
                </div>
                <div class="card-body my-3">
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <div class="input-group w-flex">
                                <span for="Kandang" class="input-group-text">Kandang</span>
                                <input type="text" class="form-control border border-secondary" id="Kandang" placeholder="Kandang">                    </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <div class="input-group">
                                <span for="No Kendaraan" class="input-group-text">No Kendaraan</span>
                                <input type="text" class="form-control border border-secondary" id="No Kendaraan" placeholder="No Kendaraan">                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <div class="input-group">
                                <span for="Nama Supir" class="input-group-text">Nama Supir</span>
                                <input type="text" class="form-control border border-secondary" id="Nama Supir" placeholder="Nama Supir">                    </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <div class="input-group">
                                <span for="No SIM" class="input-group-text">No SIM</span>
                                <input type="text" class="form-control border border-secondary" id="No SIM" placeholder="No SIM">                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <div class="input-group">
                                <span for="Total Ekor" class="input-group-text">Total Ekor</span>
                                <input type="text" class="form-control border border-secondary" id="Total Ekor" placeholder="Total Ekor">                    </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <div class="input-group">
                                <span for="Total Kg" class="input-group-text">Total Kg</span>
                                <input type="text" class="form-control border border-secondary" id="Total Kg" placeholder="Total Kg">                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <div class="input-group">
                                <span for="Harga/Kg" class="input-group-text">Harga/Kg</span>
                                <input type="text" class="form-control border border-secondary" id="Harga/Kg" placeholder="Harga/Kg">        </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <div class="input-group">
                                <span for="keterangan" class="input-group-text">Keterangan</span>
                                <textarea class="form-control border border-secondary" id="keterangan" rows="3"></textarea>                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Input DO</button>
        </form>
    </div>
    
<script>
    // Script untuk mengambil informasi customer
    function searchCustomer() {
        var idCustomer = document.getElementById('id_customer').value;

        if (idCustomer !== '') {
            fetch('/admin-table/get-customer-infoJson', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    id_customer: idCustomer,
                }),
            })
            .then(response => response.json())
            .then(data => {
                // Autofill the customer information fields
                document.getElementById('namaCustomer').value = data.nama;
                document.getElementById('alamat').value = data.alamat;
                document.getElementById('nomor_telepon').value = data.nomor_telepon;
                document.getElementById('saldoPiutang').value = data.saldoPiutang;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }
    function searchSalesOrder() {
            var idSo = document.getElementById('id_so').value;
    
            if (idSo !== '') {
                fetch('/admin-table/get-so-infoJson', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        id_so: idSo,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    // Autofill the customer information fields
                    document.getElementById('idCustomer').value = data.id_customer;
                    // document.getElementById('namaCustomer').value = data.nama;
                    // document.getElementById('alamatCustomer').value = data.alamat;
                    // document.getElementById('nomorTelepon').value = data.nomor_telepon;
                    // document.getElementById('alamat').value = data.alamat;
                    document.getElementById('tanggal_so').value = data.tanggal;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }
</script>
@endsection
