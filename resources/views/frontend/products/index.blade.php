@extends('frontend.app')
@section('content')
    
<!-- cover start  -->
<section>
    @if($category)
    <h2 class="serif text-center pb-5 mt-5">{{$category}}</h2>
    @endif
    <div class="container">
      <!-- Product filter Start  -->
      <div class="filter d-flex justify-content-between ">
        <div class="d-flex justify-content-between"><p class="nav-link" id="filter">Filter <i class="fas fa-sort-down"></i></p>
          <div class="filter-wiget">
            <div class="col-12 row filter-wigetcol">
              <div class="col-12 tags-r pt-4 d-block d-lg-none d-md-block">
                  <a href="#" class="text-dark ps-3 m-2">Clear all</a>
              </div>
              <div class="col-lg-7 col-md-12 mt-5 row filter-wigetcol">
                <h4 class="serif">Category</h4>

                <div class="col-lg-6">

                  @foreach($cats as $cat)
                  <a class="a-herf text-dark">
                    <input type="checkbox" id="polo-shirts" class="category" name="polo-shirts" value="{{ $cat->id}}" {{request('category_id')== $cat->id ?'checked':''}}>
                    <label for="polo-shirts"> {{ $cat->name}} ({{$cat->products->count()}})</label>
                  </a><br>
                  @endforeach
                  
                </div>

              </div>
              <div class="col-lg-2 col-md-12 mt-5">
                <h4 class="serif">Size</h4>

                @foreach($sizes as $size)
                <a class="a-herf text-dark">
                  <input type="checkbox" id="XS" class="size" name="XS" value="{{ $size->id}}">
                  <label for="XS"> {{$size->title}} ({{$size->stocks->count()}})</label>
                </a><br>
                @endforeach
                

              </div>
              <div class="col-lg-3 col-md-12 mt-5">
                <h4 class="serif">Price</h4>
                <a href="#" class="a-herf text-dark">
                  <input type="checkbox" id="50" name="50" value="50">
                  <label for="50"> $50 - $100 (6)</label>
                </a><br>
                <a href="#" class="a-herf text-dark">
                  <input type="checkbox" id="100" name="100" value="100">
                  <label for="100"> $100 - $150 (4)</label>
                </a><br>
                <a href="#" class="a-herf text-dark">
                  <input type="checkbox" id="150" name="150" value="150">
                  <label for="150"> $150 - $200 (3)</label>
                </a><br>
                <a href="#" class="a-herf text-dark">
                  <input type="checkbox" id="200" name="200" value="200">
                  <label for="200"> $200 - $250 (3)</label>
                </a><br>
                <a href="#" class="a-herf text-dark">
                  <input type="checkbox" id="250" name="250" value="250">
                  <label for="250"> $250 - $300 (3)</label>
                </a><br>
                <a href="#" class="a-herf text-dark">
                  <input type="checkbox" id="300" name="300" value="300">
                  <label for="300"> $300 - $1000 (1)  </label>
                </a><br>
              </div>
            </div>
            <div class="text-end col-12">
              <button class="btn btn-primary apply_search">Apply </button>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <p class="sortby d-none d-lg-block d-md-none">SORT BY</p>
          <select name="" id="" class="sort-select">
            <option value="1">New Arrivals</option>
            <option value="2">Best Sellers</option>
            <option value="3">Top Rated</option>
            <option value="4">Price Low to High</option>
            <option value="5">Price High to Low</option>
            <option value="6">Our Favorites</option>
          </select>
        </div>
      </div>

      <!-- Product filter end  -->

      <!-- product List Start -->
      <div class="product_section">
        
      </div>
      <!-- product List End -->
    </div>
</section>
<!-- cover end  -->
<!-- recently veiw section  -->
<section class="mt-5 pt-5">
  <div class="container">
    <x-recent-view-product/>
  </div>
</section>
<!-- recently veiw section  -->
@endsection

@push('js')
<script type="text/javascript">

  $(document).on('click', ".pagination a", function(e) {
      e.preventDefault();
      $('li').removeClass('active');
      $(this).parent('li').addClass('active');
      var page = $(this).attr('href').split('page=')[1];
      fetchData(page);
  });

  
  $(document).on('click', ".apply_search", function(e) {
    fetchData();
  });

  $(document).ready(function(){

    fetchData();
  });

  function fetchData(page=null){

    var size = $('input.size:checked').map(function(){
      return $(this).val();
    });
    var size_id=size.get();

    var category = $('input.category:checked').map(function(){
      return $(this).val();
    });
    var cat_id=category.get();

    var type_id='{{request("type_id")}}';

    $.ajax({
       type:'GET',
       url:'{{ route("front.products.index")}}?page='+page,
       data:{cat_id,size_id,type_id},
       success:function(res){
          $('div.product_section').html(res);
       }
    });

  }
</script>
@endpush