@extends('layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
        <div class="box box-warnin`g">
            <div class="box-header">
                <p>
                    <a href="{{ url('data-transaksi') }}" class="btn btn-sm btn-flat btn-primary mb-3"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
                </p>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                <table class="table table-stripped text-dark fw-bold">
                    <tbody>
                        <tr>
                            <th>Outlet</th>
                            <td>:</td>
                            <td>{{$data -> transaksioutlet -> nama}}</td> 
                            <th>Nama Customer</th>
                            <td>:</td>
                            <td>{{$data -> transaksicustomer -> nama}}</td>
                        </tr>
                        <tr>
                            <th>Jenis Paket Laundry</th>
                            <td>:</td>
                            <td>{{$data -> transaksipaket -> jenis}}</td>
                            <th>Nama Penginput</th>
                            <td>:</td>
                            <td>{{$data -> transaksiuser -> nama}}</td> 
                        </tr>
                        <tr>
                            <th>Berat</th>
                            <td>:</td>
                            <td>{{ $data->berat }}/KG</td>
                            <th>Keterangan</th>
                            <td>:</td>
                            <td>{{ $data->keterangan }}</td>
                        </tr>
                        <tr>
                            <th>Tgl Bayar</th>
                            <td>:</td>
                            <td>{{ $data->tgl_bayar }}</td>
                            <th>biaya tambahan</th>
                            <td>:</td>
                            <td>Rp. {{ number_format($data->biaya_tambahan) }}</td>
                        </tr>
                        <tr>
                            <th>Diskon</th>
                            <td>:</td>
                            <td>{{ $data->diskon }}%</td>
                            <th>total</th>
                            <td>:</td>
                            <td>Rp. {{ number_format($data->total) }}</td>
                        </tr>
                    </tbody>
                </table>
               </div>
               
            </div>

            
            <a class="btn btn-danger mt-5" href="{{ route('cetak-pdf', $data->id) }}" style="font-size: 14px"><i class="mr-2 fa-solid fa-file-pdf" ></i>PDF</a>
        </div>
    </div>
</div>
</div>
</div>
@endsection