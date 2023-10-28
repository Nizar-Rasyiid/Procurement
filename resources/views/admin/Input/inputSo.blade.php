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
                        <input type="text" class="form-control border border-secondary" id="id_customer" name="id_customer" data-bs-toggle="modal" data-bs-target="#customerModal" required readonly>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customerModal">Search</button>
                    </div>
                </div>


                
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="customerModalLabel">Pilih Id Customer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group" id="customerList">
                                <!-- Customer items will be added here -->
                                @foreach ($customers as $cust)
                                <li class="list-group-item customer-item table-hover btn my-2"
                                data-id="{{ $cust->id_customer }}"
                                data-nama="{{ $cust->nama }}"
                                data-alamat="{{ $cust->alamat }}"
                                data-nomor-telepon="{{ $cust->nomor_telepon }}"
                                data-saldo-piutang="{{ $cust->total_hutang }}"
                                data-saldo="{{ $cust->total_saldo }}"
                            >
                                ID: Customer {{ $cust->id_customer }} <br> Nama: {{ $cust->nama }}
                            </li>
                            
                                @endforeach
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
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
                        <div class="row">
                            <div class="col-md-6 my-2">
                                <div class="form-group">
                                    <label for="saldo">Saldo Customer</label>
                                    <input type="text" class="form-control" id="saldo" name="saldo" placeholder="Saldo Piutang" readonly>
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
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <div class="input-group">
                        <span for="tanggal" class="input-group-text w-flex">Tanggal</span>
                        <input type="date" class="form-control border border-secondary" id="tanggal" name="tanggal" placeholder="Tanggal" required>
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
                        <textarea class="form-control border border-secondary" id="keterangan" name="keterangan" rows="3" required></textarea>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Input Penjualan</button>
    </form>
</div>

<script>

document.addEventListener("DOMContentLoaded", function() {
        const customerList = document.getElementById("customerList");
        const idCustomerInput = document.getElementById("id_customer");
        const namaCustomerInput = document.getElementById("namaCustomer");
        const alamatInput = document.getElementById("alamat");
        const nomorTeleponInput = document.getElementById("nomor_telepon");
        const saldoPiutangInput = document.getElementById("saldoPiutang");
        const saldoInput = document.getElementById("saldo");

        customerList.addEventListener("click", function(event) {
            const listItem = event.target;
            const id = listItem.getAttribute("data-id");
            const nama = listItem.getAttribute("data-nama");
            const alamat = listItem.getAttribute("data-alamat");
            const nomorTelepon = listItem.getAttribute("data-nomor-telepon");
            const saldoPiutang = listItem.getAttribute("data-saldo-piutang");
            const saldo = listItem.getAttribute("data-saldo");

            idCustomerInput.value = id;
            namaCustomerInput.value = nama;
            alamatInput.value = alamat;
            nomorTeleponInput.value = nomorTelepon;
            saldoPiutangInput.value = saldoPiutang;
            saldoInput.value = saldo;

            $('#customerModal').modal('hide'); // Close the modal
        });
    });

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
