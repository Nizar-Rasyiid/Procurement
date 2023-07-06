@extends('admin.admin')
@section('admin')
    <div class="page-content">
        <form action="{{ url('/admin-table/storeSuplier') }}" method="POST">
            @csrf
            <div class="my-3">
              <label for="id_so" class="form-label">ID SO</label>
              <input type="text" class="form-control" id="id_so" name="id_so" required>
              <label for="id_customer" class="form-label">ID Customer</label>
              <input type="text" class="form-control" id="id_customer" name="id_customer" required>
              <div class="my-3">
                <form class="form-floating mt-3 ml-3">
                  <div class="form-group">
                    <label for="namaCustomer">Nama Customer</label>
                    <input type="text" class="form-control form-control-sm" id="namaCustomer" placeholder="Budi" value="Budi" readonly>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control form-control-sm" id="alamat" placeholder="Alamat" value="Alamat" readonly>
                  </div>
                  <div class="form-group">
                    <label for="noHp">No Hp</label>
                    <input type="text" class="form-control form-control-sm" id="noHp" placeholder="No Hp" value="No Hp" readonly>
                  </div>
                  <div class="form-group">
                    <label for="jumlahEkor">Jumlah (ekor)</label>
                    <input type="text" class="form-control form-control-sm" id="jumlahEkor" placeholder="Jumlah (ekor)" value="Jumlah (ekor)" readonly>
                  </div>
                  <div class="form-group">
                    <label for="jumlahKg">Jumlah (kg)</label>
                    <input type="text" class="form-control form-control-sm" id="jumlahKg" placeholder="Jumlah (kg)" value="Jumlah (kg)" readonly>
                  </div>
                </form>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection