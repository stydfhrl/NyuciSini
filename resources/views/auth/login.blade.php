@extends('auth.layoutauth')
@section('judulnya')
@section('formnya')
<form class="pt-3" action="{{ route('login.post') }}" method="POST">
    @csrf
    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
    @endif
    @if (Session::has('msg'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <span class="alert-inner--text"><strong>Warning!</strong> {!! \Session::get('msg') !!}</span>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
  </div>
  @endif
    
    @error('success')
     <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    </div>
    @enderror
    <div class="form-group">
      <label for="exampleInputEmail">Email</label>
      <div class="input-group">
        <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-right-0">
            <i class="mdi mdi-warning-outline text-white"></i>
          </span>
        </div>
        <input type="text" class="form-control form-control-lg border-left-0" style="color: white" id="email" placeholder="Email" name="email" autofocus>
        @if($errors->has('email'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <span class="alert-inner--text"><strong>Warning!</strong>{{ $errors->first('email') }}</span>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
        @endif
      </div>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">Password</label>
      <div class="input-group">
        <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-right-0">
            <i class="mdi mdi-lock-outline text-white"></i>
          </span>
        </div>
        <input type="password" class="form-control form-control-lg border-left-0" style="color: white" id="password" name="password" placeholder="Password">
        @if($errors->has('password'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <span class="alert-inner--text"><strong>Warning!</strong>{{ $errors->first('password') }}</span>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
        @endif
      </div>
    </div>
    <div class="my-2 d-flex justify-content-between align-items-center">
      <div class="form-check">
        <label class="form-check-label text-muted">
          <input type="checkbox" class="form-check-input">
          Keep me signed in
        </label>
      </div>
      <a href="#" class="auth-link text-white">Forgot password?</a>
    </div>
    <div class="my-2">
      <button type="submit" class="btn btn-block btn-lg font-weight-bold auth-form-btn font-white" href="index.html" style="background-color: rgb(25, 189, 25)">LOGIN</button>
    </div>
    <div class="text-center mt-4 font-weight-light">
      Don't have an account? <a href="/auth/register" class="text-white " style="font-weight: bold">Create</a>
    </div>
  </form>
@endsection
