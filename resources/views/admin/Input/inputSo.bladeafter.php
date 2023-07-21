<!-- ... Your other HTML code ... -->
@extends('admin.admin')
@section('admin')
<div class="page-content">
<!-- ... Your other HTML code ... -->

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
    <div class="row mb-3 px-5 d-flex flex-column">
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
        <!-- ... Other form fields ... -->
    </div>
    <button type="submit" class="btn btn-primary">Input SO</button>
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
