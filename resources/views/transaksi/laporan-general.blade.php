<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Generan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <a href="{{ URL::previous() }}" class="btn btn-outline-danger m-3">Go Back</a>
    <div class="textnya mt-5 text-center mb-3">
        <h1>Laporan Transaksi Nyuci Sini</h1>
    </div>
    <div class="table-responsive d-flex justify-content-center">
      <table class="table table-hover table-striped border rounded-1 w-75">
        <thead>
          <tr>
            <th class="fw-bold text-center">No</th>
            <th class="fw-bold text-center">Outlet</th>
            <th class="fw-bold text-center">Customer</th>
            <th class="fw-bold text-center">Paket Laundry</th>
            <th class="fw-bold text-center">Berat</th>
            <th class="fw-bold text-center">Harga</th>
            <th class="fw-bold text-center">Status</th>
            <th class="fw-bold text-center">Total</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
          @foreach ($data as $idx)
          <tr>
            <td class="fw-semibold text-center fs-6">{{$no++}}</td>
            <td class="text-center fs-6">{{$idx -> transaksioutlet -> nama}}</td>
            <td class="text-center fs-6">{{$idx -> transaksicustomer -> nama}}</td>
            <td class="text-center fs-6">{{$idx -> transaksipaket -> jenis}}</td>
            <td class="text-center fs-6">{{$idx ->berat}}</td>
            <td class="text-center fs-6">Rp. {{number_format($idx -> transaksipaket->harga)}}</td>
            <td class="text-center fs-6">{{$idx -> status}}</td>
            <td class="text-center fs-6">Rp. {{number_format($idx->total)}}</td>
          </tr>
          @endforeach
        </tbody>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>