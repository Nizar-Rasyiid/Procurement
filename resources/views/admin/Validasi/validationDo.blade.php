@extends('admin.admin')
@section('admin')
    <div class="page-content">
        <form action="{{ url('/admin-table/storeSuplier') }}" method="POST" class="px-5">
            @csrf
            <div class="row my-1">
                <div class="col-12">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <div class="input-group">
                        <span for="id_so" class="input-group-text">ID Pembelian</span>
                            <input type="text" class="form-control" id="id_so" name="id_so" required>
                            <button type="search" class="btn btn-primary">Select</button>
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
                                        <input type="text" class="form-control" id="kandang" placeholder="kandang" value="kandang" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="No Kendaraan">No Kendaraan</label>
                                        <input type="text" class="form-control" id="No Kendaraan" placeholder="No Kendaraan" value="No Kendaraan" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="Nama Supir">Nama Supir</label>
                                        <input type="text" class="form-control" id="Nama Supir" placeholder="Nama Supir" value="Nama Supir" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="No SIM">No SIM</label>
                                        <input type="text" class="form-control" id="No SIM" placeholder="No SIM" value="No SIM" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="Total Ekor">Total Ekor</label>
                                        <input type="text" class="form-control" id="Total Ekor" placeholder="Total Ekor" value="Total Ekor" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="Total Kg">Total Kg</label>
                                        <input type="text" class="form-control" id="Total Kg" placeholder="Total Kg" value="Total Kg" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2">
                                    <div class="form-group">
                                        <label for="Harga/Kg">Harga/Kg</label>
                                        <input type="text" class="form-control" id="Harga/Kg" placeholder="Harga/Kg" value="Harga/Kg" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="form-group">
                                        <label for="Keterangan">Keterangan</label>
                                        <textarea type="text" class="form-control" id="Keterangan" placeholder="Keterangan" value="Keterangan" readonly></textarea>
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
                                <input type="date" class="form-control border border-secondary" id="tanggal" placeholder="Tanggal">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Total Kg Tiba" class="">Total Kg Tiba</span>
                                <input type="text" class="form-control border border-secondary" id="Total Kg Tiba" placeholder="Total Kg Tiba">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Gp" class="">Gp</span>
                                <input type="text" class="form-control border border-secondary" id="Gp" placeholder="Gp">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Ekor" class="">Ekor</span>
                                <input type="text" class="form-control border border-secondary" id="Ekor" placeholder="Ekor">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Kg" class="">Kg</span>
                                <input type="text" class="form-control border border-secondary" id="Kg" placeholder="Kg">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Susut %" class="">Susut %</span>
                                <input type="text" class="form-control border border-secondary" id="Susut %" placeholder="Susut %">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Mati Susulan" class="">Mati Susulan</span>
                                <input type="text" class="form-control border border-secondary" id="Mati Susulan" placeholder="Mati Susulan">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Total Final Kg" class="">Total Final Kg</span>
                                <input type="text" class="form-control border border-secondary" id="Total Final Kg" placeholder="Total Final Kg">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="Tonase Akhir" class=" ">Tonase Akhir</span>
                                <input type="text" class="form-control border border-secondary h-" id="Tonase Akhir" placeholder="Tonase Akhir">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <span for="keterangan" class="w-25">Keterangan</span>
                                <textarea class="form-control border border-secondary h-25" id="keterangan" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Input Verifikasi DO</button>
        </form>
    </div>
@endsection
