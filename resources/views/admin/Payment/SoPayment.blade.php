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
.verifikasi-item.selected {
    border: 2px solid blue;
}
.verifikasi-item:hover {
    border: 2px solid blue; /* Misalnya, border biru saat diklik */
    /* Tambahkan gaya lain sesuai kebutuhan Anda */
}

</style>
<div class="page-content">
    <form action="{{ url('/admin-table/store-payment-so') }}" enctype="multipart/form-data" method="POST" class="px-5 column-flex ">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <div class="input-group">
                    <span for="id_so" class="input-group-text">ID Penjualan</span>
                        <input type="text" class="form-control" id="id_so" data-bs-toggle="modal" data-bs-target="#soModal" name="id_so" required readonly>
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
                                {{-- @if ($so -> status == 0) --}}
                                <li class="list-group-item so-item table-hover  my-2"
                                data-id="{{ $so->id_so }}"
                                data-id-customer="{{ $so->id_customer }}"
                            >
                                ID Penjualan: {{ $so->id_so }} <br> ID Customer: {{ $so->id_customer }} <br> ID Pembelian: {{$so->id_do}}
                            </li>
                                {{-- @else --}}
                                    
                                {{-- @endif --}}

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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group text-sm">
                                        <label for="idCustomer" class="input-group-text">ID Customer</label>
                                        <input type="text" class="form-control" id="idCustomer" placeholder="ID Customer" value="" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="namaCustomer">Nama Customer</label>
                                        <input type="text" class="form-control" id="namaCustomer" placeholder="Nama" value="{{old('nama')}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="alamat_customer">Alamat</label>
                                        <input type="text" class="form-control" id="alamat_customer" placeholder="Alamat" value="{{old('alamat')}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="noHp">No Hp</label>
                                        <input type="text" class="form-control" id="noHp" placeholder="No Hp" value="{{old('nomor_telepon')}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="tanggal">Tanggal Penjualan</label>
                                        <input type="text" class="form-control" id="tanggal" placeholder="dd/mm/yy" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="jumlahKg">Jumlah Kg</label>
                                        <input type="text" class="form-control" id="jumlahKg" placeholder="Kg" value="Kg" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="harga_kg">Harga/Kg</label>
                                        <input type="text" class="form-control" id="harga_kg" placeholder="Rp"  readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="keterangan_so">Keterangan</label>
                                        <textarea type="text" class="form-control" id="keterangan_so" placeholder="" value="" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-0">
            <div class="col-12">
                
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <div class="input-group">
                    <span for="id_verifikasi" class="input-group-text">ID Verifikasi</span>
                        <input type="text" class="form-control" id="id_verifikasi" data-bs-toggle="modal" data-bs-target="#verifikasiModal" name="id_verifikasi" readonly required>
                        <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#verifikasiModal">Select</button>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="verifikasiModal" tabindex="-1" aria-labelledby="verifikasiModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="verifikasiModalLabel">Pilih Id Verifikasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group" id="verifikasiList">
                                @foreach ($salesOrder as $so)
                                @php
                                    $matchingVerifikasi = $verifikasi->where('id_do', $so->id_do)->first();
                                @endphp
                            
                                @if ($matchingVerifikasi)
                                    <li class="list-group-item verifikasi-item table-hover my-2"
                                        data-id-verifikasi="{{ $matchingVerifikasi->id_verifikasi }}">
                                        ID Verifikasi: {{ $matchingVerifikasi->id_verifikasi }} <br> ID Pembelian: {{ $matchingVerifikasi->id_do }}
                                    </li>
                                @endif
                            @endforeach
                            
                            
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary"  id="selectVerifikasiButton">Select SO</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-1">
                <label for="Data Validasi" class="input-group-text">Data Validasi</label>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group text-sm">
                                        <label for="tanggal_verifikasi" class="input-group-text">Tanggal Validasi</label>
                                        <input type="text" class="form-control" id="tanggal_verifikasi" placeholder="mm/dd/yyyy" value="" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="namaCustomer">Nama Customer</label>
                                        <input type="text" class="form-control" id="namaCust" placeholder="Nama Customer" value="{{old('nama')}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="gp">GP</label>
                                        <input type="text" class="form-control" id="gp" placeholder="Gp" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="ekor">Ekor</label>
                                        <input type="text" class="form-control" id="ekor" placeholder="No Hp"  readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="tanggalSO">Tanggal Pembelian</label>
                                        <input type="text" class="form-control" id="tanggalSo" placeholder="dd/mm/yy" value="{{old('tanggal_pembelian')}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="susut">Susut%</label>
                                        <input type="text" class="form-control" id="susut" placeholder="Kg" value="%" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="mati_susulan">Mati susulan</label>
                                        <input type="text" class="form-control" id="mati_susulan" placeholder="" value="" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="total_final_kg">Normal</label>
                                        <input type="text" class="form-control" id="normal" placeholder=""  readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="tonase_akhir">Tonase akhir</label>
                                        <input type="text" class="form-control" id="tonase_akhir" placeholder="" value="" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="gp_normal">GP + Normal</label>
                                        <input type="text" class="form-control" id="gp_normal" placeholder="" value="" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="gp_rp">GP(Rp)</label>
                                        <input type="text" class="form-control" id="gp_rp" placeholder="" value="" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="kg_susut">Kg Susut</label>
                                        <input type="text" class="form-control" id="kg_susut" placeholder="" value="" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="keterangan">Keterangan</label>
                                        <textarea type="text" class="form-control" id="keterangan" placeholder="" value="" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-0">
            <div class="col-12">
                
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-1">
                <label for="Data Payment" class="input-group-text">Data Payment</label>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="Harga Total">Harga Total</label>
                                        <input type="text" class="form-control" id="harga_total" name="harga_total" placeholder="Harga Total" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="jumlah_bayar">Jumlah Bayar</label>
                                        <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Bayar"  >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="bukti_bayar_penjualan">Bukti Bayar Penjualan</label>
                                            <input type="file" class="custom-file-input mt-2" id="bukti_bayar_penjualan" name="bukti_bayar_penjualan">
                                            <label class="custom-file-label" for="buktiBayarSO">
                                                <i class="fas fa-upload"></i> 
                                            </label>
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
                <div class="mb-3 mt-3">
                    <label for="keterangan" class="input-group-text">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
                </div>
            </div>
        </div>
        <input type="hidden" id="selectedSoId" value="">
        <input type="hidden" id="selectedVerifikasiId" value="">
        <input type="hidden" id="selectedIdSO" name="selectedIdSO">
        <button type="submit" class="btn btn-primary col-12">Input Payment Penjualan</button>
    </form>
</div>

<script>
    
document.addEventListener("DOMContentLoaded", function() {
    const verifikasiList = document.getElementById("verifikasiList");
    const selectVerifikasiButton = document.getElementById("selectVerifikasiButton");
    const selectedVerifikasiIdInput = document.getElementById("selectedVerifikasiId");
    const verifikasiModal = new bootstrap.Modal(document.getElementById('verifikasiModal'));
    
    const soList = document.getElementById("soList");
    const selectSoButton = document.getElementById("selectSoButton");
    const selectedSoIdInput = document.getElementById("selectedSoId");

    const normalInput = document.getElementById('normal');
    const hargaPerKgInput = document.getElementById('harga_kg');
    const hargaTotalInput = document.getElementById('harga_total');



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
    
  
  hargaTotalInput.addEventListener('input',searchSo)
  hargaTotalInput.addEventListener('input',searchVerifikasi)




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


    function displaySelectedVerifikasi() {
        const selectedVerifikasiId = selectedVerifikasiIdInput.value;

        if (selectedVerifikasiId !== "") {
            const selectedVerifikasiItem = document.querySelector(`[data-id-verifikasi="${selectedVerifikasiId}"]`);
            // const idDo = selectedVerifikasiItem.getAttribute("data-id-do");
            // ... ambil atribut lainnya jika perlu

            // Update input values
            document.getElementById('id_verifikasi').value = selectedVerifikasiId;
            // document.getElementById('idDo').value = idDo;

            // Remove the "selected" class from all items
            const allItems = soList.querySelectorAll(".verifikasi-item");
            allItems.forEach(item => item.classList.remove("selected"));

            // Add the "selected" class to the clicked item
            selectedVerifikasiItem.classList.add("selected");
        }
    }

    verifikasiList.addEventListener("click", function(event) {
        const listsItem = event.target.closest(".verifikasi-item");
        if (listsItem) {
            const idVerif = listsItem.getAttribute("data-id-verifikasi");

            // Set the selected SO ID and update the hidden input
            selectedVerifikasiIdInput.value = idVerif;

            // Remove the "selected" class from all items and add it to the clicked item
            const allItems = verifikasiList.querySelectorAll(".verifikasi-item");
            allItems.forEach(item => item.classList.remove("selected"));
            listsItem.classList.add("selected");
        }
    });

    selectVerifikasiButton.addEventListener("click", function() {
        displaySelectedVerifikasi();
        searchVerifikasi();
        $('#verifikasiModal').modal('hide');
    });

});




function searchVerifikasi() {
        var idVerifikasi = document.getElementById('id_verifikasi').value;

        if (idVerifikasi !== '') {
            fetch('/admin-table/get-verifikasi', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    id_verifikasi: idVerifikasi,
                }),
            })
            .then(response => response.json())
            .then(data => {
                // Autofill the customer information fields
                document.getElementById('tanggal_verifikasi').value = data.tanggal_verifikasi;
                document.getElementById('gp').value = data.gp;
                document.getElementById('gp_rp').value = data.gp_rp;
                document.getElementById('gp_normal').value = data.gp_normal;
                document.getElementById('kg_susut').value = data.kg_susut;
                document.getElementById('mati_susulan').value = data.mati_susulan;
                document.getElementById('ekor').value = data.ekor;
                document.getElementById('susut').value = data.susut;
                document.getElementById('normal').value = data.normal;
                document.getElementById('tonase_akhir').value = data.tonase_akhir;
                document.getElementById('keterangan').value = data.keterangan;
                document.getElementById('tanggalSo').value = data.tanggal_pembelian;
                document.getElementById('namaCust').value = data.nama;
                const hargaPerKgValue = parseFloat(document.getElementById('harga_kg').value);
                const theGps = data.gp * data.gp_rp
                const totalPlusTonase = hargaPerKgValue * data.tonase_akhir ;
                const hargaTotal = totalPlusTonase + theGps;
                document.getElementById('harga_total').value = hargaTotal;
                        
            // Mengisikan hasil perhitungan ke dalam input harga_total
                // document.getElementById('harga_total').value = hargaTotalSo.toFixed(2);
            
                // Mengisikan hasil perhitungan ke dalam input harga_total
                // document.getElementById('harga_total').value = hargaTotalVerifikasi.toFixed(2);
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
        fetch('/admin-table/get-so-infoJsonPaymentSo', {
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
            const tonaseAkhirValue = parseFloat(document.getElementById('tonase_akhir').value) || 0;
            const gpValue = parseFloat(document.getElementById('gp').value) || 0;
            const gpRpValue = parseFloat(document.getElementById('gp_rp').value) || 0;

            // Hitung total harga dengan mengalikan tonaseAkhirValue dengan hargaPerKg
            const hargaTotal = ( tonaseAkhirValue * (data.hargaPerKg || 0)) + (gpValue*gpRpValue);
            document.getElementById('harga_total').value = hargaTotal;
                        
            // Mengisikan hasil perhitungan ke dalam input harga_total
            document.getElementById('harga_total').value = hargaTotalSo.toFixed(2);
            // Now, use the retrieved customer ID to fetch customer data
            fetch('/admin-table/get-customer-infoJsonPaymentSo', {
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
