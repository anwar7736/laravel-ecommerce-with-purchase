<nav class="navbar navbar-expand-lg ps-3 pe-3" id="forwhitebg">
  <div class="navbar-toggler ma5menu__toggle ps-1 pt-1">
    <div class="bar1 bar"></div>
    <div class="bar2 bar"></div>
    <div style="display: none;">

      <!-- source for mobile menu start -->
      <ul class="site-menu">
          <li class="ma5menu__leave btn btn-success" id="signupin"><a href="#"><span class="text-center">Sign In / Register</span> </a></li>
          <li>
              <a href="#">MEN</a>
              <ul>
                  <li><a href="#">What's New</a>
                      <ul>
                        <li><a href="#">New Arrivels</a></li>
                        <li><a href="#">US Open Tennis</a></li>
                        <li><a href="#">Spectator Style</a></li>
                        <li><a href="#">Heritage Icons</a></li>
        
                      </ul>
                  </li>
                  <li><a href="#">Clothing</a>
                    <ul>
                      <li><a href="#">Polo Shirts</a></li>
                      <li><a href="#">T-Shirts & Rugby Shirts</a></li>
 

                    </ul>
                  </li>
                  <li><a href="#">Big & Tall</a></li>
                  <li>
                    <a href="#">Shoes</a>
                    <ul>
                      <li><a href="#">Sneakers</a></li>
                      <li><a href="#">Slides & Slippers</a></li>
                      <li><a href="#">Casual Shoes</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="#">Accesories</a>
                      <ul>
                          <li><a href="#">Hats, Scarves & Gloves</a></li>
                          <li><a href="#">Belts & Suspenders</a></li>
                          <li><a href="#">Bags</a></li>
                          <li><a href="#">Wallets & Accessories</a></li>
                          <li><a href="#">Socks</a></li>

                      </ul>
                  </li>
                 
                  <li>
                    <a href="#">Create Your Own</a>
                    <ul>
                      <li><a href="#">Clothing</a></li>
                      <li><a href="#">Accessories</a></li>
                      <li><a href="#">Custom Outerwear</a></li>
                      <li><a href="#">The Custom Polo, Made to Order</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">Our Brands</a>
                    <ul>
                      <li><a href="#">Polo Ralph Lauren</a></li>
                      <li><a href="#">RLX</a></li>

                      <li><a href="#">Golf</a></li>
                    </ul>
                  </li>
                  
              </ul>
          </li>
          <li>
              <a href="#">WOMEN</a>
              <ul>
                  <li><a href="#">What's New</a>
                      <ul>
                        <li><a href="#">New Arrivels</a></li>
                        <li><a href="#">US Open Tennis</a></li>
                        <li><a href="#">Spectator Style</a></li>
                        <li><a href="#">Heritage Icons</a></li>
                        <li><a href="#">Fall Golf</a></li>

                      </ul>
                  </li>
                  <li><a href="#">Clothing</a>
                    <ul>
                      <li><a href="#">Polo Shirts</a></li>
                      <li><a href="#">T-Shirts & Rugby Shirts</a></li>
                      <li><a href="#">Casual Shirts & Dress Shirts</a></li>
                      <li><a href="#">Sweatshirts & Sweatpants</a></li>

                      <li><a href="#">Pants & Chinos</a></li>

                    </ul>
                  </li>
                  <li><a href="#">Big & Tall</a></li>
                  
                  <li>
                      <a href="#">Accesories</a>
                      <ul>
                          <li><a href="#">Hats, Scarves & Gloves</a></li>
                          <li><a href="#">Belts & Suspenders</a></li>
                          <li><a href="#">Bags</a></li>
                          <li><a href="#">Wallets & Accessories</a></li>
                          <li><a href="#">Socks</a></li>

                      </ul>
                  </li>
                  <li><a href="#">Watches</a></li>
                  <li>
                    <a href="#">Create Your Own</a>
                    <ul>
                      <li><a href="#">Clothing</a></li>
                      <li><a href="#">Accessories</a></li>
                      <li><a href="#">Custom Outerwear</a></li>
                      <li><a href="#">The Custom Polo, Made to Order</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="#">Our Brands</a>
                    <ul>
                      <li><a href="#">Polo Ralph Lauren</a></li>
                      <li><a href="#">RLX</a></li>
                      <li><a href="#">Purple Label</a></li>
                      <li><a href="#">Double RL</a></li>
                      <li><a href="#">Pink Pony</a></li>
                      <li><a href="#">Golf</a></li>
                    </ul>
                  </li>


              </ul>
          </li>
          <li>
              <a href="index-page.html">Lookbook</a>
              <ul>
                  <li><a href="index-page.html">For business</a></li>
                  <li><a href="index-page.html">Premium Area</a></li>
              </ul>
          </li>
          <li>
              <a href="index-page.html">Campaigns</a>
              <ul>
                  <li>
                      <a href="index-page.html">Summer 2019</a>
                      <ul>
                          <li><a href="index-page.html">Winter 2018</a></li>
                          <li><a href="index-page.html">Spring 2017</a></li>
                      </ul>

                  </li>
              </ul>
          </li>
          <li>
              <a href="index-page.html">Brand</a>
              <ul>
                  <li><a href="index-page.html">About us</a></li>
                  <li><a href="index-page.html">Press</a></li>
              </ul>
          </li>
          <li><a href="index-page.html">Contact</a></li>
      </ul>
    </div>
  </div>
  <a class="navbar-brand ps-2 m-0 serif" href="{{ route('front.home')}}">Fabby Stitch</a>
  <div class="collapse navbar-collapse" id="sidebar">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        @foreach($types as $type)
        <li class="nav-item justify-content-between" id="{{ strtolower($type->name)}}-hover">
          <a class="nav-link active dropdown1" aria-current="page" href="{{ route('front.products.index')}}?type_id={{ $type->id}}" >{{ $type->name}}

          </a>
          <div class="dropdown dp-1 ps-5 pe-5" id="{{ strtolower($type->name)}}-hover-dropdown">
            <div class="d-flex mt-2">
                <div class="pb-3" style="max-height: 280px; width: 200px; overflow: hidden;">
                    <img class="col-12 banner-img" src="{{ getImage('types', $type->image)}}" alt="{{ strtolower($type->name)}} image">
                    <div class="banner-text">
                        <h2 class="serif white">{{ $type->name}} Icon</h2>
                        <a href="{{ route('front.products.index')}}?type_id={{ $type->id}}" class="u-botton text-light">Shop Now</a>
                    </div>
                </div>
                <div class="dp-col">
                  <div class="ps-5">

                    @foreach($type->categories as $cat)
                    <a href="{{ route('front.products.index')}}?type_id={{ $type->id}}&category_id={{ $cat->id}}"> {{$cat->name}} </a>
                    @endforeach

                  </div>
                </div>
                
      
            </div>
          </div>

        </li>
        @endforeach

        
        
        <li class="nav-item justify-content-between3" id="women-hover">
          <a class="nav-link active dropdown1" aria-current="page" href="{{ route('front.home')}}" >HOME</a>
        </li>
  
        <li class="nav-item justify-content-between3" id="women-hover">
          <a class="nav-link active dropdown1" aria-current="page" href="{{ route('front.products.index')}}" >SALE</a>
        </li>
      </ul>
      <!-- mobile menu toggle button end -->
  </div>
  <div class="icons">
    <ul class="d-flex align-items-center pe-1 ps-0">
      <li class="nav-link"><a href="#_" class="white search"><i class="fa-solid fa-magnifying-glass"></i></a></li>
      <li class="nav-link d-lg-block d-md-none d-none">
        <a href="#" class="white "><i class="fa-regular fa-heart"></i></a></li>
        <li class="nav-link d-lg-block d-md-none d-none signin-up">
          <a href="signin.html" class="white" title="Sign In / Sign Up"><i class="fa-regular fa-user"></i></a>
          <div class="signin-dp col-12 col-lg-3 ms-lg-auto m-auto p-3">
            <div class="p-3"></div>

            @guest
            <div class="d-flex justify-content-between align-items-center">
              <h2 class="serif">Sign In</h2>
              <a href="{{ route('login')}}" class="font-sm text-dark" style="text-decoration: underline;">Create An Account</a>
            </div>

            <div class="col-12">
              <form method="POST" action="{{ route('front.login') }}" id="ajax_form">
                  @csrf
                  <div class="form-floating mb-3">
                    <input type="email"
                    class="col-12 form-control" name="email" id="email" aria-describedby="email" placeholder="Enter Email Here">
                    <label for="email" class="form-label">Email</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="col-12 form-control" name="password" id="password" placeholder="Enter Password Here" aria-describedby="password">
                    <label for="password" class="form-label">Password</label>
                  </div>
                  <div class="d-flex justify-content-between">
                    <a href="{{ route('password.request') }}" class="font-m-sm text-muted" style="text-decoration: underline;">Forgot Password</a>
                  </div>
                  <div class="mb-3 mt-3 form-check c-cursor">
                    <input type="checkbox" class="form-check-input" id="check" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                    <label class="form-check-label text-muted" for="check">Remember Me</label>
                  </div>
                  <button type="submit" class="p-3 border col-12 mt-2" style="background-color: #041e3a; color: white;">Sign In</button>
                </form>
            </div>
            @else
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ Auth::user()->first_name }} {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @endguest
            
          </div>
        </li>
      <li class="nav-link">

        <a href="{{ route('front.carts.index')}}" class="white" id="cart-sidebar-btn">
          <span class="badge text-bg-secondary" id="cart_item_count">{{ getTotalCart()}}</span>
          <i class="fa fa-bag-shopping"></i>
        </a>
      </li>
    </ul>
  </div>
  <div class="search-wiget">
    <div class="text-end d-lg-none d-md-none d-block p-3"><button class="btn close-search"><i class="fa-solid fa-xmark"></i></button></div>
    <div class="container">
      <div class="pt-5 d-lg-block d-md-none d-none">
      </div>

      <div class="search-form">
        <div class="input-group">
          <span class="input-group-text" id="input1"><i class="fa-solid fa-magnifying-glass"></i></span>
          <input type="text" class="form-control" aria-describedby="input1" placeholder="Search"/>
        </div>
        <div class="pt-3 d-lg-block d-md-none d-none">
        </div>
        <div class="row justify-content-between pt-5 pb-5">
          <p class="col-12 col-md-12 col-lg-3"><b>
            Tranding Search:
          </b></p>
          <div class="col-12 col-md-12 col-lg-9 row">
            <a href="#" class="text-dark a-herf col-lg col-12"><i class="fa-solid fa-magnifying-glass"></i> <span class="ps-2">Polo Shirt</span></a>
          <a href="#" class="text-dark a-herf col-lg col-12"><i class="fa-solid fa-magnifying-glass"></i> <span class="ps-2">Bears</span></a>
          <a href="#" class="text-dark a-herf col-lg col-12 "><i class="fa-solid fa-magnifying-glass"></i> <span class="ps-2">Jackets</span></a>
          <a href="#" class="text-dark a-herf col-lg col-12"><i class="fa-solid fa-magnifying-glass"></i> <span class="ps-2">Hoodies</span></a>
          </div>
          </div>
          
      </div>
    </div>
  </div>
</nav>