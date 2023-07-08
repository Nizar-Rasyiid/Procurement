@extends('admin.admin')
@section('admin')
    <div class="page-content">
        <div class="mt-3">
        <form>
            @csrf
            <h4>Data SO</h4>
              <div class="my-3">
                <form class="form-floating mt-3">
                    <div class="search">
                      <div class="form-group">
                        <input type="text" class=" form-control form-control-sm w-25 rounded">
                        <input type="button" value="Search" class="rounded mt-2">
                      <div class="p-2 mt-2 w-25 border rounded">
                          @foreach( $customer as $item)
                            <p>nama : {{$item->nama}}</p>
                            <p>Alamat : {{$item->alamat}}</p>
                            <p>No HP : {{$item->nomor_telepon}}</p>
                          @endforeach
                      </div>
                    </div>
                  <div class="form-group">
                    <label for="jumlahEkor">Tanggal SO</label>
                    <input type="date" class="form-control form-control-sm w-50" id="jumlahEkor" placeholder="dd/mm/yyyy">
                  </div>
                  <div class="form-group mt-2">
                    <label for="jumlahEkor">Jumlah (ekor)</label>
                    <input type="text" class="form-control form-control-sm w-50" id="jumlahEkor" placeholder="Jumlah (ekor)">
                  </div>
                  <div class="form-group mt-2">
                    <label for="jumlahKg">Jumlah (kg)</label>
                    <input type="text" class="form-control form-control-sm w-50" id="jumlahKg" placeholder="Jumlah (kg)">
                  </div>
                  <div class="form-group mt-2">
                    <label for="Harga">Harga per ekor/kg</label>
                    <input type="text" class="form-control form-control-sm w-50" id="jumlahKg" placeholder="Rp.">
                  </div>
                  <div class="form-group mt-2">
                    <label for="totalHarga">Harga Total</label>
                    <input type="text" class="form-control form-control-sm w-50" id="jumlahKg" placeholder="Rp.">
                  </div>
                </form>
              </div>
              <div>
              <form class="form-floating mt-3 ml-3">
                  <div class="form-group">
                    <label for="jumlahBayar">Jumlah Bayar</label>
                    <input type="text" class="form-control form-control-sm w-50" id="jumlahEkor" placeholder="Total" value="Rp. ">
                  </div>
                  <div class="form-group mt-2">
                    <label for="jumlahEkor">Bukti Bayar</label>
                    <input class="mt-2 rounded form-control w-50" type="file" name="">
                  </div>
                  <div class="form-group mt-2">
                    <label for="jumlahEkor">Keterangan</label>
                    <input type="text" class="form-control form-control-lg w-50">
                  </div>
                </form>
              </div>
            <button type="submit" class="btn btn-primary mt-2">Input Payment SO</button>
          </form>
        </div>
        
    </div>
@endsection