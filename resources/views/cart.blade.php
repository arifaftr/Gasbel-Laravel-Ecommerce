<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Keranjang Belanja - Gassbel</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    /* Design System */
    :root {
      --primary: #0f766e;          /* TEAL DEEP */
      --primary-dark: #115e59;
      --secondary: #334155;
      --accent: #5eead4;
      --accent-light: #ccfbf1;
      --danger: #dc2626;
      --warning: #f59e0b;

      --bg-light: #f8fafc;
      --bg-white: #ffffff;

      --text-dark: #0f172a;
      --text-muted: #64748b;

      --border: #e2e8f0;

      --shadow-sm: 0 6px 18px rgba(15,118,110,0.12);
      --shadow-md: 0 16px 36px rgba(15,118,110,0.18);

      --transition: all 0.3s ease;

      --radius-sm: 8px;
      --radius-md: 14px;
      --radius-lg: 18px;
    }

    * {
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-color: var(--bg-light);
      color: var(--text-dark);
    }

    /* Navbar */
    .navbar-premium {
      background: var(--bg-white);
      box-shadow: var(--shadow-sm);
      position: sticky;
      top: 0;
      z-index: 1030;
    }

    .navbar-brand {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--primary) !important;
    }

    .navbar-brand small {
      display: block;
      font-size: 0.5rem;
      font-weight: 400;
      color: var(--text-muted);
      letter-spacing: 1px;
    }

    .nav-icon-btn {
      background: none;
      border: none;
      color: var(--text-muted);
      font-size: 1.25rem;
      cursor: pointer;
      padding: 0.5rem;
      border-radius: 50%;
      transition: var(--transition);
    }

    .nav-icon-btn:hover {
      color: var(--primary);
      background-color: rgba(37, 99, 235, 0.1);
    }

    .badge-cart {
      position: absolute;
      top: -8px;
      right: -8px;
      background: var(--danger);
      color: white;
      border-radius: 50%;
      width: 24px;
      height: 24px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.75rem;
      font-weight: 700;
    }

    /* Page Title */
    .page-header {
      padding: 2rem 0;
      margin-bottom: 2rem;
    }

    .page-title {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }

    .page-subtitle {
      color: var(--text-muted);
      font-size: 1rem;
    }

    /* Cart Items */
    .cart-items-section {
      background: var(--bg-white);
      border-radius: var(--radius-md);
      padding: 2rem;
      box-shadow: var(--shadow-sm);
      margin-bottom: 2rem;
    }

    .cart-item {
      display: flex;
      gap: 1.5rem;
      padding: 1.5rem 0;
      border-bottom: 1px solid var(--border);
      align-items: flex-start;
    }

    .cart-item:last-child {
      border-bottom: none;
    }

    .cart-item-image {
      width: 120px;
      height: 120px;
      background: var(--bg-light);
      border-radius: 8px;
      overflow: hidden;
      flex-shrink: 0;
    }

    .cart-item-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .cart-item-info {
      flex: 1;
    }

    .cart-item-name {
      font-size: 1rem;
      font-weight: 600;
      margin-bottom: 0.25rem;
    }

    .cart-item-desc {
      font-size: 0.85rem;
      color: var(--text-muted);
      margin-bottom: 0.75rem;
    }

    .cart-item-price {
      color: var(--primary);
      font-weight: 700;
      font-size: 1.1rem;
    }

    .cart-item-controls {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-left: auto;
      flex-wrap: wrap;
      justify-content: flex-end;
    }

    .quantity-picker {
      display: flex;
      align-items: center;
      border: 2px solid var(--border);
      border-radius: 6px;
      padding: 0.25rem;
      background: white;
    }

    .qty-btn {
      background: none;
      border: none;
      width: 32px;
      height: 32px;
      cursor: pointer;
      font-weight: 600;
      color: var(--primary);
      transition: var(--transition);
    }

    .qty-btn:hover {
      background: var(--bg-light);
    }

    .qty-input {
      width: 50px;
      border: none;
      text-align: center;
      font-weight: 600;
      padding: 0.25rem;
    }

    .qty-input:focus {
      outline: none;
    }

    .subtotal {
      font-weight: 700;
      font-size: 1rem;
      color: var(--text-dark);
      white-space: nowrap;
      min-width: 120px;
      text-align: right;
    }

    .btn-remove {
      background: none;
      border: none;
      color: var(--danger);
      cursor: pointer;
      font-size: 1.25rem;
      transition: var(--transition);
      padding: 0;
    }

    .btn-remove:hover {
      transform: scale(1.1);
    }

    /* Empty Cart */
    .empty-cart {
      background: var(--bg-white);
      border-radius: var(--radius-md);
      padding: 3rem;
      text-align: center;
      box-shadow: var(--shadow-sm);
    }

    .empty-cart-icon {
      font-size: 4rem;
      color: var(--text-muted);
      margin-bottom: 1rem;
    }

    .empty-cart-title {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }

    .empty-cart-desc {
      color: var(--text-muted);
      margin-bottom: 2rem;
    }

    .btn-continue {
      background: var(--primary);
      color: white;
      border: none;
      padding: 0.75rem 2rem;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
    }

    .btn-continue:hover {
      background: var(--primary-dark);
    }

    /* Order Summary */
    .order-summary {
      background: var(--bg-white);
      border-radius: var(--radius-md);
      padding: 2rem;
      box-shadow: var(--shadow-sm);
      position: sticky;
      top: 100px;
    }

    .summary-title {
      font-size: 1.25rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
    }

    .summary-row {
      display: flex;
      justify-content: space-between;
      padding: 0.75rem 0;
      border-bottom: 1px solid var(--border);
    }

    .summary-row.total {
      border: none;
      padding-top: 1rem;
      border-top: 2px solid var(--border);
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 1.5rem;
    }

    .summary-label {
      color: var(--text-muted);
    }

    .summary-value {
      color: var(--text-dark);
      font-weight: 600;
    }

    /* Additional Offers */
    .offers-section {
      background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(37, 99, 235, 0.1) 100%);
      border-radius: 8px;
      padding: 1.5rem;
      margin-bottom: 1.5rem;
    }

    .offer-item {
      display: flex;
      gap: 0.75rem;
      margin-bottom: 0.75rem;
      align-items: center;
      font-size: 0.9rem;
    }

    .offer-item:last-child {
      margin-bottom: 0;
    }

    .offer-icon {
      color: var(--accent);
      font-size: 1.25rem;
      flex-shrink: 0;
    }

    .offer-text {
      flex: 1;
    }

    /* Checkout Buttons */
    .checkout-buttons {
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
    }

    .btn-checkout {
      background: var(--primary);
      color: white;
      border: none;
      padding: 1rem;
      border-radius: 8px;
      font-weight: 600;
      font-size: 1rem;
      cursor: pointer;
      transition: var(--transition);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }

    .btn-checkout:hover {
      background: var(--primary-dark);
      transform: translateY(-2px);
    }

    .btn-continue-shopping {
      background: white;
      color: var(--primary);
      border: 2px solid var(--primary);
      padding: 0.75rem;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
    }

    .btn-continue-shopping:hover {
      background: var(--bg-light);
    }

    /* Footer */
    footer {
      background: var(--text-dark);
      color: white;
      padding: 2rem 0 1rem;
      margin-top: 4rem;
    }

    @media (max-width: 768px) {
      .order-summary {
        position: static;
        margin-top: 2rem;
      }

      .cart-item {
        flex-direction: column;
      }

      .cart-item-controls {
        width: 100%;
        margin-left: 0;
        justify-content: space-between;
      }

      .subtotal {
        min-width: auto;
      }

      .page-title {
        font-size: 1.5rem;
      }

      .cart-items-section {
        padding: 1rem;
      }
    }
  </style>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-premium px-3 px-lg-5">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('images/gasbel.png') }}" alt="Gassbel Logo" style="width:150px; height:auto;">
        <small>Official Store</small>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <i class="bi bi-list"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="nav-icons ms-auto d-flex align-items-center gap-2">
          <!-- User Dropdown -->
          <div class="dropdown">
            <button class="nav-icon-btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
              <i class="bi bi-person"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              @auth
                @if(!auth()->user()->is_admin)
                  <li><a class="dropdown-item" href="{{ route('profile') }}">
                    <i class="bi bi-person-circle"></i> Profil Saya
                  </a></li>
                  <li><hr class="dropdown-divider"></li>
                @endif
                <li><form method="POST" action="{{ route('logout') }}" class="d-inline">
                  @csrf
                  <button type="submit" class="dropdown-item text-danger">
                    <i class="bi bi-box-arrow-right"></i> Logout
                  </button>
                </form></li>
              @else
                <li><a class="dropdown-item" href="{{ route('login') }}">
                  <i class="bi bi-box-arrow-in-right"></i> Login
                </a></li>
              @endauth
            </ul>
          </div>

          <!-- Cart -->
          <a href="{{ route('cart.index') }}" class="nav-icon-btn position-relative" title="Keranjang">
            <i class="bi bi-bag"></i>
            @if(!empty($cartItemCount) && $cartItemCount > 0)
              <span class="badge-cart">{{ $cartItemCount }}</span>
            @endif
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- PAGE HEADER -->
  <div class="container-fluid px-3 px-lg-5">
    <div class="page-header">
      <h1 class="page-title"><i class="bi bi-bag"></i> Keranjang Belanja</h1>
      <p class="page-subtitle">{{ $items->count() }} produk di keranjang Anda</p>
    </div>
  </div>

  <!-- MAIN CONTENT -->
  <div class="container-fluid px-3 px-lg-5" style="padding-bottom: 4rem;">
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    @if($items->isEmpty())
      <!-- Empty Cart -->
      <div class="empty-cart">
        <div class="empty-cart-icon">
          <i class="bi bi-cart-x"></i>
        </div>
        <h2 class="empty-cart-title">Keranjang Kosong</h2>
        <p class="empty-cart-desc">Belum ada produk di keranjang Anda. Mari mulai berbelanja sekarang!</p>
        <a href="{{ url('/') }}" class="btn-continue">
          <i class="bi bi-arrow-left"></i> Lanjut Belanja
        </a>
      </div>
    @else
      <div class="row g-4">
        <!-- Cart Items -->
        <div class="col-lg-8">
          <div class="cart-items-section">
            <h6 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 1.5rem;">
              <i class="bi bi-check-circle-fill" style="color: var(--accent);"></i> Produk Anda
            </h6>

            <div class="d-flex align-items-center mb-3">
              <div style="width:28px;">
                <input id="select-all" type="checkbox" style="width:18px; height:18px;">
              </div>
              <div style="flex:1; color:var(--text-muted); font-weight:600;">Pilih Semua</div>
            </div>
            @foreach($items as $item)
              <div class="cart-item" data-id="{{ $item->id }}" data-price="{{ $item->price }}" data-qty="{{ $item->quantity }}">
                <div style="display:flex; align-items:flex-start; margin-right:0.75rem;">
                  <input class="item-checkbox" type="checkbox" name="items[]" value="{{ $item->id }}" form="checkout-form" checked style="width:18px; height:18px; margin-top:6px; margin-right:8px;">
                </div>
                <!-- Product Image -->
                <div class="cart-item-image">
                  @if($item->product->image)
                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}">
                  @else
                    <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                      <i class="bi bi-image text-muted" style="font-size: 2rem;"></i>
                    </div>
                  @endif
                </div>

                <!-- Product Info -->
                <div class="cart-item-info">
                  <a href="{{ route('product.show', $item->product->id) }}" style="text-decoration: none;">
                    <h6 class="cart-item-name">{{ $item->product->name }}</h6>
                  </a>
                  <p class="cart-item-desc">{{ $item->product->category?->name ?? 'Uncategorized' }}</p>
                  <div class="cart-item-price">Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                </div>

                <!-- Controls -->
                <div class="cart-item-controls">
                  <!-- Quantity Picker -->
                  <form method="POST" action="{{ route('cart.update') }}" class="d-flex align-items-center">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <div class="quantity-picker me-2">
                      <button type="button" class="qty-btn" onclick="this.form.quantity.value = Math.max(1, parseInt(this.form.quantity.value) - 1); this.closest('.cart-item').dataset.qty = this.form.quantity.value; recalcTotals();">−</button>
                      <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="100" class="qty-input" oninput="this.closest('.cart-item').dataset.qty = this.value; recalcTotals();">
                      <button type="button" class="qty-btn" onclick="this.form.quantity.value = parseInt(this.form.quantity.value) + 1; this.closest('.cart-item').dataset.qty = this.form.quantity.value; recalcTotals();">+</button>
                    </div>
                    <button type="submit" style="background: none; border: none; cursor: pointer; color: var(--text-muted); padding: 0.5rem; border-radius: 4px; transition: var(--transition);" onmouseover="this.style.background='var(--bg-light)'" onmouseout="this.style.background='none'" title="Update">
                      <i class="bi bi-arrow-repeat"></i>
                    </button>
                  </form>

                  <!-- Subtotal -->
                  <div class="subtotal item-subtotal">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</div>

                  <!-- Remove -->
                  <form method="POST" action="{{ route('cart.remove') }}" class="d-inline">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <button type="submit" class="btn-remove" title="Hapus">
                      <i class="bi bi-trash"></i>
                    </button>
                  </form>
                </div>
              </div>
            @endforeach
          </div>

          <!-- Continue Shopping -->
          <a href="{{ url('/') }}" class="btn btn-continue-shopping w-100">
            <i class="bi bi-arrow-left"></i> Lanjut Belanja
          </a>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
          <div class="order-summary">
            <h6 class="summary-title">Ringkasan Pesanan</h6>

            <!-- Offers -->
            <div class="offers-section">
              <div class="offer-item">
                <div class="offer-icon"><i class="bi bi-gift"></i></div>
                <div class="offer-text"><strong>Gratis ongkos kirim</strong> untuk pembelian > 100rb</div>
              </div>
              <div class="offer-item">
                <div class="offer-icon"><i class="bi bi-percent"></i></div>
                <div class="offer-text"><strong>Diskon sampai 50%</strong> untuk produk pilihan</div>
              </div>
              <div class="offer-item">
                <div class="offer-icon"><i class="bi bi-check-all"></i></div>
                <div class="offer-text"><strong>Garansi uang kembali</strong> 100% jika tidak puas</div>
              </div>
            </div>

            <!-- Summary Details -->
            @php
              $initialShipping = ($totals['subtotal'] ?? 0) >= 100000 ? 0 : 15000;
              $initialTotal = ($totals['subtotal'] ?? 0) + ($totals['tax'] ?? 0) + $initialShipping;
            @endphp
            <div class="summary-row">
              <span class="summary-label">Subtotal</span>
              <span id="subtotal-value" class="summary-value">Rp {{ number_format($totals['subtotal'] ?? 0, 0, ',', '.') }}</span>
            </div>
            <div class="summary-row">
              <span class="summary-label">Pajak (10%)</span>
              <span id="tax-value" class="summary-value">Rp {{ number_format($totals['tax'] ?? 0, 0, ',', '.') }}</span>
            </div>
            <div class="summary-row">
              <span class="summary-label">Pengiriman</span>
              <span id="shipping-value" class="summary-value">Rp {{ number_format($initialShipping, 0, ',', '.') }}</span>
            </div>
            <div class="summary-row total">
              <span>Total Pembayaran</span>
              <span id="total-value" style="color: var(--primary);">Rp {{ number_format($initialTotal, 0, ',', '.') }}</span>
            </div>

            <!-- Checkout -->
            <div class="checkout-buttons">
              <form id="checkout-form" method="GET" action="{{ route('checkout') }}">
                {{-- items[] checkboxes are outside the form but associated via `form` attribute above --}}
                <button type="submit" class="btn-checkout">
                  <i class="bi bi-credit-card"></i> checkout sekarang
                </button>
              </form>
            </div>

            <!-- Trust Badges -->
            <div style="padding-top: 1.5rem; border-top: 1px solid var(--border); margin-top: 1.5rem; font-size: 0.85rem; color: var(--text-muted);">
              <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.75rem;">
                <i class="bi bi-lock-fill" style="color: var(--primary);"></i> Pembayaran Aman & Terpercaya
              </div>
              <div style="display: flex; gap: 0.5rem; margin-top: 1rem; flex-wrap: wrap;">
                <span style="background: var(--bg-light); padding: 0.4rem 0.8rem; border-radius: 4px;">Visa</span>
                <span style="background: var(--bg-light); padding: 0.4rem 0.8rem; border-radius: 4px;">MasterCard</span>
                <span style="background: var(--bg-light); padding: 0.4rem 0.8rem; border-radius: 4px;">Transfer Bank</span>
                <span style="background: var(--bg-light); padding: 0.4rem 0.8rem; border-radius: 4px;">e-Wallet</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>

  <!-- FOOTER -->
  <footer>
    <div class="container-fluid px-3 px-lg-5">
      <div class="text-center py-3" style="border-top: 1px solid rgba(255,255,255,0.1);">
        <p style="color: rgba(255,255,255,0.6); margin: 0;">&copy; 2026 PT Gassbel Indonesia. Semua hak dilindungi.</p>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script>
    function formatRupiah(number) {
      if (typeof number !== 'number') number = Number(number) || 0;
      return 'Rp ' + number.toLocaleString('id-ID');
    }

    function recalcTotals() {
      const items = document.querySelectorAll('.cart-item');
      let subtotal = 0;
      items.forEach(item => {
        const checkbox = item.querySelector('.item-checkbox');
        if (!checkbox || !checkbox.checked) return;
        const price = parseFloat(item.dataset.price) || 0;
        const qty = parseInt(item.dataset.qty) || 0;
        const itemSubtotal = price * qty;
        subtotal += itemSubtotal;
        const subtotalEl = item.querySelector('.item-subtotal');
        if (subtotalEl) subtotalEl.textContent = formatRupiah(Math.round(itemSubtotal));
      });

      const tax = Math.round(subtotal * 0.1);
      let shipping = 0;
      if (subtotal === 0) {
        shipping = 0;
      } else {
        shipping = subtotal >= 100000 ? 0 : 15000;
      }
      const total = subtotal === 0 ? 0 : Math.round(subtotal + tax + shipping);

      const elSub = document.getElementById('subtotal-value');
      const elTax = document.getElementById('tax-value');
      const elShip = document.getElementById('shipping-value');
      const elTotal = document.getElementById('total-value');
      if (elSub) elSub.textContent = formatRupiah(Math.round(subtotal));
      if (elTax) elTax.textContent = formatRupiah(tax);
      if (elShip) elShip.textContent = formatRupiah(shipping);
      if (elTotal) elTotal.textContent = formatRupiah(total);

      // sync select-all
      const all = document.querySelectorAll('.item-checkbox');
      const checked = document.querySelectorAll('.item-checkbox:checked');
      const selectAll = document.getElementById('select-all');
      if (selectAll) selectAll.checked = all.length > 0 && checked.length === all.length;
    }

    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.item-checkbox').forEach(cb => cb.addEventListener('change', recalcTotals));
      document.querySelectorAll('.qty-input').forEach(inp => inp.addEventListener('input', recalcTotals));
      const selectAll = document.getElementById('select-all');
      if (selectAll) selectAll.addEventListener('change', function() {
        document.querySelectorAll('.item-checkbox').forEach(cb => { cb.checked = selectAll.checked; });
        recalcTotals();
      });
      // prevent submitting checkout with no items selected
      const checkoutForm = document.getElementById('checkout-form');
      if (checkoutForm) {
        checkoutForm.addEventListener('submit', function(e) {
          const checkedCount = document.querySelectorAll('.item-checkbox:checked').length;
          if (checkedCount === 0) {
            e.preventDefault();
            alert('Pilih minimal 1 produk untuk checkout');
            return false;
          }
          // ensure checked items are present (checkboxes have form attribute so they will be submitted)
        });
      }

      recalcTotals();
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
