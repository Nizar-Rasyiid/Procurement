@extends('admin.admin')
@section('admin')
    <div class="page-content">
        <form action="{{ url('/admin-table/store-verifikasi') }}" method="POST" class="px-5">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="input-group">
                        <span for="id_do" class="input-group-text">ID Pembelian</span>
                            <input type="text" class="form-control" id="id_do" name="id_do" required>
                            <button type="button" class="btn btn-primary" onclick="searchDo()">Select</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card my-1">
                        <span class="input-group-text">Data Pembelian</span>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tanggalDo">Tanggal Pembelian</label>
                                        <input type="text" class="form-control" id="tanggalDo" placeholder="dd/mm/yy" value="dd/mm/yy" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="kandang">Kandang</label>
                                        <input type="text" class="form-control" id="kandang_do" placeholder="kandang"  readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="No Kendaraan">No Kendaraan</label>
                                        <input type="text" class="form-control" id="nomor_kendaraan" placeholder="No Kendaraan"  readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="Nama Supir">Nama Supir</label>
                                        <input type="text" class="form-control" id="nama_supir" placeholder="Nama Supir"  readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="No SIM">No SIM</label>
                                        <input type="text" class="form-control" id="nomor_sim" placeholder="No SIM"  readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="Total Ekor">Total Ekor</label>
                                        <input type="text" class="form-control" id="total_ekor" placeholder="Total Ekor"  readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="Total Kg">Total Kg</label>
                                        <input type="text" class="form-control" id="total_kg" placeholder="Total Kg"  readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="Harga/Kg">Harga/Kg</label>
                                        <input type="text" class="form-control" id="hargaPerKg" placeholder="Harga/Kg"  readonly>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="form-group">
                                        <label for="Keterangan">Keterangan</label>
                                        <textarea type="text" class="form-control" id="keterangan" placeholder="Keterangan" readonly></textarea>
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
                                <span for="Total Kg Tiba" class="">Total Kg Tiba</span>
                                <input type="text" class="form-control border border-secondary" name="total_kg_tiba" placeholder="Total Kg Tiba">
                            </div>
                        </div>
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
                                <span for="Total Final Kg" class="">Normal</span>
                                <input type="text" class="form-control border border-secondary" id="normal" name="normal" placeholder="Normal">
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
                                <span for="GP + Normal">GP + Normal</span>
                                <input type="text" class="form-control border border-secondary h-" name="gp_normal" id="gpNormal" placeholder="GP + Normal" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Kg" class="">Kg</span>
                                <input type="text" class="form-control border border-secondary" name="kg" placeholder="Kg">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Susut %" class="">Susut %</span>
                                <input type="text" class="form-control border border-secondary" name="susut" id="susut" placeholder="Susut %">
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
                                <span for="Ekor" class="">Ekor</span>
                                <input type="text" class="form-control border border-secondary" name="ekor" placeholder="Ekor">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Tonase Akhir" class=" ">Tonase Akhir</span>
                                <input type="text" class="form-control border border-secondary h-" name="tonase_akhir" id="tonase_akhir" placeholder="Tonase Akhir" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Kg Susut">Kg Susut</span>
                                <input type="text" class="form-control border border-secondary h-" name="kg_susut" id="kg_susut" placeholder="Kg Susut" readonly>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="keterangan" class="w-25">Keterangan</span>
                                <textarea class="form-control border border-secondary h-25" name="keterangan" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Input Verifikasi DO</button>
        </form>
    </div>

    <script>


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
    gpInput.addEventListener('input', updateTonaseAkhir);
    matiSusulanInput.addEventListener('input', updateTonaseAkhir);

//KG Susut
    normalInput.addEventListener('input',searchDo)

// Susut
    normalInput.addEventListener('input',searchDo)

    function updateTonaseAkhir() {
       const gpValue = parseInt(gpInput.value) || 0 
       const matiSusulanValue = parseInt(matiSusulanInput.value) || 0 
       
        const tonaseAkhirValue = gpValue - matiSusulanValue;

        tonaseAkhirInput.value = tonaseAkhirValue;
    }


    function updateNormalGp() {
        const gpValue = parseInt(gpInput.value) || 0;
        const normalValue = parseInt(normalInput.value) || 0;

        const normalPlusGpValue = gpValue + normalValue;

        normalPlusGpInput.value = normalPlusGpValue;

    }

        function searchDo() {
         var idSuplier = document.getElementById('id_do').value;
         const normalValue = parseInt(normalInput.value) || 0;


            if (idSuplier !== '') {
                fetch('/admin-table/get-do-json', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        id_do: id_do,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    // Autofill the customer information fields
                    document.getElementById('tanggalDo').value = data.tanggal_pembelian;
                    document.getElementById('kandang_do').value = data.kandang;
                    document.getElementById('nama_supir').value = data.nama_supir;
                    document.getElementById('nomor_kendaraan').value = data.nomor_kendaraan;
                    document.getElementById('nomor_sim').value = data.nomor_sim;
                    document.getElementById('hargaPerKg').value = data.hargaPerKg;
                    document.getElementById('keterangan').value = data.keterangan;
                    document.getElementById('total_ekor').value = data.total_ekor;
                    document.getElementById('total_kg').value = data.total_kg;

                    //Kg susut Value
                    document.getElementById('kg_susut').value = data.total_kg - normalValue
                    document.getElementById('susut').value = normalValue / data.total_kg

                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }
    </script>

@endsection
