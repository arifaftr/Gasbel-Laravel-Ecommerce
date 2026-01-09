<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pembayaran - Gassbel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
  <style>
    body { font-family: 'Segoe UI', sans-serif; background: #f8fafc }
    .payment-card { max-width: 600px; margin: 3rem auto; background: #fff; border-radius: 12px; box-shadow: 0 6px 18px rgba(15,118,110,0.08); padding: 2rem }
  </style>
</head>
<body>

  <nav class="navbar navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/gasbel.png') }}" alt="Gassbel" style="height:40px"></a>
      <div>
        <span class="text-muted">Order: {{ $order_id }}</span>
      </div>
    </div>
  </nav>

  <div class="payment-card">
    <h4 class="mb-4">Ringkasan Pembayaran</h4>

    <div class="mb-3">
      <strong>{{ $checkout_data['name'] }}</strong><br>
      <small class="text-muted">{{ $checkout_data['email'] }}<br>{{ $checkout_data['phone'] }}<br>{{ $checkout_data['address'] }}, {{ $checkout_data['city'] }} {{ $checkout_data['postcode'] }}</small>
    </div>

    <hr>

    <div class="mb-3">
      <div class="d-flex justify-content-between py-2">
        <span>Subtotal</span>
        <strong>Rp {{ number_format($checkout_data['subtotal'], 0, ',', '.') }}</strong>
      </div>
      <div class="d-flex justify-content-between py-2">
        <span>Pajak (10%)</span>
        <strong>Rp {{ number_format($checkout_data['tax'], 0, ',', '.') }}</strong>
      </div>
      <div class="d-flex justify-content-between py-2">
        <span>Pengiriman</span>
        <strong>Rp {{ number_format($checkout_data['shipping'], 0, ',', '.') }}</strong>
      </div>
      <hr>
      <div class="d-flex justify-content-between py-2">
        <h6>Total Pembayaran</h6>
        <h6 style="color: #0f766e"><strong>Rp {{ number_format($checkout_data['total'], 0, ',', '.') }}</strong></h6>
      </div>
    </div>

    <button class="btn btn-primary w-100 btn-lg" id="pay-button">Bayar Sekarang</button>

    <div class="mt-3 text-center">
      <small class="text-muted">Klik tombol di atas untuk melakukan pembayaran melalui Midtrans</small>
    </div>
  </div>

  <script>
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
      snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
          window.location.href = '{{ url("/payment/success") }}?order_id={{ $order_id }}';
        },
        onPending: function(result){
          window.location.href = '{{ url("/payment/pending") }}?order_id={{ $order_id }}';
        },
        onError: function(result){
          window.location.href = '{{ url("/payment/failed") }}?order_id={{ $order_id }}';
        },
        onClose: function(){
          alert('Anda menutup popup pembayaran');
        }
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
