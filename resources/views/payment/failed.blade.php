<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pembayaran Gagal - Gassbel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { font-family: 'Segoe UI', sans-serif; background: #f8fafc; display: flex; align-items: center; justify-content: center; min-height: 100vh }
    .error-card { background: #fff; border-radius: 12px; box-shadow: 0 6px 18px rgba(15,118,110,0.08); padding: 3rem; text-align: center; max-width: 500px }
    .error-icon { font-size: 3rem; color: #dc2626; margin-bottom: 1rem }
  </style>
</head>
<body>
  <div class="error-card">
    <div class="error-icon">✕</div>
    <h3 class="mb-3">Pembayaran Gagal</h3>
    <p class="text-muted mb-4">Pembayaran Anda tidak berhasil diproses. Silakan coba lagi atau gunakan metode pembayaran lain.</p>
    
    <div class="mb-3">
      <small class="text-muted">Order ID: <strong>{{ request('order_id') }}</strong></small>
    </div>

    <div class="d-grid gap-2">
      <a href="{{ route('checkout') }}" class="btn btn-primary">Kembali ke Checkout</a>
      <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary">Lihat Keranjang</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
