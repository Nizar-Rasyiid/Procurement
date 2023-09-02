@extends('admin.admin')
@section('admin')
<style>
    .do-item.selected {
    border: 2px solid blue;
}
.do-item:hover {
    border: 2px solid blue; /* Misalnya, border biru saat diklik */
    /* Tambahkan gaya lain sesuai kebutuhan Anda */
}
</style>
    <div class="page-content">
        <form action="{{ url('/admin-table/store-verifikasi') }}" method="POST" class="px-5">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="input-group">
                        <span for="id_do" class="input-group-text">ID Pembelian</span>
                            <input type="text" class="form-control border border-secondary" id="id_do" name="id_do" data-bs-toggle="modal" data-bs-target="#doModal" required readonly>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#doModal">Search</button>
                        </div>
                    </div>
                </div>
                            <!-- Modal -->
                            <div class="modal fade" id="doModal" tabindex="-1" aria-labelledby="doModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="doModalLabel">Pilih Id Pembelian</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="list-group" id="doList">
                                                <!-- Customer items will be added here -->
                                                @foreach ($deliveryOrder as $do)
                                                {{-- @if ($do->status == 1 && $do->id_verifikasi == null) --}}
                                                <li class="list-group-item do-item table-hover btn my-2"
                                                data-id="{{ $do->id_do }}"
                                                data-tanggal="{{ $do->tanggal_pembelian }}"
                                                data-kandang="{{ $do->kandang }}"
                                                data-keterangan="{{ $do->keterangan }}"
                                                data-solar="{{ $do->solar }}"
                                                data-etoll="{{ $do->etoll }}"
                                                data-harga-per-kg="{{ $do->hargaPerKg }}"
                                                data-uang-jalan="{{ $do->uang_jalan }}"
                                                data-uang-tangkap="{{ $do->uang_tangkap }}"
                                                data-total-ekor="{{ $do->total_ekor }}"
                                                data-total-kg="{{ $do->total_kg }}"
                                                data-nomor-kendaraan="{{ $do->nomor_kendaraan }}"
                                                data-nama-supir="{{ $do->nama_supir }}"
                                                data-nomor-sim="{{ $do->nomor_sim }}"
                                            >
                                                ID Pembelian: {{ $do->id_do }} <br> Keterangan: {{ $do->keterangan }}
                                            </li>
                                                {{-- @endif --}}
                                            
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary"  id="selectDoButton">Select DO</button>
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
                                        <div class="input-group">
                                            <label class="input-group-text" for="tanggalDo">Tanggal DO</label>
                                            <input type="text" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" placeholder="dd/mm/yy" value="dd/mm/yy" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label class="input-group-text" for="kandang">Kandang</label>
                                        <input type="text" class="form-control" id="kandang" name="kandang" placeholder="kandang" value="kandang" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label class="input-group-text" for="No Kendaraan">No Kendaraan</label>
                                        <input type="text" class="form-control" id="nomor_kendaraan" name="nomor_kendaraan" placeholder="No Kendaraan" value="No Kendaraan" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                       <div class="input-group">
                                         <label class="input-group-text" for="Nama Supir">Nama Supir</label>
                                        <input type="text" class="form-control" id="nama_supir" name="nama_supir" placeholder="Nama Supir" value="Nama Supir" readonly>
                                       </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                       <div class="input-group">
                                         <label class="input-group-text" for="No SIM">No SIM</label>
                                        <input type="text" class="form-control" id="nomor_sim" name="nomor_sim" placeholder="No SIM" value="No SIM" readonly>
                                       </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label class="input-group-text" for="Total Ekor">Total Ekor</label>
                                            <input type="text" class="form-control" id="total_ekor" name="total_ekor" placeholder="Total Ekor" value="Total Ekor" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label class="input-group-text" for="Total Kg">Total Kg</label>
                                        <input type="text" class="form-control" id="total_kg" name="total_kg" placeholder="Total Kg" value="Total Kg" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label class="input-group-text" for="Harga/Kg">Harga/Kg</label>
                                        <input type="text" class="form-control" id="hargaPerKg" name="hargaPerKg" placeholder="Harga/Kg" value="Harga/Kg" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label class="input-group-text" for="Harga/Kg">Uang jalan</label>
                                        <input type="text" class="form-control" id="uang_jalan" name="uang_jalan" placeholder="Harga/Kg" value="uang jalan" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label class="input-group-text" for="Harga/Kg">Uang Tangkap</label>
                                        <input type="text" class="form-control" id="uang_tangkap" name="uang_tangkap" placeholder="Harga/Kg" value="uang tangkap" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label class="input-group-text" for="Harga/Kg">Solar</label>
                                        <input type="text" class="form-control" id="solar" name="solar" placeholder="Solar" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label class="input-group-text" for="Harga/Kg">Etoll</label>
                                        <input type="text" class="form-control" id="etoll" name="etoll" placeholder="Etoll"  readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="form-group">
                                        <label for="Keterangan">Keterangan</label>
                                        <textarea type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="Keterangan" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
            <span for="Data Verifikasi" class="input-group-text">Data Verifikasi</span>
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="tanggal" class="">
                                    <i class="fas fa-calendar-alt" style="color: white;"></i> Tanggal Verifikasi
                                </span>
                                <input type="date" class="form-control border border-secondary" name="tanggal_verifikasi" placeholder="Tanggal">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Total Final Kg" class="">Normal</span>
                                <input type="text" class="form-control border border-secondary" id="normal" name="normal" placeholder="Normal">
                            </div>

                        </div>
                        {{-- <div class="col-6">
                            <div class="mb-3">
                                <span for="Total Kg Tiba" class="">Total Kg Tiba</span> --}}
                                <input type="hidden" class="form-control border border-secondary" name="total_kg_tiba"  value=1>
                                <input type="hidden" class="form-control border border-secondary" name="kg"  value=1>
                            {{-- </div> --}}
                        {{-- </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Gp" class="">Gp</span>
                                <input type="text" class="form-control border border-secondary" name="gp" id="gp" placeholder="Gp">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="GP + Normal">GP + Normal</span>
                                <input type="text" class="form-control border border-secondary h-" name="gp_normal" id="gpNormal" placeholder="GP + Normal" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Gp(Rp)" class="">Gp (Rp)</span>
                                <input type="text" class="form-control border border-secondary" name="gp_rp" placeholder="Gp (Rp)">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Susut %" class="">Susut %</span>
                                <input type="text" class="form-control border border-secondary" name="susut" id="susut" placeholder="Susut %" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Ekor" class="">Ekor</span>
                                <input type="text" class="form-control border border-secondary" name="ekor" placeholder="Ekor">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Kg Susut" c>Kg Susut</span>
                                <input type="text" class="form-control border border-secondary h-" name="kg_susut" id="kg_susut" placeholder="Kg Susut" readonly>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Mati Susulan" class="">Mati Susulan</span>
                                <input type="text" class="form-control border border-secondary" name="mati_susulan" id="mati_susulan" placeholder="Mati Susulan">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Tonase Akhir" class=" ">Tonase Akhir</span>
                                <input type="text" class="form-control border border-secondary h-" name="tonase_akhir" id="tonase_akhir" placeholder="Tonase Akhir" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="row">
    

                        <div class="col-12">
                            <div class="mb-3">
                                <span for="keterangan" class="w-25">Keterangan</span>
                                <textarea class="form-control border border-secondary h-25" name="keterangan" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
            <input type="hidden" id="selectedDoId" value="">
            <button type="submit" class="btn btn-primary w-100">Input Verifikasi DO</button>
        </form>
    </div>

    <script>

document.addEventListener("DOMContentLoaded", function() {
    const selectDoButton = document.getElementById("selectDoButton");
    const selectedDoIdInput = document.getElementById("selectedDoId")

        const doList = document.getElementById("doList");
        const idDoInput = document.getElementById("id_do");
        const namaSupirInput = document.getElementById("nama_supir");
        const tanggalDoInput = document.getElementById("tanggal_pembelian");
        const kandangInput = document.getElementById("kandang");
        const keteranganInput = document.getElementById("keterangan");
        const solarInput = document.getElementById("solar");
        const etollInput = document.getElementById("etoll");
        const hargaPerKgInput = document.getElementById("hargaPerKg");
        const uangJalanInput = document.getElementById("uang_jalan");
        const uangTangkapInput = document.getElementById("uang_tangkap");
        const totalEkorInput = document.getElementById("total_ekor");
        const totalKgInput = document.getElementById("total_kg");
        const nomorKendaraanInput = document.getElementById("nomor_kendaraan");
        const nomorSimInput = document.getElementById("nomor_sim");

        
    function displaySelectedDo() {
        const selectedDoId = selectedDoIdInput.value;

        if (selectedDoId !== "") {
            const selectedDoItem = document.querySelector(`[data-id="${selectedDoId}"]`);
            // const idDo = selectedVerifikasiItem.getAttribute("data-id-do");
            // ... ambil atribut lainnya jika perlu

            // Update input values
            document.getElementById('id_do').value = selectedDoId;
            // document.getElementById('idDo').value = idDo;

            // Remove the "selected" class from all items
            const allItems = doList.querySelectorAll(".do-item");
            allItems.forEach(item => item.classList.remove("selected"));

            // Add the "selected" class to the clicked item
            selectedDoItem.classList.add("selected");
        }
    }

    doList.addEventListener("click", function(event) {
        const listsItem = event.target.closest(".do-item");
        if (listsItem) {
            const idVerif = listsItem.getAttribute("data-id");

            // Set the selected SO ID and update the hidden input
            selectedDoIdInput.value = idVerif;

            // Remove the "selected" class from all items and add it to the clicked item
            const allItems = doList.querySelectorAll(".do-item");
            allItems.forEach(item => item.classList.remove("selected"));
            listsItem.classList.add("selected");
        }
    });

    selectDoButton.addEventListener("click", function() {
        displaySelectedDo();
        searchDo();

        $('#doModal').modal('hide');
    });

    });


    const gpInput = document.getElementById('gp');
    const matiSusulanInput = document.getElementById('mati_susulan');
    const tonaseAkhirInput = document.getElementById('tonase_akhir');  
    const normalInput = document.getElementById('normal');
    const normalPlusGpInput = document.getElementById('gpNormal');
    const kgSusut = document.getElementById('kg_susut');
    const susut = document.getElementById('susut');

// Normal + GP
    gpInput.addEventListener('input',updateNormalGp);
    normalInput.addEventListener('input',updateNormalGp);
// Tonase Akhir
    normalInput.addEventListener('input', updateTonaseAkhir);
    matiSusulanInput.addEventListener('input', updateTonaseAkhir);

//KG Susut
    // normalInput.addEventListener('input',searchDo)
    normalPlusGpInput.addEventListener('input',searchDo)
    gpInput.addEventListener('input',searchDo);

// Susut
    normalInput.addEventListener('input',searchDo)

    function updateTonaseAkhir() {
       const normalValue = parseInt(normalInput.value) || 0 
       const matiSusulanValue = parseInt(matiSusulanInput.value) || 0 
       
        const tonaseAkhirValue = normalValue - matiSusulanValue;

        tonaseAkhirInput.value = tonaseAkhirValue;
    }


    function updateNormalGp() {
        const gpValue = parseInt(gpInput.value) || 0;
        const normalValue = parseInt(normalInput.value) || 0;

        const normalPlusGpValue = gpValue + normalValue;

        normalPlusGpInput.value = normalPlusGpValue;

    }

        function searchDo() {
         var idDo = document.getElementById('id_do').value;
         const normalValue = parseInt(normalInput.value) || 0;
         const normalGpValue = parseInt(normalPlusGpInput.value) || 0;
         const gpValue = parseInt(gpInput.value) || 0;


            if (idDo !== '') {
                fetch('/admin-table/get-do-json', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        id_do: idDo,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    const kgSusutValue = data.total_kg - normalGpValue;

                    // Autofill the customer information fields
                    document.getElementById('tanggal_pembelian').value = data.tanggal_pembelian;
                    document.getElementById('kandang').value = data.kandang;
                    document.getElementById('nama_supir').value = data.nama_supir;
                    document.getElementById('nomor_kendaraan').value = data.nomor_kendaraan;
                    document.getElementById('nomor_sim').value = data.nomor_sim;
                    document.getElementById('hargaPerKg').value = data.hargaPerKg;
                    document.getElementById('keterangan').value = data.keterangan;
                    document.getElementById('total_ekor').value = data.total_ekor;
                    document.getElementById('total_kg').value = data.total_kg;
                    document.getElementById('etoll').value = data.etoll;
                    document.getElementById('solar').value = data.solar;
                    document.getElementById('uang_jalan').value = data.uang_jalan;
                    document.getElementById('uang_tangkap').value = data.uang_tangkap;
                    document.getElementById('kg_susut').value =kgSusutValue;
                    document.getElementById('susut').value = normalValue / data.total_kg

                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }
    </script>

@endsection
