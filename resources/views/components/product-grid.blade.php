@forelse($products as $product)
  <div class="col">
    <div class="product-card">
      <!-- Image Wrapper -->
      <div class="product-image-wrapper">
        @if($product->image)
          <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image" loading="lazy">
        @else
          <div class="bg-light d-flex align-items-center justify-content-center h-100">
            <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
          </div>
        @endif

        <!-- Badges -->
        <div class="product-badges">
          <!-- @if(rand(0, 1))
            <span class="badge-custom badge-diskon">-{{ rand(10, 50) }}%</span>
          @endif -->
          @if(rand(0, 1))
            <span class="badge-custom badge-terlaris">Terlaris</span>
          @endif
        </div>

        <!-- Wishlist Button -->
        <button class="wishlist-btn" type="button">
          <i class="bi bi-heart"></i>
        </button>

        <!-- Quick View Overlay -->
        <!-- <div class="quick-view-overlay">
          <button type="button" onclick="window.location.href='{{ route('product.show', $product->id) }}'">
            <i class="bi bi-eye"></i> Lihat Detail
          </button>
        </div> -->
      </div>

      <!-- Product Info -->
      <div class="product-info">
        <div class="product-category">{{ $product->category?->name ?? 'Uncategorized' }}</div>
        <h6 class="product-name">{{ $product->name }}</h6>

        <!-- Rating -->
        <div class="product-rating">
          <div class="stars">
            @for($i = 0; $i < 5; $i++)
              <i class="bi bi-star-fill star"></i>
            @endfor
          </div>
          <span class="review-count">({{ rand(10, 500) }} review)</span>
        </div>

        <!-- Price -->
        <div class="price-section">
          <div>
            <span class="price-original">Rp {{ number_format($product->price + 500000, 0, ',', '.') }}</span>
            <span class="price-discount">-25%</span>
          </div>
          <div class="price-current">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
        </div>

        <!-- Stock Status -->
        <div class="stock-status stock-available">
          <i class="bi bi-check-circle-fill"></i> Stok: {{ rand(5, 100) }}
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
          <a href="{{ route('product.show', $product->id) }}" class="btn-view-detail">
            <i class="bi bi-eye"></i> Detail
          </a>
          <form method="POST" action="{{ route('cart.add') }}" class="w-100">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="quantity" value="1">
            <button type="submit" class="btn-add-cart w-100">
              <i class="bi bi-bag-plus"></i> Tambah Keranjang
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@empty
  <div class="col-12 text-center py-5">
    <i class="bi bi-inbox" style="font-size: 3rem; color: var(--text-muted);"></i>
    <p class="text-muted mt-3">Produk tidak ditemukan</p>
  </div>
@endforelse
