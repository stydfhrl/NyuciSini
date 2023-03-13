@extends('layout')

@section('content')
  @push('style')
  <link rel="stylesheet" href={{ asset('css/customer.css') }}>
  @endpush

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <h2>Tabel Data Transaksi</h2>
          <a href="{{url ('data-transaksi/create')}}" class="tbl-btn button btn-primary p-2 rounded-2">Add New Transaksi</a>
        </div>
        <hr class="border-dark my-4">
        <div class="table-responsive">
          <table class="table table-hover table-striped border rounded-1">
            <thead>
              <tr>
                <th class="fw-bold text-center">No</th>
                <th class="fw-bold text-center">Nama Customer</th>
                <th class="fw-bold text-center">Dari Outlet</th>
                <th class="fw-bold text-center">Paket Laundry</th>
                <th class="fw-bold text-center">Status</th>
                <th class="fw-bold text-center">Keterangan</th>
                <th class="fw-bold text-center">Diskon</th>
                <th class="fw-bold text-center">Total</th>
                <th class="fw-bold text-center">Diinput Oleh</th>
                <th class="fw-bold text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no = 1;
              @endphp
              @foreach ($data as $idx)
                <tr>
                    <td class="fw-semibold text-center fs-6">{{$no++}}</td>
                    <td class="text-center fs-6">{{$idx -> transaksicustomer -> nama}}</td>
                    <td class="text-center fs-6">{{$idx -> transaksioutlet -> nama}}</td>
                    <td class="text-center fs-6">{{$idx -> transaksipaket-> jenis}}</td>
                    <td class="text-center fs-6">{{$idx -> status}}</td>
                    <td class="text-center fs-6">{{$idx -> keterangan}}</td>
                    <td class="text-center fs-6">{{$idx -> diskon}} %</td>
                    <td class="text-center fs-6">Rp. {{number_format($idx->total)}}</td>
                    <td class="text-center fs-6">{{$idx -> transaksiuser -> nama}}</td>
                  {{-- <td class="text-danger">{{$idx ->}}<i class="mdi mdi-arrow-down"></i></td> --}}
                  <td class=" d-flex gap-2 justify-content-center text-center">
                    <a href="{{ url('data-transaksi/'.$idx->id)}}" class="btn btn-sm fw-semibold text-light rounded-2 bg-info"> <i class="fas fa-eye text-light"></i>
                      Detail
                    </a>
                    @if (auth()->user()-> level == 'admin' && 'karyawan')
                      <a href="{{ url('data-transaksi/'.$idx->id.'/edit')}}" class="btn btn-sm fw-semibold text-dark rounded-2 bg-warning"> <i class="fa-solid fa-pen-to-square"></i>
                        Edit
                      </a>
                      <form action="{{ url('data-transaksi/'.$idx->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm fw-semibold text-white rounded-2 bg-danger delete" data-name="{{ $idx->nama }}"><i class="fa-solid fa-trash mr-1" style="font-size: 13px"></i>Delete</button>
                      </form>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  {{-- Required JS Tags --}}
  @include('sweetalert::alert')

@endsection

@push('scripts')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xU+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
  </script>

<script>
            
  $('.delete').click(function(event) {
  var form =  $(this).closest("form");
  var name = $(this).data("name");
  event.preventDefault();
  swal({
      title: `Are you sure you want to delete ${name}?`,
      text: "If you delete this, it will be gone forever.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      form.submit();
      swal("Data berhasil dihapus", {
            icon: "success",
            });
    }else 
    {
      swal("Data gagal dihapus");
    }
  });
});
</script>

  <script>
    @if (Session::has('success'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
    toastr.success("{{ Session::get('success') }}")
    @endif
  </script>

  <script>
    @if (Session::has('destroy'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
    toastr.success("{{ Session::get('destroy') }}")
    @endif
  </script>

@endpush  