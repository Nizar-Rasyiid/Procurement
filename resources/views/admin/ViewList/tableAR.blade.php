@extends('admin.admin')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">FILTERS</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer_name">Nama Customer</label>
                            <input type="text" class="form-control border border-secondary" id="customer_name" placeholder="Nama Customer">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date">Tanggal</label>
                            <input type="date" class="form-control border border-secondary" id="date">
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_range">Range Tanggal</label>
                            <div class="input-group">
                                <input type="date" class="form-control border border-secondary" id="start_date">
                                <div class="input-group-append">
                                    <span class="input-group-text">to</span>
                                </div>
                                <input type="date" class="form-control border border-secondary" id="end_date">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control border border-secondary" id="status">
                                <option value="">-- Select Status --</option>
                                <option value="Pending">Pending</option>
                                <option value="Paid">Paid</option>
                                <option value="Overdue">Overdue</option>
                            </select>
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ar_actual">AR Actual</label>
                            <select class="form-control border border-secondary" id="ar_actual">
                                <option value="">-- Select AR Actual --</option>
                                <option value="AR1">AR1</option>
                                <option value="AR2">AR2</option>
                                <option value="AR3">AR3</option>
                            </select>
                        </div>
                    </div>
                </div>
        
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>ID AR Customer</th>
                            <th>ID Customer</th>
                            <th>ID Tanggal</th>
                            <th>Nama</th>
                            <th>Total Kg</th>
                            <th>Total Harga</th>
                            <th>Jumlah Bayar</th>
                            <th>Sisa Piutang</th>
                            <th>Durasi Piutang</th>
                            <th>AR Actual</th>
                            <th>Keterangan</th>
                            <th>Detail</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Use JavaScript or an AJAX request to fetch the filtered data and populate the table dynamically --}}
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>ID AR Customer</th>
                            <th>ID Customer</th>
                            <th>ID Tanggal</th>
                            <th>Nama</th>
                            <th>Total Kg</th>
                            <th>Total Harga</th>
                            <th>Jumlah Bayar</th>
                            <th>Sisa Piutang</th>
                            <th>Durasi Piutang</th>
                            <th>AR Actual</th>
                            <th>Keterangan</th>
                            <th>Detail</th>
                            <th>Download</th>
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
