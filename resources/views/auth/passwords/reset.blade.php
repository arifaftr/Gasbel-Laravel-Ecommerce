@extends('layouts.app')

@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card p-4">
        <h5 class="mb-3">Set New Password</h5>
        <p class="text-muted small">Masukkan password baru Anda.</p>

        @if($errors->any())
          <div class="alert alert-danger small">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
          </div>

          <div class="d-grid">
            <button class="btn btn-primary">Reset Password</button>
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
