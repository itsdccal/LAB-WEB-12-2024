<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
      <a class="navbar-brand" href="#">Product Management</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item"><a class="nav-link" href="{{ route('category.index') }}">Categories</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('product.index') }}">Product</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('inventorylog.index') }}">Inventory Logs</a></li>
          </ul>
      </div>
  </div>
</nav>
