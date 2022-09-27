<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/dashboard">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link {{ Request::is('categories*') ? 'active' : ''}}" href="{{ route('categories.index') }}">Kategori</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('products*') ? 'active' : ''}}" href="{{ route('products.index') }}">Produk</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ Request::is('transactions*') ? 'active' : ''}}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Transaksi
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item {{ Request::is('transactions/sellings*') ? 'active' : ''}}" href="{{ route('transactions.sellings.index') }}">Penjualan</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Pembelian</a></li>
          </ul>
        </li>

      </ul>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hallo, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">
                  <i class="bi bi-box-arrow-right"></i> Logout
                </button>
              </form>
            </li>
          </ul>
        </li>
      </ul>

    </div>
  </div>
</nav>