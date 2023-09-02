@extends('admin.admin')
@section('admin')
<style>
.so-item.selected {
    border: 2px solid blue;
}
.so-item:hover {
    border: 2px solid blue; /* Misalnya, border biru saat diklik */
    /* Tambahkan gaya lain sesuai kebutuhan Anda */
}
</style>
<div class="page-content">
    <form action="{{ url('/admin-table/store-do') }}" method="POST" class="d-flex flex-column px-5">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <div class="input-group">
                    <span for="id_so" class="input-group-text">ID Penjualan</span>
                        <input type="text" class="form-control" id="id_so" name="id_so"  data-bs-toggle="modal" data-bs-target="#soModal" required readonly>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#soModal">Search</button>
                    </div>
                </div>
            </div>
            {{-- MODAL --}}
            <div class="modal fade" id="soModal" tabindex="-1" aria-labelledby="soModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="soModalLabel">Pilih Id Penjualan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group" id="soList">
                                @foreach ($salesOrder as $so)
                                    @if ($so->id_do == null && $so->status == 0)
                                        <li class="list-group-item so-item table-hover  my-2"
                                            data-id="{{ $so->id_so }}"
                                            data-id-customer="{{ $so->id_customer }}"
                                        >
                                            ID Penjualan: {{ $so->id_so }} <br> ID Customer: {{ $so->id_customer }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary"  id="selectSoButton">Select SO</button>
                        </div>
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
                                        <input type="text" class="form-control" id="idCustomer" name="id_customer" placeholder="ID Customer" value="Id" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text w-flex">Nama</span>
                                        <input type="text" class="form-control" id="namaCustomer" placeholder="Nama"  readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text w-flex">Alamat</span>
                                        <input type="text" class="form-control" id="alamat_customer" name="alamat_customer"  placeholder="Alamat" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text w-flex">Nomor Hp</span>
                                        <input type="text" class="form-control" id="noHp" name="noHp" placeholder="Nomor Telepon" readonly>

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
                            <input type="text" class="form-control" id="id_suplier" name="id_suplier" data-bs-toggle="modal" data-bs-target="#suplierModal" readonly  required>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#suplierModal">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="suplierModal" tabindex="-1" aria-labelledby="suplierModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="suplierModalLabel">Pilih Id Customer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group" id="suplierList">
                                <!-- Customer items will be added here -->
                                @foreach ($supliers as $sup)
                                <li class="list-group-item suplier-item table-hover btn my-2"
                                data-id-suplier="{{ $sup->id_suplier }}"
                                data-nama="{{ $sup->nama_suplier }}"
                                data-alamat="{{ $sup->alamat }}"
                                data-nom="{{ $sup->nomor_telepon_suplier }}"
                                data-saldo-piutang="{{ $sup->saldoPiutang }}"
                            >
                                ID Suplier: {{ $sup->id_suplier }} <br> Nama: {{ $sup->nama_suplier }}
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
                                        <span for="nomor_telepon_suplier" class="input-group-text">Nomor Telepon</span>
                                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nomor Telepon" readonly>
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
                                    <option value="Kirim">Kirim</option>
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
                                <input type="text" class="form-control border border-secondary" id="Kandang" name="kandang" placeholder="Kandang" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="input-group">
                                <span for="No Kendaraan" class="input-group-text">No Kendaraan</span>
                                <input type="text" class="form-control border border-secondary" id="nomor_kendaraan" name="nomor_kendaraan" placeholder="Nomor Kendaraan" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="input-group">
                                <span for="Nama Supir" class="input-group-text">Nama Supir</span>
                                <input type="text" class="form-control border border-secondary" id="nama_supir" name="nama_supir" placeholder="Nama Supir" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="input-group">
                                <span for="No SIM" class="input-group-text">No SIM</span>
                                <input type="text" class="form-control border border-secondary" id="nomor-sim" name="nomor_sim" placeholder="No SIM" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="input-group">
                                <span for="Total Ekor" class="input-group-text">Total Ekor</span>
                                <input type="text" class="form-control border border-secondary" id="total_ekor" name="total_ekor" placeholder="Total Ekor" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="input-group">
                                <span for="Total Kg" class="input-group-text">Total Kg</span>
                                <input type="text" class="form-control border border-secondary" id="total_kg" name="total_kg" placeholder="Total Kg" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="input-group">
                                <span for="Harga/Kg" class="input-group-text">Harga/Kg</span>
                                <input type="text" class="form-control border border-secondary" id="hargaPerKg" name="hargaPerKg" placeholder="Harga/Kg" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="input-group">
                                <span for="keterangan" class="input-group-text">Keterangan</span>
                                <textarea class="form-control border border-secondary" id="keterangan" name="keterangan" rows="3" required></textarea>
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
            <input type="hidden" id="selectedSoId" value="">
        <button type="submit" class="btn btn-primary mt-3">Input DO</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {

    const suplierList = document.getElementById("suplierList");
    const idSuplierInput = document.getElementById("id_suplier");
    const namaSuplierInput = document.getElementById("namaSuplier");
    const alamatSuplierInput = document.getElementById("alamat_suplier");
    const nomorTeleponSuplierInput = document.getElementById("nom");
    const saldoHutangInput = document.getElementById("saldoHutang");

    suplierList.addEventListener("click", function(event) {
        const listSup = event.target.closest(".suplier-item");
        if (listSup) {
            const idSuplier = listSup.getAttribute("data-id-suplier");
            const namaSuplier = listSup.getAttribute("data-nama");
            const alamatSuplier = listSup.getAttribute("data-alamat");
            const nomorTeleponSuplier = listSup.getAttribute("data-nom");
            const saldoPiutang = listSup.getAttribute("data-saldo-piutang");

            idSuplierInput.value = idSuplier;
            namaSuplierInput.value = namaSuplier;
            alamatSuplierInput.value = alamatSuplier;
            nomorTeleponSuplierInput.value = nomorTeleponSuplier;
            saldoHutangInput.value = saldoPiutang;

            $('#suplierModal').modal('hide'); // Close the modal
        }
    });


    const soList = document.getElementById("soList");
    const selectSoButton = document.getElementById("selectSoButton");
    const selectedSoIdInput = document.getElementById("selectedSoId");



    soList.addEventListener("click", function(event) {
        const listItem = event.target.closest(".so-item");
        if (listItem) {
            const idSo = listItem.getAttribute("data-id");

            // Set the selected SO ID and update the hidden input
            selectedSoIdInput.value = idSo;

            // Remove the "selected" class from all items and add it to the clicked item
            const allItems = soList.querySelectorAll(".so-item");
            allItems.forEach(item => item.classList.remove("selected"));
            listItem.classList.add("selected");
        }
    });

    selectSoButton.addEventListener("click", function() {
        displaySelectedSo();
        searchSo();
        $('#soModal').modal('hide');
    });


    function displaySelectedSo() {
        const selectedSoId = selectedSoIdInput.value;

        if (selectedSoId !== "") {
            const selectedSoItem = document.querySelector(`[data-id="${selectedSoId}"]`);
            const idCustomer = selectedSoItem.getAttribute("data-id-customer");
            // ... ambil atribut lainnya jika perlu

            // Update input values
            document.getElementById('id_so').value = selectedSoId;
            document.getElementById('idCustomer').value = idCustomer;

            // Remove the "selected" class from all items
            const allItems = soList.querySelectorAll(".so-item");
            allItems.forEach(item => item.classList.remove("selected"));

            // Add the "selected" class to the clicked item
            selectedSoItem.classList.add("selected");
        }
    }


});

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
            document.getElementById('harga_kg').value = data.hargaPerKg;
            document.getElementById('jumlahKg').value = data.jumlahKg;

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
