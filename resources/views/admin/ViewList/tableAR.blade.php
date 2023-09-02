@extends('admin.admin')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body ">
                <h5 class="card-title">Filters</h5>
                <div class="row">
                    <div class="col-md-6 my-1">
                        <div class="form-group">
                            <label for="id_do">ID Pembelian</label>
                            <div class="input-group">
                                <input type="text" class="form-control border border-secondary" id="id_do" placeholder="ID Pembelian">
                                <button id="applyFilterIdDo" class="btn btn-primary btn-sm">Apply</button>   
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 my-1">
                        <label for="status">Status</label>
                        <div class="input-group">
                            <select class="form-control border border-secondary" id="status">
                                <option value="">-- Pilih Status --</option>
                                <option value="lunas">Lunas</option>
                                <option value="belum lunas">Belum Lunas</option>
                            </select>
                            <button id="applyFilterStatus" class="btn btn-primary btn-sm">Apply</button>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6 my-1">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <div class="input-group">
                                <input type="date" class="form-control border border-secondary" id="tanggal" placeholder="Tanggal">
                                <button id="applyFilterTanggal" class="btn btn-primary btn-sm">Apply</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_range">Range Tanggal</label>
                            <div class="input-group">
                                <input type="date" class="form-control border border-secondary" id="start_date">
                                <div class="input-group-append">
                                    <span class="input-group-text">to</span>
                                </div>
                                <input type="date" class="form-control border border-secondary" id="end_date">
                                <button id="applyFilterRangeTanggal" class="btn btn-primary btn-sm">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="text-end mt-3">
                        <a href="{{ route('downloadDeliveryOrder') }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-file-csv"></i> Download CSV
                        </a>    
                        <button id="resetFilter" class="btn btn-secondary btn-sm">
                            Reset Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Verifikasi</th>
                            <th>Tanggal</th>
                            <th>Harga/Kg</th>
                            <th>Total Kg</th>
                            <th>Harga/Kg</th>
                            <th>Total Harga Do</th>
                            <th>Total Payment Do</th>
                            <th>Status Pembayaran</th>
                            <th>Keterangan</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ar as $item)
                        <tr>
                            <td>{{$item->id_payment_order}}</td>
                            <td>{{$item->id_do}}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_pembelian)->format('m-d-Y') }}</td>
                            <td>
                                {{$item->total_kg}}
                            </td>
                            <td>
                                {{$item->harga_kg}}
                            </td>
                            <td>
                                {{$item->total_harga_do}}
                            </td>
                            <td>
                                {{$item->total_bayar}}
                            </td>   
                            <td>
                                @if ($item->status_pembelian == 0)
                                Belum Lunas
                            @else
                              Lunas
                            @endif  
                            </td>
                            <td>
                                {{$item->keterangan}}
                            </td>
                            <td>
                                <a href="{{ route('detailDo', $item->id) }}" class="btn btn-success text-white btn-sm">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID Pembayaran</th>
                            <th>ID Pembelian</th>
                            <th>Tanggal</th>
                            <th>Total Kg</th>
                            <th>Harga/Kg</th>
                            <th>Total Harga Do</th>
                            <th>Total Payment Do</th>
                            <th>Status Pembayaran</th>
                            <th>Keterangan</th>
                            <th>Detail</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>
</div>

<script>
    // Add event listeners for filter elements
    document.getElementById('customer_name').addEventListener('input', applyFilters);
    document.getElementById('date').addEventListener('change', applyFilters);
    document.getElementById('start_date').addEventListener('change', applyFilters);
    document.getElementById('end_date').addEventListener('change', applyFilters);
    document.getElementById('status').addEventListener('change', applyFilters);
    document.getElementById('ar_actual').addEventListener('change', applyFilters);

    // Function to apply filters and fetch filtered data
    function applyFilters() {
        // Get filter values
        var customerName = document.getElementById('customer_name').value;
        var date = document.getElementById('date').value;
        var startDate = document.getElementById('start_date').value;
        var endDate = document.getElementById('end_date').value;
        var status = document.getElementById('status').value;
        var arActual = document.getElementById('ar_actual').value;

        // Use JavaScript or an AJAX request to fetch the filtered data based on the filter values
        // Populate the table dynamically with the filtered data
    }
</script>
@endsection
