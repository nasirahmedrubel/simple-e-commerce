<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="{{route('home.view')}}">E-Commerce</a>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link mx-lg-2 active" aria-current="page" href="{{route('home.view')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="{{Route('checkout.view')}}">checkout</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="{{Route('product.view')}}">Create Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#">Foundation</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#">Mascara</a>
              </li>
            </ul>
          </div>
      </div>
      <a href="{{Route('checkout.view')}}" class="cart-menu ml-4">
        <i class="fa-solid fa-basket-shopping"><span class="child">
        
        {{$totalqnt}}
        
        </span></i>
      </a>
      
    </div>
  </nav>