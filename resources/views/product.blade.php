<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $product->name }} - Gassbel</title>

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

    /* Breadcrumb */
    .breadcrumb-custom {
      background: transparent;
      padding: 1rem 0;
      margin-bottom: 2rem;
    }

    .breadcrumb-custom .breadcrumb-item a {
      color: var(--primary);
      text-decoration: none;
    }

    .breadcrumb-custom .breadcrumb-item.active {
      color: var(--text-muted);
    }

    /* Product Gallery */
    .gallery-wrapper {
      background: var(--bg-white);
      border-radius: var(--radius-md);
      padding: 1rem;
      box-shadow: var(--shadow-sm);
    }

    .gallery-main {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 500px;
      background: var(--bg-light);
      border-radius: var(--radius-md);
      overflow: hidden;
      margin-bottom: 1rem;
      position: relative;
    }

    .gallery-main img {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
      transition: var(--transition);
    }

    .gallery-main:hover img {
      transform: scale(1.05);
    }

    .gallery-thumbnails {
      display: flex;
      gap: 0.75rem;
      justify-content: center;
      flex-wrap: wrap;
    }

    .gallery-thumb {
      width: 80px;
      height: 80px;
      border: 3px solid var(--border);
      border-radius: 8px;
      cursor: pointer;
      overflow: hidden;
      transition: var(--transition);
    }

    .gallery-thumb:hover,
    .gallery-thumb.active {
      border-color: var(--primary);
      transform: scale(1.05);
    }

    .gallery-thumb img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* Product Details */
    .product-details {
      background: var(--bg-white);
      border-radius: var(--radius-md);
      padding: 2rem;
      box-shadow: var(--shadow-sm);
    }

    .product-title {
      font-size: 1.75rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }

    .product-meta {
      display: flex;
      gap: 1.5rem;
      margin-bottom: 1.5rem;
      flex-wrap: wrap;
      padding-bottom: 1.5rem;
      border-bottom: 1px solid var(--border);
    }

    .meta-item {
      display: flex;
      flex-direction: column;
      gap: 0.25rem;
    }

    .meta-label {
      font-size: 0.85rem;
      font-weight: 600;
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .meta-value {
      font-size: 1rem;
      font-weight: 600;
      color: var(--text-dark);
    }

    /* Price Section */
    .price-section {
      margin-bottom: 1.5rem;
      padding: 1.5rem;
      background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(16, 185, 129, 0.1) 100%);
      border-radius: var(--radius-md);
    }

    .price-badge {
      display: inline-block;
      background: var(--danger);
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 50px;
      font-size: 0.85rem;
      font-weight: 600;
      margin-bottom: 1rem;
    }

    .price-original {
      font-size: 0.95rem;
      color: var(--text-muted);
      text-decoration: line-through;
      margin-right: 0.75rem;
    }

    .price-current {
      font-size: 2rem;
      font-weight: 700;
      color: var(--primary);
    }

    .price-savings {
      font-size: 0.9rem;
      color: var(--accent);
      font-weight: 600;
      margin-top: 0.5rem;
    }

    /* Stock Status */
    .stock-section {
      padding: 1rem;
      background: var(--accent-light);
      border-radius: 8px;
      margin-bottom: 1.5rem;
    }

    .stock-status {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-weight: 600;
    }

    .stock-status.available {
      color: var(--accent);
    }

    /* Quantity & Add to Cart */
    .add-to-cart-section {
      display: flex;
      gap: 1rem;
      margin-bottom: 1.5rem;
      flex-wrap: wrap;
    }

    .quantity-picker {
      display: flex;
      align-items: center;
      border: 2px solid var(--border);
      border-radius: 8px;
      padding: 0.5rem;
      background: white;
    }

    .qty-btn {
      background: none;
      border: none;
      width: 36px;
      height: 36px;
      cursor: pointer;
      font-weight: 600;
      color: var(--primary);
      transition: var(--transition);
    }

    .qty-btn:hover {
      background: var(--bg-light);
    }

    .qty-input {
      width: 60px;
      border: none;
      text-align: center;
      font-weight: 600;
    }

    .qty-input:focus {
      outline: none;
    }

    .btn-add-cart {
      flex: 1;
      background: var(--primary);
      color: white;
      border: none;
      padding: 0.75rem 2rem;
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

    .btn-add-cart:hover {
      background: var(--primary-dark);
      transform: translateY(-2px);
    }

    .btn-wishlist {
      width: 50px;
      height: 50px;
      border: 2px solid var(--border);
      background: white;
      border-radius: 8px;
      cursor: pointer;
      font-size: 1.25rem;
      color: var(--text-muted);
      transition: var(--transition);
    }

    .btn-wishlist:hover {
      border-color: var(--danger);
      color: var(--danger);
    }

    /* Social Proof */
    .social-proof {
      padding: 1.5rem;
      background: var(--bg-light);
      border-radius: var(--radius-md);
      margin-bottom: 1.5rem;
    }

    .proof-item {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      margin-bottom: 0.75rem;
      font-size: 0.9rem;
    }

    .proof-item i {
      color: var(--accent);
      font-size: 1.25rem;
    }

    .proof-item:last-child {
      margin-bottom: 0;
    }

    /* Tabs */
    .nav-tabs-custom {
      border-bottom: 2px solid var(--border);
      margin-top: 3rem;
      margin-bottom: 2rem;
    }

    .nav-tabs-custom .nav-link {
      color: var(--text-muted);
      border: none;
      border-bottom: 3px solid transparent;
      font-weight: 600;
      padding: 1rem 0;
      transition: var(--transition);
      margin-right: 2rem;
    }

    .nav-tabs-custom .nav-link:hover {
      color: var(--primary);
      border-color: var(--primary);
    }

    .nav-tabs-custom .nav-link.active {
      color: var(--primary);
      border-color: var(--primary);
      background: transparent;
    }

    .tab-content-custom {
      padding: 2rem 0;
    }

    /* Related Products */
    .related-products {
      margin-top: 3rem;
      padding-top: 3rem;
      border-top: 1px solid var(--border);
    }

    .related-title {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
    }

    .product-card-small {
      background: var(--bg-white);
      border-radius: var(--radius-md);
      overflow: hidden;
      box-shadow: var(--shadow-sm);
      transition: var(--transition);
    }

    .product-card-small:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-md);
    }

    .product-card-small img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .product-card-small-info {
      padding: 1rem;
    }

    .product-card-small-name {
      font-size: 0.9rem;
      font-weight: 600;
      margin-bottom: 0.5rem;
      min-height: 2.1em;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .product-card-small-price {
      color: var(--primary);
      font-weight: 700;
      font-size: 1rem;
    }

    /* Footer */
    footer {
      background: var(--text-dark);
      color: white;
      padding: 3rem 0 1rem;
      margin-top: 4rem;
    }

    @media (max-width: 768px) {
      .product-details {
        padding: 1.5rem;
      }

      .add-to-cart-section {
        flex-direction: column;
      }

      .btn-add-cart {
        width: 100%;
      }

      .gallery-main {
        height: 300px;
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

          <!-- Wishlist -->
          <button class="nav-icon-btn" title="Wishlist">
            <i class="bi bi-heart"></i>
          </button>

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

  <!-- MAIN CONTENT -->
  <main class="container-fluid px-3 px-lg-5" style="padding: 2rem 0;">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="breadcrumb-custom">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Produk</a></li>
        <li class="breadcrumb-item active">{{ $product->name }}</li>
      </ol>
    </nav>

    <div class="row g-4">
      <!-- Gallery -->
      <div class="col-lg-5">
        <div class="gallery-wrapper">
          <div class="gallery-main" id="galleryMain">
            @if($product->image)
              <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            @else
              <div class="text-center text-muted" style="flex: 1; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-image" style="font-size: 3rem;"></i>
              </div>
            @endif
          </div>
          <div class="gallery-thumbnails">
            @if($product->image)
              <div class="gallery-thumb active" onclick="changeGalleryImage('{{ asset('storage/' . $product->image) }}')">
                <img src="{{ asset('storage/' . $product->image) }}" alt="Thumb 1">
              </div>
            @endif
            <!-- Additional thumbnails can be added here -->
          </div>
        </div>
      </div>

      <!-- Product Details -->
      <div class="col-lg-7">
        <div class="product-details">
          <h1 class="product-title">{{ $product->name }}</h1>

          <!-- Meta Info -->
          <div class="product-meta">
            <div class="meta-item">
              <span class="meta-label">Kategori</span>
              <span class="meta-value">{{ $product->category?->name ?? 'Tidak Ada' }}</span>
            </div>
            <div class="meta-item">
              <span class="meta-label">Rating</span>
              <div style="display: flex; gap: 0.25rem; color: #fbbf24;">
                @for($i = 0; $i < 5; $i++)
                  <i class="bi bi-star-fill"></i>
                @endfor
              </div>
              <span class="meta-value">({{ rand(50, 500) }} review)</span>
            </div>
          </div>

          <!-- Price Section -->
          <div class="price-section">
            <div class="price-badge">-25% Diskon</div>
            <div class="d-flex align-items-baseline gap-2 mb-2">
              <span class="price-original">Rp {{ number_format($product->price + 500000, 0, ',', '.') }}</span>
            </div>
            <div class="price-current">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
            <div class="price-savings">Hemat Rp {{ number_format(500000, 0, ',', '.') }}</div>
          </div>

          <!-- Stock Status -->
          <div class="stock-section">
            <div class="stock-status available">
              <i class="bi bi-check-circle-fill"></i> Stok Tersedia: {{ rand(5, 100) }} produk
            </div>
            <small style="display: block; margin-top: 0.5rem; color: var(--text-muted);">
              <i class="bi bi-geo-alt-fill"></i> Dikirim dari: Jakarta Pusat
            </small>
          </div>

          <!-- Add to Cart -->
          <form method="POST" action="{{ route('cart.add') }}" class="mb-3">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            
            <div class="add-to-cart-section">
              <div class="quantity-picker">
                <button type="button" class="qty-btn" onclick="decreaseQty()">−</button>
                <input type="number" name="quantity" id="quantity" value="1" min="1" max="100" class="qty-input">
                <button type="button" class="qty-btn" onclick="increaseQty()">+</button>
              </div>
              <button type="submit" class="btn-add-cart">
                <i class="bi bi-bag-plus"></i> Tambah ke Keranjang
              </button>
              <button type="button" class="btn-wishlist" title="Tambah ke Wishlist">
                <i class="bi bi-heart"></i>
              </button>
            </div>
          </form>

          <!-- Social Proof -->
          <div class="social-proof">
            <div class="proof-item">
              <i class="bi bi-truck"></i>
              <span><strong>Pengiriman Gratis</strong> untuk pembelian > Rp 100.000</span>
            </div>
            <div class="proof-item">
              <i class="bi bi-shield-check"></i>
              <span><strong>Produk Original</strong> dengan garansi resmi</span>
            </div>
            <div class="proof-item">
              <i class="bi bi-arrow-repeat"></i>
              <span><strong>Garansi Uang Kembali</strong> 30 hari jika tidak puas</span>
            </div>
            <div class="proof-item">
              <i class="bi bi-people-fill"></i>
              <span><strong>{{ rand(100, 10000) }} orang</strong> sedang melihat produk ini</span>
            </div>
          </div>

          <!-- Back Button -->
          <a href="{{ url('/') }}" class="btn btn-outline-secondary mt-3 w-100">
            <i class="bi bi-arrow-left"></i> Kembali ke Produk
          </a>
        </div>
      </div>
    </div>

    <!-- Tabs Section -->
    <div class="row mt-4">
      <div class="col-12">
        <ul class="nav nav-tabs-custom" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" role="tab">
              Deskripsi Produk
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs" role="tab">
              Spesifikasi
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" role="tab">
              Ulasan ({{ rand(10, 100) }})
            </button>
          </li>
        </ul>

        <div class="tab-content tab-content-custom">
          <!-- Description Tab -->
          <div class="tab-pane fade show active" id="description" role="tabpanel">
            <h6 class="fw-bold mb-3">Deskripsi Lengkap</h6>
            <p>{{ $product->description }}</p>
            <p>Produk ini adalah pilihan terbaik untuk kebutuhan Anda dengan kualitas premium dan harga kompetitif. Dibuat dengan bahan berkualitas tinggi dan telah melewati quality control yang ketat.</p>
          </div>

          <!-- Specs Tab -->
          <div class="tab-pane fade" id="specs" role="tabpanel">
            <h6 class="fw-bold mb-3">Spesifikasi Teknis</h6>
            <table class="table table-borderless">
              <tr>
                <td class="fw-bold" style="color: var(--text-muted); width: 30%;">Berat</td>
                <td>{{ rand(100, 5000) }}g</td>
              </tr>
              <tr>
                <td class="fw-bold" style="color: var(--text-muted);">Dimensi</td>
                <td>{{ rand(10, 50) }}cm × {{ rand(10, 50) }}cm × {{ rand(5, 30) }}cm</td>
              </tr>
              <tr>
                <td class="fw-bold" style="color: var(--text-muted);">Material</td>
                <td>Premium Grade</td>
              </tr>
              <tr>
                <td class="fw-bold" style="color: var(--text-muted);">Garansi</td>
                <td>1 Tahun Garansi Resmi</td>
              </tr>
              <tr>
                <td class="fw-bold" style="color: var(--text-muted);">Warna</td>
                <td>Standar</td>
              </tr>
            </table>
          </div>

          <!-- Reviews Tab -->
          <div class="tab-pane fade" id="reviews" role="tabpanel">
            <h6 class="fw-bold mb-3">Ulasan Pembeli</h6>
            
            <!-- Review Item -->
            @for($i = 0; $i < 3; $i++)
            <div style="padding-bottom: 1.5rem; border-bottom: 1px solid var(--border); margin-bottom: 1.5rem;">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                  <strong style="color: var(--text-dark);">Pembeli {{ $i + 1 }}</strong>
                  <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 0.25rem;">
                    <i class="bi bi-verified"></i> Pembelian Terverifikasi
                  </div>
                </div>
                <span style="color: var(--text-muted); font-size: 0.85rem;">{{ rand(1, 30) }} hari lalu</span>
              </div>
              <div style="display: flex; gap: 0.2rem; color: #fbbf24; margin-bottom: 0.75rem;">
                @for($j = 0; $j < 5; $j++)
                  <i class="bi bi-star-fill" style="font-size: 0.9rem;"></i>
                @endfor
              </div>
              <p style="margin-bottom: 0; color: var(--text-dark);">Produk berkualitas, sangat memuaskan. Sesuai dengan deskripsi dan pengiriman cepat. Recommended!</p>
            </div>
            @endfor
          </div>
        </div>
      </div>
    </div>

    <!-- Related Products -->
    <div class="related-products">
      <h3 class="related-title">Produk Terkait</h3>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
        @php
          $relatedProducts = \App\Models\Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();
        @endphp
        @forelse($relatedProducts as $item)
          <div class="col">
            <div class="product-card-small">
              @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
              @else
                <div style="height: 200px; background: var(--bg-light); display: flex; align-items: center; justify-content: center;">
                  <i class="bi bi-image text-muted" style="font-size: 2rem;"></i>
                </div>
              @endif
              <div class="product-card-small-info">
                <h6 class="product-card-small-name">{{ $item->name }}</h6>
                <div class="product-card-small-price">Rp {{ number_format($item->price, 0, ',', '.') }}</div>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12 text-center py-5">
            <p style="color: var(--text-muted);">Tidak ada produk terkait</p>
          </div>
        @endforelse
      </div>
    </div>
  </main>

  <!-- FOOTER -->
  <footer>
    <div class="container-fluid px-3 px-lg-5">
      <div class="text-center py-3" style="border-top: 1px solid rgba(255,255,255,0.1);">
        <p style="color: rgba(255,255,255,0.6); margin: 0;">&copy; 2026 PT Gassbel Indonesia. Semua hak dilindungi.</p>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Quantity Functions
    function increaseQty() {
      const input = document.getElementById('quantity');
      input.value = Math.min(parseInt(input.value) + 1, parseInt(input.max));
    }

    function decreaseQty() {
      const input = document.getElementById('quantity');
      input.value = Math.max(parseInt(input.value) - 1, parseInt(input.min));
    }

    // Gallery Image Change
    function changeGalleryImage(src) {
      const galleryMain = document.getElementById('galleryMain');
      galleryMain.innerHTML = `<img src="${src}" alt="Product Image">`;
      
      // Update active thumbnail
      document.querySelectorAll('.gallery-thumb').forEach(thumb => {
        thumb.classList.remove('active');
      });
      event.target.closest('.gallery-thumb').classList.add('active');
    }

    // Wishlist Toggle
    document.querySelector('.btn-wishlist')?.addEventListener('click', function() {
      this.classList.toggle('active');
      this.style.borderColor = this.classList.contains('active') ? 'var(--danger)' : 'var(--border)';
      this.style.color = this.classList.contains('active') ? 'var(--danger)' : 'var(--text-muted)';
    });
  </script>
</body>
</html>
