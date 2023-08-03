@extends('admin.admin')
@section('admin')
<div class="page-content">
    <form action="{{ url('/admin-table/store-payment-so') }}" method="POST" class="px-5 column-flex ">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <div class="input-group">
                    <span for="id_so" class="input-group-text">ID Penjualan</span>
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
                                        <input type="text" class="form-control" id="harga_kg" placeholder="Rp" value="" readonly>
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
                        <input type="text" class="form-control" id="id_verifikasi" name="id_verifikasi" required>
                        <button type="button" class="btn btn-primary" onclick="searchVerifikasi()">Select</button>
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
                                        <input type="text" class="form-control" id="namaCustomer" placeholder="Nama" value="Nama" readonly>
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
                                        <label class="input-group-text" for="tanggalSO">Tanggal Penjualan</label>
                                        <input type="text" class="form-control" id="tanggalSO" placeholder="dd/mm/yy" value="{{old('tanggal_pembelian')}}" readonly>
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
                                        <label class="input-group-text" for="total_final_kg">Total Final KG</label>
                                        <input type="text" class="form-control" id="normal" placeholder="" value="" readonly>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="input-group-text" for="jumlah_bayar">Jumlah Bayar</label>
                                        <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Bayar"  >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
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
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary col-12">Input Payment Penjualan</button>
    </form>
</div>

<script>

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
                    id_verifikasi: id_verifikasi,
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
                document.getElementById('tanggalSO').value = data.tanggal_pembelian;
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
