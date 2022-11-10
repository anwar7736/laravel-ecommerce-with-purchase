<!DOCTYPE html>
<html lang="en">
@include('frontend.partials.head')
<body>

    <div class="main-wrapper container-fluid">
      <!-- Header Start  -->
    <header class="header container-fluid p-0 sticky-top" id="header">

        @include('frontend.partials.navbar')
  
    </header>
    
    <!-- Header end  -->
    <div class="overlay-sidebar"></div>
    
    @include('frontend.partials.cart_sidebar')
    @yield('content')
    <!-- footer section start  -->
    <footer>
      <hr>
      @include('frontend.partials.footer')
      <hr>
      
    </footer>
    </div>
    <!-- footer section end  -->
    @include('frontend.partials.js')

</body>
</html>
