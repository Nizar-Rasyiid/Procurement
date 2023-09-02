@extends('admin.admin')
@section('admin')
<div class="page-content">
    <div class="card">
        <div class="card-body filters">
            <h5 class="card-title">Filters</h5>
            <div class="row">
                <div class="col-md-6 my-1">
                    <div class="form-group">
                        <label for="id_so">ID Penjualan</label>
                        <input name="id_so" type="text" class="form-control border border-secondary" id="id_so" placeholder="ID Penjualan">
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <label for="Status">Status</label>
                    <input type="text" name="status" class="form-control border border-secondary" id="status" placeholder="Status">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 my-1">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="text" name="tanggal" class="form-control border border-secondary" id="tanggal" placeholder="tanggal">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3">
                    <a href="{{ route('downloadSalesOrder') }}" class="btn btn-danger btn-sm">
                        <i class="fas fa-file-csv"></i> Download CSV
                    </a>    
                </div>
                <div class="col text-end mt-3">
                    <button type="button" id="apply-filter" class="btn btn-danger btn-sm">Filter</button>
                </div>
            </div>
        </div>
    </div>
    <table id="filtered-data" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID Penjualan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Tipe Pemesanan</th>
                <th>Detail</th>
            </tr>
            {{-- <a href="{{url('/admin-table/storeCustomer')}}" class="btn btn-success btn-sm text-white">Tambah Admin</a> --}}
        </thead>
        <tbody>
            @foreach ($so as $item)
            <tr>
                <td>{{$item->id_so}}</td>
                <td>{{$item->tanggal}}</td>
                <td>
                    @if ($item->status == 0)
                        Belum Lunas
                      @else
                      Lunas
                    @endif  
                </td>
                <td>{{$item->order_type}}</td>
                <td>
                    <a href="{{ route('detailSo', $item->id) }}" class="btn btn-success text-white btn-sm">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot> 
            <tr>
                <th>ID Penjualan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Tipe Pemesanan</th>
                <th>Detail</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    <script>
    document.getElementById('applyFilter').addEventListener('click', function() {
        const id_so = document.getElementById('id_so').value;
        const status = document.getElementById('status').value;
        const tanggal = document.getElementById('tanggal').value;

        // Make an AJAX request to a Laravel route passing the filter criteria
        fetch(`/index?
            id_so= ${id_so}
            &status= ${status}
            &tanggal= ${tanggal}`)
            .then(response => response.json())
            .then(data => {
                // Update the DOM with the filtered data
                const filteredResults = document.getElementById('filtered-data');
                filteredResults.innerHTML = '';

                data.forEach(item => {
                    const resultItem = document.createElement('div');
                    resultItem.textContent = `id_so: ${item.id_so}, Status: ${item.status}, Tanggal: ${item.tanggal}`;
                    filteredResults.appendChild(resultItem);
                });
            });
    });

    // jQuery('.do-filter').click(function (e) {
    //     e.preventDefault();

    //     jQuery.post('/index', {
    //         _token: window.csrf_token,
    //         id_so: jQuery('input[name="id_so"]').val(),
    //         status: jQuery('input[name="status"]').val(),
    //         tanggal: jQuery('input[name="tanggal"]').val()
    //     }, function (item) {
    //         var $tableBody = jQuery('#filtered-data tbody');
    //         $tableBody.html('');
            
    //         jQuery.each(item, function (i) {
    //             $tableBody.append(
    //                 '<tr>' +
    //                     '<td>' + item[i].id_so + '</td>' +
    //                     '<td>' + item[i].status + '</td>' +
    //                     '<td>' + item[i].tanggal + '</td>' +
    //                 '</tr>'
    //             ); 
    //         });
    //     }, 'json');
    // })
</script>

@endsection