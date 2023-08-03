@extends('admin.admin')
@section('admin')
<div class="page-content">
    <form action="{{ url('/admin-table/store-do') }}" method="POST" class="d-flex flex-column px-5">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text">
                            ID Penjualan
                        </span>
                        <input type="text" class="form-control" id="id_so" name="id_so" required>
                        <button type="button" class="btn btn-primary" onclick="searchSo()">Select</button>
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
                                        <input type="text" class="form-control" id="idCustomer" name="idCustomer" placeholder="ID Customer" value="Id" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text w-flex">Nama</span>
                                        <input type="text" class="form-control" id="namaCustomer" placeholder="Nama" value="{{old('nama')}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text w-flex">Alamat</span>
                                        <input type="text" class="form-control" id="alamat_customer" name="alamat_customer" value="{{old('alamat')}}" placeholder="Alamat" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text w-flex">Nomor Hp</span>
                                        <input type="text" class="form-control" id="noHp" name="noHp" placeholder="No Hp" value="No Hp" value="{{old('nomor_telepon')}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text w-flex">Tanggal Penjualan</span>
                                        <input type="text" class="form-control" id="tanggal" name="tanggal"  placeholder="Tanggal"  readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text w-flex">Keterangan</span>
                                        <textarea type="text" class="form-control" id="keterangan_so" name="keterangan_so" readonly></textarea>
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
                        <span for="tanggalSo" class="input-group-text">Tanggal Pembelian</span>
                        <input type="date" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" placeholder="Tanggal">
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
                            <input type="text" class="form-control" id="id_suplier" name="id_suplier" required>
                            <button type="button" class="btn btn-primary" onclick="searchSuplier()">Search</button>
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
                                        <input type="text" class="form-control" id="namaSuplier" name="namaSuplier" placeholder="PT.." readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span for="alamat_suplier" class="input-group-text">Alamat</span>
                                        <input type="text" class="form-control" id="alamat_suplier" name="alamat_suplier" placeholder="Alamat" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span for="nomor_telepon" class="input-group-text">No Hp</span>
                                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Nomor Telepon" readonly>
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
                    <label for="Data DO" class="form-label">ORDER TYPE</label>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Pilih Tipe Pemesanan</label>
                                </div>
                                <select class="custom-select w-75 border border-secondary text-white" style="background-color: #060c17" id="inputGroupSelect01" name="order_type">
                                    <option selected disabled>Pilih</option>
                                    <option value="Stock">Stock</option>
                                    <option value="Pembelian">Pembelian</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="row mx-3 mt-3 mb-0">
                <div class="col-12">
                    <label for="Data DO" class="form-label">INPUT DATA</label>
                </div>
            </div>
            <div class="card-body my-3">

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="input-group w-flex">
                                <span for="Kandang" class="input-group-text">Kandang</span>
                                <input type="text" class="form-control border border-secondary" id="Kandang" name="kandang" placeholder="Kandang">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="input-group">
                                <span for="No Kendaraan" class="input-group-text">No Kendaraan</span>
                                <input type="text" class="form-control border border-secondary" id="nomor_kendaraan" name="nomor_kendaraan" placeholder="Nomor Kendaraan">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="input-group">
                                <span for="Nama Supir" class="input-group-text">Nama Supir</span>
                                <input type="text" class="form-control border border-secondary" id="nama_supir" name="nama_supir" placeholder="Nama Supir">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="input-group">
                                <span for="No SIM" class="input-group-text">No SIM</span>
                                <input type="text" class="form-control border border-secondary" id="nomor-sim" name="nomor_sim" placeholder="No SIM">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="input-group">
                                <span for="Total Ekor" class="input-group-text">Total Ekor</span>
                                <input type="text" class="form-control border border-secondary" id="total_ekor" name="total_ekor" placeholder="Total Ekor">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="input-group">
                                <span for="Total Kg" class="input-group-text">Total Kg</span>
                                <input type="text" class="form-control border border-secondary" id="total_kg" name="total_kg" placeholder="Total Kg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="input-group">
                                <span for="Harga/Kg" class="input-group-text">Harga/Kg</span>
                                <input type="text" class="form-control border border-secondary" id="hargaPerKg" name="hargaPerKg" placeholder="Harga/Kg">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="input-group">
                                <span for="keterangan" class="input-group-text">Keterangan</span>
                                <textarea class="form-control border border-secondary" id="keterangan" name="keterangan" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
                <div class="row">
                    <div class="col">
                        <span class="input-group-text">KOMPONEN OPERASIONAL</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span for="uang jalan" class="input-group-text">Uang Jalan</span>
                                        <input type="number" class="form-control border border-secondary" id="uang_jalan" name="uang_jalan" placeholder="Rp">                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span for="uang tangkap" class="input-group-text">Uang Tangkap</span>
                                        <input type="number" class="form-control border border-secondary" id="uang_tangkap" name="uang_tangkap" placeholder="Rp">                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span for="solar" class="input-group-text">Solar</span>
                                        <input type="number" class="form-control border border-secondary" id="solar" name="solar" placeholder="Rp">                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span for="etoll" class="input-group-text">Etoll</span>
                                        <input type="number" class="form-control border border-secondary" id="etoll" name="etoll" placeholder="Rp">                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <button type="submit" class="btn btn-primary mt-3">Input DO</button>
    </form>
</div>

<script>
    // Your existing JavaScript code for searchCustomer function
    // ...

    function searchSuplier() {
        var idSuplier = document.getElementById('id_suplier').value;

        if (idSuplier !== '') {
            fetch('/admin-table/get-suplier-infoJson', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    id_suplier: idSuplier,
                }),
            })
            .then(response => response.json())
            .then(data => {
                // Autofill the customer information fields
                document.getElementById('namaSuplier').value = data.nama_suplier;
                document.getElementById('alamat_suplier').value = data.alamat;
                document.getElementById('nomor_telepon').value = data.nomor_telepon_suplier;
                document.getElementById('saldoPiutang').value = data.saldoPiutang;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }

    function searchSo() {
    var idSo = document.getElementById('id_so').value;
    console.log('Search SO ID:', idSo);

    if (idSo !== '') {
        fetch('/admin-table/get-so-infoJson', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            credentials: 'same-origin',
            body: JSON.stringify({
                id_so: idSo,
            }),
        })
        .then(response => response.json())
        .then(data => {
            // Autofill the SO information fields
            document.getElementById('idCustomer').value = data.id_customer;
                document.getElementById('alamat_customer').value = data.alamat;
                document.getElementById('noHp').value = data.nomor_telepon;
            document.getElementById('tanggal').value = data.tanggal;
            document.getElementById('keterangan_so').value = data.keterangan;
            document.getElementById('namaCustomer').value = data.nama;
            document.getElementById('saldoPiutang').value = data.saldoPiutang;

            // Now, use the retrieved customer ID to fetch customer data
            fetch('/admin-table/get-customer-infoJson', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    id_customer: data.id_customer, // Pass the customer ID from SO data
                }),
            })
            .then(response => response.json())
            .then(customerData => {
                // Autofill the customer information fields from Customer table
                // document.getElementById('namaCustomer').value = customerData.nama;
                document.getElementById('alamat_customer').value = customerData.alamat;
                document.getElementById('noHp').value = customerData.nomor_telepon;
                // Add other customer information fields as needed
            })
            .catch(error => {
                console.error('Error fetching customer info:', error);
            });
        })
        .catch(error => {
            console.error('Error fetching SO info:', error);
        });
    }
}






</script>
@endsection