<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pembayaran Berhasil - Gassbel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { font-family: 'Segoe UI', sans-serif; background: #f8fafc; display: flex; align-items: center; justify-content: center; min-height: 100vh }
    .success-card { background: #fff; border-radius: 12px; box-shadow: 0 6px 18px rgba(15,118,110,0.08); padding: 3rem; text-align: center; max-width: 500px }
    .success-icon { font-size: 3rem; color: #10b981; margin-bottom: 1rem }
  </style>
</head>
<body>
  <div class="success-card">
    <div class="success-icon">✓</div>
    <h3 class="mb-3">Pembayaran Berhasil!</h3>
    <p class="text-muted mb-4">Terima kasih telah berbelanja. Pesanan Anda telah dikonfirmasi dan akan segera diproses.</p>
    
    <div class="mb-3">
      <small class="text-muted">Order ID: <strong>{{ request('order_id') }}</strong></small>
    </div>

    <div class="d-grid gap-2">
      <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Toko</a>
      <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary">Lihat Pesanan</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
