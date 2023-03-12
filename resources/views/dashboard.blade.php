@extends('layout')
@section('content')

<div class="row">
  
  @error('success')
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
  </div>
  @enderror
  @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
    <div class="container bg-secondary" style="width: 100%; height: 20vw">
    </div>
  </div>
  <!-- row end -->
@endsection