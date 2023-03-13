@extends('layout')
@section('content')
@push('style')
<link rel="stylesheet" href={{ asset('css/customer.css') }}>
@endpush

<div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body d-flex flex-column gap-4">
    <div class="d-flex justify-content-between">
      <h2>Add New Transaksi</h2>
      <a href="{{ url('data-transaksi')}}" class="tbl-btn-add button btn-info p-2 rounded-2">Back to Table</a>
    </div>
    <form class="forms-sample mt-3" action="{{ url('data-transaksi')}}" method="POST">
      @csrf
      <div class="form-group">
        <h6>Nama Outlet<span class="text-danger">*</span></h6>
        <select class="form-control " name="outlet_id"> 
          <option disabled selected>Pilih Outlet</option>
          @foreach ($outlet as $idx)
            <option value="{{$idx->id}}">{{$idx->nama}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <h6>Nama Customer<span class="text-danger">*</span></h6>
        <select class="form-control" name="customer_id"> 
          <option disabled selected>Pilih Customer</option>
          @foreach ($customer as $idx)
            <option value="{{$idx->id}}">{{$idx->nama}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <h6>Jenis <span class="text-danger">*</span></h6>
        <select class="form-control form-select" name="paket_id">
          <option selected disabled>Pilih Jenis Paket</option>
          @foreach ($paketlaundry as $idx)
            <option value="{{ $idx->id }}">{{ $idx->jenis }} - Rp. {{ $idx->harga }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <h6>Nama Karyawan<span class="text-danger">*</span></h6>
        <select class="form-control" name="user_id"> 
          <option disabled selected>Diinput Oleh</option>
          @foreach ($user as $idx)
            <option value="{{$idx->id}}">{{$idx->nama}}</option>
          @endforeach
        </select>
      </div>
      
      <div class="form-group">
        <h6>Tanggal<span class="text-danger">*</span></h6>
        <input type="datetime-local" class="form-control" placeholder="Masukkan Tanggal ..." name="tgl">
      </div>
      
      <div class="form-group">
        <h6>Berat/kg<span class="text-danger">*</span></h6>
        <input type="number" class="form-control" placeholder="Masukkan Berat ..." name="berat">
      </div>
      
      <div class="form-group">
        <h6>Tgl Bayar<span class="text-danger">*</span></h6>
        <input type="datetime-local" class="form-control" placeholder="Masukkan Tgl Bayar ..." name="tgl_bayar">
      </div>

      <div class="form-group">
        <h6>Biaya Tambahan<span class="text-danger">*</span></h6>
        <input type="number" class="form-control" placeholder="Masukkan Biaya Tambahan ..." name="biaya_tambahan">
      </div>

      <div class="form-group">
        <h6>Status<span class="text-danger">*</span></h6>
        <select class="form-control form-select" name="status">
          <option selected value="proses">Proses</option>
        </select>
      </div>
      {{--  --}}
      <div class="form-group">
        <h6>Keterangan<span class="text-danger">*</span></h6>
        <textarea class="form-control" placeholder="Masukkan Keterangan ..." name="keterangan"></textarea>
      </div>
      <button type="submit" class="btn btn-success fw-semibold mr-2">Submit</button>
      <a href="{{url ('/data-transaksi')}}" class="btn btn-light">Cancel</a>
    </form>
  </div>
</div>
</div>
@endsection