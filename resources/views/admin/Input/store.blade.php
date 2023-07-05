@extends('admin.admin')
@section('admin')
    <div class="page-content">
        <form action="{{ url('/admin-table/storeAdmin') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection