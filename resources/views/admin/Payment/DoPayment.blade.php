@extends('admin.admin')
@section('admin')
<div class="page-content">
    <form action="{{ url('/admin-table/payment-do') }}" enctype="multipart/form-data" method="POST" class="d-flex flex-column px-5  mt-0">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <div class="input-group">
                    <span for="id_do" class="input-group-text">ID Pembelian</span>
                        <input type="text" class="form-control border border-secondary" id="id_do" name="id_do" required readonly>
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
                                            @if ($do->status == 0)
                                            <li class="list-group-item customer-item table-hover btn my-2"
                                            data-id="{{ $do->id_do }}"
                                            data-tanggal="{{ $do->tanggal_pembelian }}"
                                            data-kandang="{{ $do->kandang }}"
                                            data-keterangan="{{ $do->keterangan }}"
                                            data-solar="{{ $do->solar }}"
                                            data-etoll="{{ $do->etoll }}"
                                            data-uang-jalan="{{ $do->uang_jalan }}"
                                            data-uang-tangkap="{{ $do->uang_tangkap }}"
                                            data-total-ekor="{{ $do->total_ekor }}"
                                            data-total-kg="{{ $do->total_kg }}"
                                            data-nomor-kendaraan="{{ $do->nomor_kendaraan }}"
                                            data-nama-supir="{{ $do->nama_supir }}"
                                            data-nomor-sim="{{ $do->nomor_sim }}"
                                            data-harga-per-kg="{{$do->hargaPerKg}}"
                                        >
                                            
                                            ID Pembelian: {{ $do->id_do }} <br> Keterangan: {{ $do->keterangan }} <br> 
                                                @if ($do->status == 0)
                                                 Status:  Belum Lunas
                                                
                                                    
                                                @endif
                                        </li> 
                                            @endif

                                        
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
                                    <input type="text" class="form-control" id="hargaPk" name="hargaPerKg" placeholder="Harga/Kg" value="Harga/Kg" readonly>
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
                                        <label class="input-group-text" for="Solar">Solar</label>
                                    <input type="text" class="form-control" id="solar" name="solar" placeholder="Solar" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="Etoll">Etoll</label>
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
        <div class="row">
            <div class="col-12">
                <div class="card mt-3 mb-3">
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
                                        <label class="input-group-text" for="TotalBayar">Total Bayar</label>
                                    <input type="text" class="form-control" id="total_bayar" name="total_bayar" placeholder="Total Bayar" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="buktiBayarSO">Bukti Bayar Penjualan</label>
                                        <input type="file" class="custom-file-input mt-2" id="bukti_bayar" name="bukti_bayar" required>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Input Payment DO</button>
    </form>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const doList = document.getElementById("doList");
    const idDoInput = document.getElementById("id_do");
    const namaSupirInput = document.getElementById("nama_supir");
    const tanggalDoInput = document.getElementById("tanggal_pembelian");
    const kandangInput = document.getElementById("kandang");
    const keteranganInput = document.getElementById("keterangan");
    const solarInput = document.getElementById("solar");
    const etollInput = document.getElementById("etoll");
    const hargaPerKgInput = document.getElementById("hargaPk");
    const uangJalanInput = document.getElementById("uang_jalan");
    const uangTangkapInput = document.getElementById("uang_tangkap");
    const totalEkorInput = document.getElementById("total_ekor");
    const totalKgInput = document.getElementById("total_kg");
    const nomorKendaraanInput = document.getElementById("nomor_kendaraan");
    const nomorSimInput = document.getElementById("nomor_sim");
    const hargaTotalInput = document.getElementById("harga_total"); // Tambahkan ini

    doList.addEventListener("click", function(event) {
        const listItem = event.target;
        const id = listItem.getAttribute("data-id");
        const namaSupir = listItem.getAttribute("data-nama-supir");
        const tanggal = listItem.getAttribute("data-tanggal");
        const kandang = listItem.getAttribute("data-kandang");
        const keterangan = listItem.getAttribute("data-keterangan");
        const solar = listItem.getAttribute("data-solar");
        const etoll = listItem.getAttribute("data-etoll");
        const hargaPerKg = parseFloat(listItem.getAttribute("data-harga-per-kg")); // Ubah menjadi float
        const uangJalan = listItem.getAttribute("data-uang-jalan");
        const uangTangkap = listItem.getAttribute("data-uang-tangkap");
        const totalEkor = listItem.getAttribute("data-total-ekor");
        const totalKg = parseFloat(listItem.getAttribute("data-total-kg")); // Ubah menjadi float
        const nomorKendaraan = listItem.getAttribute("data-nomor-kendaraan");
        const nomorSim = listItem.getAttribute("data-nomor-sim");

        idDoInput.value = id;
        nomorSimInput.value = nomorSim;
        nomorKendaraanInput.value = nomorKendaraan;
        namaSupirInput.value = namaSupir;
        tanggalDoInput.value = tanggal;
        kandangInput.value = kandang;
        keteranganInput.value = keterangan;
        etollInput.value = etoll;
        uangJalanInput.value = uangJalan;
        uangTangkapInput.value = uangTangkap;
        solarInput.value = solar;
        hargaPerKgInput.value = hargaPerKg;
        totalEkorInput.value = totalEkor;
        totalKgInput.value = totalKg;

        // Hitung total harga dan masukkan ke input harga_total
        const totalHarga = hargaPerKg * totalKg;
        if (!isNaN(totalHarga)) {
            hargaTotalInput.value = totalHarga.toFixed(2);
        }

        $('#doModal').modal('hide'); // Tutup modal
    });

    // Fungsi perhitungan total harga
    function calculateTotalPrice() {
        const totalKg = parseFloat(totalKgInput.value);
        const hargaPerKg = parseFloat(hargaPerKgInput.value);

        const hargaTotal = totalKg * hargaPerKg;
        if (!isNaN(hargaTotal)) {
            hargaTotalInput.value = hargaTotal.toFixed(2);
        }
    }

    // Panggil fungsi perhitungan saat nilai total kg atau harga per kg berubah
    totalKgInput.addEventListener("input", calculateTotalPrice);
    hargaPerKgInput.addEventListener("input", calculateTotalPrice);
});

    function searchDo() {
        var idDo = document.getElementById('id_do').value;

        if (idDo !== '') {
            fetch('/admin-table/get-do-infoJson', {
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
                // Autofill the customer information fields
                document.getElementById('tanggal_pembelian').value = data.tanggal_pembelian;
                document.getElementById('kandang').value = data.kandang;
                document.getElementById('nomor_kendaraan').value = data.nomor_kendaraan;
                document.getElementById('nama_supir').value = data.nama_supir;
                document.getElementById('nomor_sim').value = data.nomor_sim;
                document.getElementById('total_ekor').value = data.total_ekor;
                document.getElementById('total_kg').value = data.total_kg;
                document.getElementById('hargaPerKg').value = data.hargaPerKg;
                document.getElementById('uang_jalan').value = data.uang_jalan;
                document.getElementById('uang_tangkap').value = data.uang_tangkap;
                document.getElementById('solar').value = data.solar;
                document.getElementById('etoll').value = data.etoll;
                document.getElementById('keterangan').value = data.keterangan;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }
</script>
@endsection
