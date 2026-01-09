<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout - Gassbel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background:#f8fafc; color:#0f172a }
        .checkout-card { max-width: 1100px; margin: 2.5rem auto; }
        .order-summary { background: #fff; border-radius: 12px; padding: 1.25rem; box-shadow: 0 6px 18px rgba(15,118,110,0.08); }
    </style>
</head>
<body>

    <nav class="navbar navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/gasbel.png') }}" alt="Gassbel" style="height:40px"></a>
            <div>
                <a href="{{ route('cart.index') }}" class="btn btn-link">Keranjang</a>
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button class="btn btn-outline-secondary">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container checkout-card">
        <div class="row g-4">
            <div class="col-lg-7">
                <div class="card p-4">
                    <h4>Alamat Pengiriman</h4>
                    <form method="POST" action="{{ route('checkout.process') }}">
                        @csrf
                        @foreach($items as $item)
                            <input type="hidden" name="items[]" value="{{ $item->id }}">
                        @endforeach
                        <div class="mb-3">
                            <label class="form-label">Nama Penerima</label>
                            <input name="name" class="form-control" value="{{ auth()->user()->name ?? '' }}" required>
                            @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input name="email" class="form-control" value="{{ auth()->user()->email ?? '' }}" required>
                            @error('email')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input name="address" class="form-control" placeholder="Jalan, RT/RW, Kelurahan" required>
                            @error('address')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kota</label>
                                <input name="city" class="form-control" required>
                                @error('city')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kode Pos</label>
                                <input name="postcode" class="form-control" 
                                    type="number" 
                                    min="0"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                    required>
                                @error('postcode')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon</label>
                            <input name="phone" class="form-control" 
                                type="tel" 
                                pattern="[0-9]*"
                                inputmode="numeric"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                required>
                            @error('phone')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary">Kembali ke Keranjang</a>
                            <button type="submit" class="btn btn-success">Lanjutkan ke Pembayaran</button>
                        </div>
                    </form>
                </div>

                <!-- Cart Items -->
                <div class="card p-4 mt-4">
                    <h5>Item Pesanan</h5>
                    <div class="mt-3">
                        @foreach($items as $item)
                            <div class="d-flex justify-content-between py-2 border-bottom">
                                <div>
                                    <strong>{{ $item->product->name }}</strong><br>
                                    <small class="text-muted">Qty: {{ $item->quantity }} × Rp {{ number_format($item->price, 0, ',', '.') }}</small>
                                </div>
                                <div>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="order-summary">
                    <h5>Ringkasan Pesanan</h5>
                    <div class="mt-3">
                        <div class="d-flex justify-content-between py-2"><small>Subtotal</small><small><strong>Rp {{ number_format($totals['subtotal'], 0, ',', '.') }}</strong></small></div>
                        <div class="d-flex justify-content-between py-2"><small>Pajak (10%)</small><small><strong>Rp {{ number_format($totals['tax'], 0, ',', '.') }}</strong></small></div>
                        <div class="d-flex justify-content-between py-2"><small>Pengiriman</small><small><strong>Rp {{ number_format($totals['shipping'], 0, ',', '.') }}</strong></small></div>
                        <hr>
                        <div class="d-flex justify-content-between py-2"><h6>Total Pembayaran</h6><h6 style="color:#0f766e"><strong>Rp {{ number_format($totals['total'], 0, ',', '.') }}</strong></h6></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
