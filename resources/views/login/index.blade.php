@extends('layouts.auth')
@section('content')
<p class="login-box-msg">Silakan login untuk melanjutkan</p>

<form action="{{ route('do.login') }}" method="post">
  @csrf
  <div class="input-group mb-3">
    <input type="email" class="form-control" name="email" placeholder="Email">
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-at"></span>
      </div>
    </div>
  </div>
  <div class="input-group mb-3">
    <input type="password" class="form-control" name="password" placeholder="Password">
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-lock"></span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-8">
    </div>
    <!-- /.col -->
    <div class="col-4">
      <button type="submit" class="btn btn-primary btn-block">Sign In</button>
    </div>
    <!-- /.col -->
  </div>
</form>



<p class="mb-1">
  <a href="forgot-password.html">I forgot my password</a>
</p>
<p class="mb-0">
  <a href="register" class="text-center">Daftar di sini</a>
</p>
@endsection