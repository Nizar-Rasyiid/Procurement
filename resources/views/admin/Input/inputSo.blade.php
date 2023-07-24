@extends('admin.admin')
@section('admin')
<div class="page-content">
<form id="inputSoForm" action="{{ url('/admin-table/store-so') }}" method="POST" class="px-5 d-flex flex-column">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text">ID Customer</span>
                    <input type="text" class="form-control border border-secondary" id="id_customer" name="id_customer" required>
                    <button type="button" class="btn btn-primary" onclick="searchCustomer()">Search</button>
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
                                <label for="namaCustomer">Nama Customer</label>
                                <input type="text" class="form-control" id="namaCustomer" name="namaCustomer" placeholder="Nama" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="noHp">No Hp</label>
                                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="No Hp" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label for="saldoPiutang">Saldo Piutang</label>
                                <input type="text" class="form-control" id="saldoPiutang" name="saldoPiutang" placeholder="Saldo Piutang" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <div class="input-group">
                    <span for="tanggal" class="input-group-text w-flex">Tanggal</span>
                    <input type="date" class="form-control border border-secondary" id="tanggal" name="tanggal" placeholder="Tanggal">
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
                    <textarea class="form-control border border-secondary" id="keterangan" name="keterangan" rows="3"></textarea>
                </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Input Penjualan</button>
</form>

</div>

<script>
    // Your existing JavaScript code for searchCustomer function
    // ...

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
</script>
@endsection
