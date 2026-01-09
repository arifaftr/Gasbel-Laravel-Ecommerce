<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Gassbel - Toko Online Terpercaya dengan Produk Berkualitas">
  <title>Gasbel - Belanja Online Terpercaya</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    /* ============= DESIGN SYSTEM ============= */
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

    html, body {
      background-color: var(--bg-light);
      color: var(--text-dark);
      overflow-x: hidden;
    }

    /* ============= NAVIGATION BAR ============= */
    .navbar-premium {
      background: var(--bg-white);
      box-shadow: var(--shadow-sm);
      padding: 0.75rem 0;
      position: sticky;
      top: 0;
      z-index: 1030;
    }

    .navbar-brand {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--primary) !important;
      letter-spacing: -0.5px;
    }

    .navbar-brand small {
      display: block;
      font-size: 0.5rem;
      font-weight: 400;
      color: var(--text-muted);
      letter-spacing: 1px;
    }

    /* Search Bar */
    .search-container {
      flex: 1;
      max-width: 700px;
      width: 100%;
      margin: 0 2rem;
    }

    .search-bar {
      position: relative;
    }

    .search-bar input {
      border: 2px solid var(--border);
      border-radius: var(--radius-sm);
      padding: 0.6rem 1rem 0.6rem 2.5rem;
      font-size: 0.9rem;
      transition: var(--transition);
    }

    .search-bar input:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
      outline: none;
    }

    .search-bar i {
      position: absolute;
      left: 0.75rem;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-muted);
      font-size: 0.95rem;
    }

    /* Nav Icons */
    .nav-icons {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .nav-icon-btn {
      position: relative;
      background: none;
      border: none;
      color: var(--text-muted);
      font-size: 1.25rem;
      cursor: pointer;
      transition: var(--transition);
      padding: 0.5rem;
      border-radius: 50%;
    }

    .nav-icon-btn:hover {
      color: var(--primary);
      background-color: rgba(37, 99, 235, 0.1);
    }

    /* Cart Badge */
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
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }

    /* Mobile Menu Toggle */
    .navbar-toggler {
      border: none;
      padding: 0;
    }

    .navbar-toggler:focus {
      box-shadow: none;
      outline: 2px solid var(--primary);
      outline-offset: 2px;
    }

    /* ============= HERO SECTION ============= */
    .hero-section {
    background: linear-gradient(135deg, #0f766e, #14b8a6, #34d399);

    color: white;
    padding: 4rem 0;
    position: relative;
    overflow: hidden;
  }

    .hero-section::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -10%;
      width: 400px;
      height: 400px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0) translateX(0); }
      50% { transform: translateY(-20px) translateX(-20px); }
    }

    .hero-content {
      position: relative;
      z-index: 2;
    }

    .hero-headline {
      font-size: clamp(1.5rem, 5vw, 2.5rem);
      font-weight: 700;
      margin-bottom: 1rem;
      line-height: 1.2;
    }

    .hero-subheadline {
      font-size: 1.1rem;
      font-weight: 400;
      margin-bottom: 2rem;
      opacity: 0.95;
      max-width: 500px;
    }

    .hero-cta {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
    }

    .btn-cta-primary {
      background: white;
      color: var(--primary);
      padding: 0.75rem 2rem;
      border-radius: var(--radius-md);
      font-weight: 600;
      border: none;
      cursor: pointer;
      transition: var(--transition);
      box-shadow: var(--shadow-sm);
    }

    .btn-cta-primary:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }

    .btn-cta-secondary {
      background: rgba(255, 255, 255, 0.2);
      color: white;
      padding: 0.75rem 2rem;
      border: 2px solid white;
      border-radius: var(--radius-md);
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
    }

    .btn-cta-secondary:hover {
      background: white;
      color: var(--primary);
    }

    /* Trust Badges */
    .trust-badges {
      display: flex;
      gap: 2rem;
      margin-top: 3rem;
      flex-wrap: wrap;
    }

    .trust-badge {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      font-size: 0.9rem;
    }

    .trust-badge i {
      font-size: 1.5rem;
      opacity: 0.9;
    }

    /* ============= FILTER SIDEBAR ============= */
    .filter-sidebar {
      background: var(--bg-white);
      border-radius: var(--radius-md);
      padding: 1.5rem;
      height: fit-content;
      box-shadow: var(--shadow-sm);
      position: sticky;
      top: 100px;
      border: 1px solid var(--border);
    }

    .filter-title {
      font-size: 1rem;
      font-weight: 700;
      margin-bottom: 1rem;
      color: var(--text-dark);
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .filter-group {
      margin-bottom: 1.5rem;
      padding-bottom: 1.5rem;
      border-bottom: 1px solid var(--border);
    }

    .filter-group:last-child {
      border-bottom: none;
      margin-bottom: 1rem;
    }

    .filter-label {
      font-size: 0.85rem;
      font-weight: 500;
      color: var(--text-dark);
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      transition: var(--transition);
      padding: 0.4rem 0;
    }

    .filter-label:hover {
      color: var(--primary);
      transform: translateX(2px);
    }

    .filter-label input[type="checkbox"] {
      cursor: pointer;
      accent-color: var(--primary);
      width: 16px;
      height: 16px;
      border-radius: 3px;
    }

    .filter-item {
      margin-bottom: 0.75rem;
    }

    .filter-item:last-child {
      margin-bottom: 0;
    }

    /* Price Range Slider */
    .price-range-input {
      width: 100%;
      height: 4px;
      border-radius: 2px;
      background: var(--border);
      outline: none;
      -webkit-appearance: none;
      appearance: none;
    }

    .price-range-input::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background: var(--primary);
      cursor: pointer;
      box-shadow: var(--shadow-sm);
    }

    .price-range-input::-moz-range-thumb {
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background: var(--primary);
      cursor: pointer;
      border: none;
      box-shadow: var(--shadow-sm);
    }

    /* ============= PRODUCT GRID ============= */
    .product-card {
      background: var(--bg-white);
      border-radius: var(--radius-md);
      overflow: hidden;
      box-shadow: var(--shadow-sm);
      transition: var(--transition);
      height: 100%;
      display: flex;
      flex-direction: column;
      position: relative;
    }

    .product-card:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow-md);
    }

    .product-image-wrapper {
      position: relative;
      overflow: hidden;
      height: 250px;
      background: var(--bg-light);
    }

    .product-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: var(--transition);
    }

    .product-card:hover .product-image {
      transform: scale(1.08);
    }

    /* Product Badges */
    .product-badges {
      position: absolute;
      top: 12px;
      left: 12px;
      display: flex;
      gap: 0.5rem;
      flex-wrap: wrap;
    }

    .badge-custom {
      padding: 0.4rem 0.8rem;
      border-radius: 4px;
      font-size: 0.75rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .badge-diskon {
      background: var(--danger);
      color: white;
    }

    .badge-terlaris {
      background: var(--warning);
      color: white;
    }

    .badge-baru {
      background: var(--accent);
      color: white;
    }

    .badge-stok {
      background: #f97316;
      color: white;
    }

    /* Wishlist Button */
    .wishlist-btn {
      position: absolute;
      top: 12px;
      right: 12px;
      background: rgba(255, 255, 255, 0.95);
      border: none;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--text-muted);
      transition: var(--transition);
      box-shadow: var(--shadow-sm);
      z-index: 5;
    }

    .wishlist-btn:hover {
      background: white;
      color: var(--danger);
      transform: scale(1.1);
    }

    .wishlist-btn.active {
      color: var(--danger);
    }

    /* Quick View Overlay */
    .quick-view-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: rgba(0, 0, 0, 0.8);
      color: white;
      padding: 1rem;
      transform: translateY(100%);
      transition: var(--transition);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      height: 50px;
    }

    .product-card:hover .quick-view-overlay {
      transform: translateY(0);
    }

    .quick-view-overlay button {
      background: var(--primary);
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: var(--radius-sm);
      cursor: pointer;
      font-weight: 600;
      transition: var(--transition);
      flex: 1;
    }

    .quick-view-overlay button:hover {
      background: var(--primary-dark);
    }

    .product-info {
      padding: 1.2rem 1rem;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .product-category {
      font-size: 0.75rem;
      font-weight: 600;
      color: var(--primary);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 0.4rem;
    }

    .product-name {
      font-size: 0.95rem;
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 0.5rem;
      min-height: 2.4em;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    /* Rating */
    .product-rating {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      margin-bottom: 0.75rem;
      font-size: 0.85rem;
    }

    .stars {
      display: flex;
      gap: 0.2rem;
      color: #fbbf24;
    }

    .star {
      font-size: 0.9rem;
    }

    .review-count {
      color: var(--text-muted);
    }

    /* Price Section */
    .price-section {
      margin-bottom: 0.75rem;
    }

    .price-current {
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--primary);
    }

    .price-original {
      font-size: 0.9rem;
      color: var(--text-muted);
      text-decoration: line-through;
      margin-right: 0.5rem;
    }

    .price-discount {
      background: var(--danger);
      color: white;
      padding: 0.2rem 0.6rem;
      border-radius: 4px;
      font-size: 0.8rem;
      font-weight: 600;
    }

    /* Stock Status */
    .stock-status {
      font-size: 0.85rem;
      font-weight: 500;
      margin-bottom: 0.75rem;
    }

    .stock-available {
      color: var(--accent);
    }

    .stock-limited {
      color: var(--warning);
    }

    .stock-out {
      color: var(--danger);
    }

    /* Action Buttons Container */
    .action-buttons {
      display: grid;
      grid-template-columns: 1fr 1.3fr;
      gap: 0.5rem;
      width: 100%;
      margin-top: auto;
    }

    /* View Detail Button */
    .btn-view-detail {
      background: linear-gradient(135deg, var(--accent-light), #e0f2fe);
      color: var(--primary);
      border: 2px solid var(--primary);
      padding: 0.65rem 0.5rem;
      border-radius: var(--radius-sm);
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.4rem;
      font-size: 0.8rem;
      text-decoration: none;
      white-space: nowrap;
    }

    .btn-view-detail:hover {
      background: var(--primary);
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(15, 118, 110, 0.3);
    }

    /* Add to Cart Button */
    .btn-add-cart {
      background: linear-gradient(135deg, var(--primary), #0d5f56);
      color: white;
      border: none;
      padding: 0.65rem 0.5rem;
      border-radius: var(--radius-sm);
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.4rem;
      font-size: 0.8rem;
      width: 100%;
    }

    .btn-add-cart:hover {
      background: var(--primary-dark);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(15, 118, 110, 0.3);
    }

    .btn-add-cart:active {
      transform: translateY(0);
      box-shadow: 0 2px 6px rgba(15, 118, 110, 0.2);
    }

    /* Sort Form Styles */
    .form-select {
      border: 1px solid var(--border);
      border-radius: var(--radius-sm);
      padding: 0.5rem 0.75rem;
      font-size: 0.9rem;
      color: var(--text-dark);
      transition: var(--transition);
      background-color: var(--bg-white);
      cursor: pointer;
    }

    .form-select:hover {
      border-color: var(--primary);
    }

    .form-select:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.1);
    }

    /* Clear Filter Button */
    .btn-clear-filter {
      width: 100%;
      padding: 0.75rem;
      border: 2px solid var(--border);
      background: white;
      border-radius: 6px;
      cursor: pointer;
      font-weight: 600;
      color: var(--text-muted);
      transition: var(--transition);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }

    .btn-clear-filter:hover {
      border-color: var(--primary);
      color: var(--primary);
    }
    .sort-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .sort-select {
      padding: 0.6rem 1rem;
      border: 2px solid var(--border);
      border-radius: var(--radius-sm);
      font-size: 0.9rem;
      color: var(--text-dark);
      cursor: pointer;
      background: var(--bg-white);
      transition: var(--transition);
    }

    .sort-select:hover {
      border-color: var(--primary);
    }

    .sort-select:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .results-info {
      color: var(--text-muted);
      font-size: 0.9rem;
    }

    /* ============= FOOTER ============= */
    footer {
      background: var(--text-dark);
      color: white;
      padding: 2.5rem 0 1.25rem;
      margin-top: 4rem;
      width: 100%;
      box-sizing: border-box;
    }

    .footer-section-title {
      font-size: 1rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
    }

    .footer-link {
      display: block;
      color: rgba(255, 255, 255, 0.7);
      text-decoration: none;
      font-size: 0.9rem;
      margin-bottom: 0.75rem;
      transition: var(--transition);
    }

    .footer-link:hover {
      color: white;
      padding-left: 0.5rem;
    }

    .footer-contact {
      font-size: 0.9rem;
      color: rgba(255, 255, 255, 0.7);
      margin-bottom: 0.75rem;
    }

    .footer-contact i {
      margin-right: 0.5rem;
      color: var(--primary);
    }

    /* Newsletter */
    .newsletter-form {
      display: flex;
      gap: 0.5rem;
    }

    .newsletter-form input {
      flex: 1;
      padding: 0.75rem 1rem;
      border: none;
      border-radius: var(--radius-sm);
      font-size: 0.9rem;
    }

    .newsletter-form button {
      background: var(--primary);
      color: white;
      border: none;
      padding: 0.75rem 1.5rem;
      border-radius: var(--radius-sm);
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
    }

    .newsletter-form button:hover {
      background: var(--primary-dark);
    }

    /* Social Icons */
    .social-icons {
      display: flex;
      gap: 1rem;
      margin-top: 1rem;
    }

    .social-icon {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      color: white;
      cursor: pointer;
      transition: var(--transition);
      text-decoration: none;
    }

    .social-icon:hover {
      background: var(--primary);
      transform: translateY(-3px);
    }

    /* Payment Methods */
    .payment-methods {
      display: flex;
      gap: 0.5rem;
      flex-wrap: wrap;
      margin-top: 1rem;
    }

    .payment-badge {
      background: rgba(255, 255, 255, 0.1);
      padding: 0.4rem 0.8rem;
      border-radius: 4px;
      font-size: 0.75rem;
      font-weight: 600;
      color: white;
    }

    .footer-bottom {
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      padding-top: 2rem;
      text-align: center;
      color: rgba(255, 255, 255, 0.6);
      font-size: 0.9rem;
    }

    /* ============= RESPONSIVE ============= */
    @media (max-width: 768px) {
      .search-container {
        display: none;
      }

      .hero-headline {
        font-size: 1.75rem;
      }

      .hero-subheadline {
        font-size: 1rem;
      }

      .trust-badges {
        gap: 1rem;
      }

      .filter-sidebar {
        position: static;
        margin-bottom: 2rem;
      }

      .sort-container {
        flex-direction: column;
        align-items: flex-start;
      }

      .newsletter-form {
        flex-direction: column;
      }

      .nav-icons {
        gap: 0.5rem;
      }

      /* Mobile action buttons */
      .action-buttons {
        grid-template-columns: 1fr 1.5fr;
        gap: 0.4rem;
      }

      .btn-view-detail,
      .btn-add-cart {
        padding: 0.55rem 0.4rem;
        font-size: 0.75rem;
      }

      .btn-view-detail i,
      .btn-add-cart i {
        display: none;
      }

      .product-name {
        font-size: 0.9rem;
        min-height: 2em;
      }
    }

    @media (max-width: 576px) {
      .action-buttons {
        grid-template-columns: 1fr;
      }

      .btn-view-detail,
      .btn-add-cart {
        padding: 0.65rem;
        font-size: 0.8rem;
      }

      .btn-view-detail i,
      .btn-add-cart i {
        display: inline;
      }
    }

  </style>
</head>

<body>
  <!-- ============= NAVIGATION BAR ============= -->
  <nav class="navbar navbar-expand-lg navbar-premium">
    <div class="container-fluid px-3 px-lg-5">
      <!-- Brand -->
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('images/gasbel.png') }}" alt="Gassbel Logo" style="width:150px; height:auto;">
        <small>Official Store</small>
      </a>

      <!-- Toggler for mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bi bi-list"></i>
      </button>

      <!-- Search Bar (Hidden on Mobile) -->
      <div class="search-container d-none d-md-block">
        <div class="search-bar">
          <i class="bi bi-search"></i>
          <input type="text" placeholder="Cari produk, brand, atau kategori..." class="form-control" id="searchInput">
        </div>
      </div>

      <!-- Nav Items -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="nav-icons ms-auto">
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
          <!-- <button class="nav-icon-btn" type="button" title="Wishlist">
            <i class="bi bi-heart"></i>
          </button> -->

          <!-- Cart -->
          <a href="{{ route('cart.index') }}" class="nav-icon-btn position-relative" title="Keranjang Belanja">
            <i class="bi bi-bag"></i>
            @if(!empty($cartItemCount) && $cartItemCount > 0)
              <span class="badge-cart">{{ $cartItemCount }}</span>
            @endif
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- ============= HERO SECTION ============= -->
  <section class="hero-section">
    <div class="container-fluid px-3 px-lg-5">
      <div class="row align-items-center">
        <div class="col-lg-6 hero-content">
          <h1 class="hero-headline">Belanja Produk Terbaik dengan Harga Terjangkau</h1>
          <p class="hero-subheadline">Temukan ribuan produk pilihan dari brand ternama. Belanja aman, cepat, dan terpercaya hanya di Gassbel.</p>
          
          <div class="hero-cta">
            <button class="btn-cta-primary" onclick="document.getElementById('products').scrollIntoView({behavior: 'smooth'})">
              Jelajahi Koleksi <i class="bi bi-arrow-right"></i>
            </button>
            <button class="btn-cta-secondary">
              <i class="bi bi-gift"></i> Lihat Promo
            </button>
          </div>

          <div class="trust-badges">
            <div class="trust-badge">
              <i class="bi bi-truck"></i>
              <div>
                <div style="font-weight: 600; font-size: 0.95rem;">Pengiriman Cepat</div>
                <div style="font-size: 0.8rem; opacity: 0.9;">1-3 hari kerja</div>
              </div>
            </div>
            <div class="trust-badge">
              <i class="bi bi-shield-check"></i>
              <div>
                <div style="font-weight: 600; font-size: 0.95rem;">100% Aman</div>
                <div style="font-size: 0.8rem; opacity: 0.9;">Pembayaran terenkripsi</div>
              </div>
            </div>
            <div class="trust-badge">
              <i class="bi bi-award"></i>
              <div>
                <div style="font-weight: 600; font-size: 0.95rem;">Produk Original</div>
                <div style="font-size: 0.8rem; opacity: 0.9;">Garansi resmi</div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>

  <!-- ============= MAIN CONTENT ============= -->
  <div class="container-fluid px-3 px-lg-5" style="padding: 2rem 0;" id="products">
    <div class="row">
      <!-- SIDEBAR FILTER -->
      <div class="col-lg-3 mb-4 mb-lg-0">
        <div class="filter-sidebar">
          <h5 class="filter-title"><i class="bi bi-funnel"></i> Filter</h5>

          <form id="filterForm" method="GET" action="{{ route('products.filter') }}">
            <!-- Category Filter -->
            <div class="filter-group">
              <div class="filter-title" style="font-size: 0.9rem; margin-bottom: 0.75rem;">Kategori</div>
              <div class="filter-item">
                <label class="filter-label">
                  <input type="checkbox" name="categories[]" value="" class="category-checkbox" checked> Semua Kategori
                </label>
              </div>
              @php
                $categories = \App\Models\Category::all();
              @endphp
              @foreach($categories as $category)
                <div class="filter-item">
                  <label class="filter-label">
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="category-checkbox"> {{ $category->name }}
                  </label>
                </div>
              @endforeach
            </div>

            <!-- Price Range Filter -->
            <div class="filter-group">
              <div class="filter-title" style="font-size: 0.9rem; margin-bottom: 1rem;">Harga</div>
              <div style="margin-bottom: 1rem;">
                <input type="range" min="0" max="10000000" value="5000000" class="price-range-input" id="priceRange" name="max_price">
                <div style="display: flex; justify-content: space-between; margin-top: 0.75rem; font-size: 0.85rem;">
                  <span>Rp 0</span>
                  <span>Rp <span id="priceValue">5000000</span></span>
                </div>
                <input type="hidden" name="min_price" value="0">
              </div>
            </div>

            <!-- Rating Filter -->
            <div class="filter-group">
              <div class="filter-title" style="font-size: 0.9rem; margin-bottom: 0.75rem;">Rating</div>
              @for($i = 5; $i >= 3; $i--)
                <div class="filter-item">
                  <label class="filter-label">
                    <input type="checkbox" name="rating" value="{{ $i }}" class="rating-checkbox">
                    <span class="stars">
                      @for($j = 0; $j < $i; $j++)
                        <i class="bi bi-star-fill star" style="font-size: 0.75rem;"></i>
                      @endfor
                    </span>
                    <span>({{ rand(10, 500) }})</span>
                  </label>
                </div>
              @endfor
            </div>

            <!-- Sort -->
            <div class="filter-group">
              <div class="filter-title" style="font-size: 0.9rem; margin-bottom: 0.75rem;">Urutkan</div>
              <select name="sort" id="sortSelect" class="form-select">
                <option value="popular">Terpopuler</option>
                <option value="price_low">Harga: Terendah</option>
                <option value="price_high">Harga: Tertinggi</option>
                <option value="newest">Terbaru</option>
                <option value="rating">Rating Tertinggi</option>
              </select>
            </div>

            <!-- Clear Filters -->
            <button type="reset" class="btn-clear-filter">
              <i class="bi bi-x-circle"></i> Hapus Filter
            </button>
          </form>
        </div>
      </div>

      <!-- PRODUCT GRID -->
      <div class="col-lg-9">
        <!-- Sorting & Results Info -->
        <!-- <div class="sort-container">
          <div class="results-info">
            Menampilkan <strong id="product-count">{{ $products->count() }}</strong> produk
          </div>
          <select class="sort-select" id="sortSelect" onchange="applyFilters()">
            <option value="popular">Terpopuler</option>
            <option value="price_low">Harga: Terendah</option>
            <option value="price_high">Harga: Tertinggi</option>
            <option value="newest">Terbaru</option>
            <option value="rating">Rating Tertinggi</option>
          </select>
        </div> -->

        <!-- Product Grid -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4 mb-4" id="products-grid">
          @include('components.product-grid', ['products' => $products])
        </div>
        <!-- Pagination (if needed) -->
        <!-- @if($products->count() > 0)
        <nav aria-label="Page navigation" class="d-flex justify-content-center">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Sebelumnya</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Berikutnya</a></li>
          </ul>
        </nav>
        @endif -->
      </div>
    </div>
  </div>

  <!-- ============= FOOTER ============= -->
  <footer>
    <div class="container px-3 px-lg-5">
      <div class="row mb-4">
        <!-- About -->
        <div class="col-md-3 mb-4 mb-md-0">
          <h6 class="footer-section-title">Tentang Gassbel</h6>
          <p style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.7); margin-bottom: 1rem;">
            Gassbel adalah platform e-commerce terpercaya yang menyediakan produk berkualitas dengan harga terjangkau.
          </p>
          <div class="footer-contact">
            <i class="bi bi-telephone-fill"></i> +62 812-3456-7890
          </div>
          <div class="footer-contact">
            <i class="bi bi-envelope-fill"></i> support@gassbel.com
          </div>
        </div>

        <!-- Help -->
        <div class="col-md-3 mb-4 mb-md-0">
          <h6 class="footer-section-title">Bantuan & Dukungan</h6>
          <a href="#" class="footer-link">Cara Berbelanja</a>
          <a href="#" class="footer-link">Pengiriman</a>
          <a href="#" class="footer-link">Pengembalian Barang</a>
          <a href="#" class="footer-link">FAQ</a>
          <a href="#" class="footer-link">Hubungi Kami</a>
        </div>

        <!-- Policies -->
        <div class="col-md-3 mb-4 mb-md-0">
          <h6 class="footer-section-title">Kebijakan</h6>
          <a href="#" class="footer-link">Syarat & Ketentuan</a>
          <a href="#" class="footer-link">Kebijakan Privasi</a>
          <a href="#" class="footer-link">Kebijakan Cookie</a>
          <a href="#" class="footer-link">Jaminan Keaslian</a>
        </div>

        <!-- Newsletter -->
        <div class="col-md-3">
          <h6 class="footer-section-title">Newsletter</h6>
          <p style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.7); margin-bottom: 1rem;">
            Dapatkan penawaran eksklusif dan update produk terbaru
          </p>
          <form class="newsletter-form">
            <input type="email" placeholder="Email Anda" required>
            <button type="submit"><i class="bi bi-arrow-right"></i></button>
          </form>
        </div>
      </div>

      <!-- Social & Payment -->
      <div class="row py-3" style="border-top: 1px solid rgba(255, 255, 255, 0.1); border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
        <div class="col-md-6 mb-3 mb-md-0">
          <h6 style="color: white; font-weight: 600; margin-bottom: 0.75rem;">Ikuti Kami</h6>
          <div class="social-icons">
            <a href="#" class="social-icon" title="Facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="social-icon" title="Instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="social-icon" title="Twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="social-icon" title="YouTube"><i class="bi bi-youtube"></i></a>
          </div>
        </div>
        <div class="col-md-6">
          <h6 style="color: white; font-weight: 600; margin-bottom: 0.75rem;">Metode Pembayaran</h6>
          <div class="payment-methods">
            <span class="payment-badge"><i class="bi bi-credit-card"></i> Kartu Kredit</span>
            <span class="payment-badge"><i class="bi bi-wallet2"></i> e-Wallet</span>
            <span class="payment-badge"><i class="bi bi-bank"></i> Transfer Bank</span>
            <span class="payment-badge">COD</span>
          </div>
        </div>
      </div>

      <!-- Footer Bottom
      <div class="footer-bottom">
        <p>&copy; 2026 PT Gassbel Indonesia. Semua hak dilindungi. | Developed with <i class="bi bi-heart-fill" style="color: var(--danger);"></i> by Gassbel Team</p>
      </div> -->
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Price Range Update
    document.getElementById('priceRange').addEventListener('input', function() {
      document.getElementById('priceValue').textContent = new Intl.NumberFormat('id-ID').format(this.value);
      document.querySelector('input[name="max_price"]').value = this.value;
      applyFilters();
    });

    // Category filter change
    document.querySelectorAll('.category-checkbox').forEach(checkbox => {
      checkbox.addEventListener('change', function() {
        // Uncheck "Semua Kategori" if any specific category is checked
        if (this.value && this.checked) {
          const allCategories = document.querySelector('input[value=""]');
          if (allCategories) allCategories.checked = false;
        }
        applyFilters();
      });
    });

    // Rating filter change
    document.querySelectorAll('.rating-checkbox').forEach(checkbox => {
      checkbox.addEventListener('change', applyFilters);
    });

    // Sort dropdown change
    document.getElementById('sortSelect').addEventListener('change', applyFilters);

    // Reset button
    document.getElementById('filterForm').addEventListener('reset', function(e) {
      setTimeout(() => {
        applyFilters();
      }, 50);
    });

    // Apply filters function
    function applyFilters() {
      const formData = new FormData(document.getElementById('filterForm'));
      const params = new URLSearchParams();

      // Get selected categories
      const categories = [];
      document.querySelectorAll('.category-checkbox:checked').forEach(checkbox => {
        if (checkbox.value) {
          categories.push(checkbox.value);
        }
      });
      
      if (categories.length > 0) {
        categories.forEach(cat => params.append('categories[]', cat));
      }

      // Get price range
      params.append('max_price', document.getElementById('priceRange').value);
      params.append('min_price', document.querySelector('input[name="min_price"]').value);

      // Get selected rating
      const rating = document.querySelector('.rating-checkbox:checked');
      if (rating) {
        params.append('rating', rating.value);
      }

      // Get sort option
      params.append('sort', document.getElementById('sortSelect').value);

      // Make request
      fetch(`{{ route('products.filter') }}?${params.toString()}`, {
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
      .then(response => response.json())
      .then(data => {
        document.getElementById('products-grid').innerHTML = data.html;
        document.getElementById('product-count').textContent = data.count;
        
        // Re-bind event listeners for new elements
        bindWishlistButtons();
        bindCartButtons();
      })
      .catch(error => console.error('Error:', error));
    }

    // Wishlist Toggle
    function bindWishlistButtons() {
      document.querySelectorAll('.wishlist-btn').forEach(btn => {
        btn.removeEventListener('click', wishlistClickHandler);
        btn.addEventListener('click', wishlistClickHandler);
      });
    }

    function wishlistClickHandler(e) {
      e.preventDefault();
      this.classList.toggle('active');
    }

    // Add to Cart Animation
    function bindCartButtons() {
      document.querySelectorAll('.btn-add-cart').forEach(btn => {
        btn.removeEventListener('click', cartClickHandler);
        btn.addEventListener('click', cartClickHandler);
      });
    }

    function cartClickHandler() {
      // Create ripple effect
      const ripple = document.createElement('span');
      ripple.style.position = 'absolute';
      ripple.style.borderRadius = '50%';
      ripple.style.background = 'rgba(255, 255, 255, 0.7)';
      ripple.style.transform = 'scale(0)';
      ripple.style.animation = 'ripple 0.6s ease-out';
      this.appendChild(ripple);
      setTimeout(() => ripple.remove(), 600);
    }

    // Initial binding
    bindWishlistButtons();
    bindCartButtons();

    // Add ripple animation
    const style = document.createElement('style');
    style.textContent = `
      @keyframes ripple {
        to {
          transform: scale(4);
          opacity: 0;
        }
      }
    `;
    document.head.appendChild(style);
  </script>
</body>
</html>
