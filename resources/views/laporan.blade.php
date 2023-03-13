@extends('layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="mb-4">Laporan Transaksi</h3>
            <a href="{{ url('/laporan/laporan-general')}}"class="btn btn-sm fw-semibold text-light rounded-2 bg-info"> Semua Data</a>
            <form action="/laporan-tanggal" method="get" class="mt-3 d-flex flex-column gap-3">
              <h6>Pilih Tanggal</h6>
                <input type="date" class="form-control" name="tgl" id="tgl">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>
@endsection