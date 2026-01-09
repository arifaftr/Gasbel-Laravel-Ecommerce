@extends('layouts.app')

@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card p-4">
        <h5 class="mb-3">Reset Password</h5>
        <p class="text-muted small">Masukkan email Anda, kami akan mengirimkan link untuk mereset password.</p>

        @if(session('status'))
          <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if($errors->any())
          <div class="alert alert-danger small">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
          @csrf
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
          </div>
          <div class="d-grid">
            <button class="btn btn-primary">Send Reset Link</button>
          </div>
        </form>

        <div class="mt-3 small">
          <a href="{{ route('login') }}">Kembali ke login</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
