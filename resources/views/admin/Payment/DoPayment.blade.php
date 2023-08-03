@extends('admin.admin')
@section('admin')
<div class="page-content">
    <form action="{{ url('/admin-table/payment-do') }}" method="POST" class="d-flex flex-column px-5  mt-0">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <div class="input-group">
                    <span for="id_do" class="input-group-text">ID Pemesanan</span>
                        <input type="text" class="form-control" id="id_do" name="id_do" required>
                        <button type="button" class="btn btn-primary" onclick="searchDo()">Select</button>
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
                                    <input type="text" class="form-control" id="solar" name="solar" placeholder="Harga/Kg" value="Harga/Kg" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 my-2">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="Harga/Kg">Etoll</label>
                                    <input type="text" class="form-control" id="etoll" name="etoll" placeholder="Harga/Kg" value="Harga/Kg" readonly>
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
                                    <input type="text" class="form-control" id="harga_total" name="harga_total" placeholder="Harga Total">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="TotalBayar">Total Bayar</label>
                                    <input type="text" class="form-control" id="total_bayar" name="total_bayar" placeholder="Total Bayar">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="buktiBayarSO">Bukti Bayar Penjualan</label>
                                        <input type="file" class="custom-file-input mt-2" id="bukti_bayar" name="bukti_bayar">
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
