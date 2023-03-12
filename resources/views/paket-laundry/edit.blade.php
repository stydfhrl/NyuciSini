@extends('layout')

@section('content')
  @push('style')
  <link rel="stylesheet" href={{ asset('css/customer.css') }}>
  @endpush

<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body d-flex flex-column gap-4">
      <div class="d-flex justify-content-between">
        <h2>Edit Data Paket</h2>
        <a href="{{ url('data-laundry')}}" class="tbl-btn-add button btn-info p-2 rounded-2">Back to Table</a>
      </div>
      <form class="forms-sample" action="{{ url('data-laundry',$data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <h6>Nama Outlet<span class="text-danger">*</span></h6>
          <select type="text" list="browsers" class="form-control @error('outlet_id') is-invalid @enderror" id="exampleInputUsername1" name="outlet_id"> 
            <datalist id="browsers">
              <option selected value="{{$data-> outlet_id}}">{{$data->paketoutlet->nama}}</option>
              @foreach ($outlet as $idx)
                <option value="{{$idx-> id}}">{{$idx-> nama}}</option>
              @endforeach
            </datalist>
          </select>
          @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
          <h6>Nama Paket <span class="text-danger">*</span></h6>
          <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" placeholder="Masukkan Nama Paket..." name="nama_paket" value="{{$data -> nama_paket}}">
          @error('nama_paket')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <div class="form-group">
            <h6>Jenis Paket <span class="text-danger">*</span></h6>
            <select type="text" class="form-control @error('jenis') is-invalid @enderror" id="exampleInputUsername1" name="jenis">
              @error('jenis')<div class="invalid-feedback">{{$message}}</div>@enderror
              <option disabled>{{$data -> jenis}}</option>
              <option value="Kiloan">Kiloan</option>
              <option value="Dry Cleaning">Dry Cleaning</option>
              <option value="Gorden">Gorden</option>
              <option value="Jaket Kulit">Jaket Kulit</option>
              <option value="Karpet">Karpet</option>
              <option value="Sepatu">Sepatu</option>
              <option value="Koper-Tas">Koper-Tas</option>
              <option value="Boneka">Boneka</option>
              <option value="Helm">Helm</option>
              <option value="SpringBed">Spring Bed</option>
              <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <div class="form-group">
          <h6>Harga <span class="text-danger">*</span></h6>
          <input type="number" class="form-control @error('notelp') is-invalid @enderror" placeholder="Masukkan Harga..." name="harga" value="{{$data -> harga}}">
          @error('notelp')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <button type="submit" class="btn btn-success fw-semibold mr-2">Submit</button>
        <a href="{{url ('/data-karyawan')}}" class="btn btn-light">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  function password_show_hide() {
     var x = document.getElementById("password");
     var show_eye = document.getElementById("show_eye");
     var hide_eye = document.getElementById("hide_eye");
     hide_eye.classList.remove("d-none");
     if (x.type === "password") {
         x.type = "text";
         show_eye.style.display = "none";
         hide_eye.style.display = "block";
     } else {
         x.type = "password";
         show_eye.style.display = "block";
         hide_eye.style.display = "none";
     }
     }
 </script>
@endpush