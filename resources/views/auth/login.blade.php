@extends('frontend.app')
@section('content')

<!-- cover start  -->
<section class="mt-5 ">
    <div class="container mt-3">
        <div class="row col-rev">
          <div class="col-lg-3 col-md-12 col-12 need-help">
            <h6>NEED HELP?</h6>
            <p class="font-sm">If you have questions or need assistance, please contact us:</p>
            <div class="d-flex">
              <img src="{{ asset('frontend/svg/Account-Help-Phone-Icon.svg')}}" alt="Phone Icone" height="25">
              <div class="font-sm ps-3">
                <span>+8801310186926</span>
                <div class="p-2"></div>
                <span>
                  We’re Available: <br>
                  Mon – Fri: 8:00am– 8:00pm ET <br>
                  Sat: 11:00am – 7:30pm ET <br>
                  Sun: 9:30am – 6:00pm ET</span>
              </div>
              
            </div>
            <div class="d-flex pt-5">
              <img src="{{ asset('frontend/svg/Chat-icon.svg')}}" alt="Chat Icon" height="22" class="mt-2">
              <div class="font-sm ps-3">
                <button class="btn text-cap border-0">Live-chat</button>
              </div>
            </div>
            <div class="d-flex pt-5">
              <img src="{{ asset('frontend/svg/Account-Help-Email-Icon.svg')}}" alt="Email icon" height="18" class="mt-2">
              <div class="font-sm ps-3">
                <button class="btn border-0 text-cap">Email Us</button>
              </div>
            </div>
            <div class="d-flex pt-5">
              <img src="{{ asset('frontend/svg/Text-Icon.svg')}}" alt="phone icon" height="30" class="mt-2">
              <div class="font-m ps-3 pt-1">
                Text Us <br><br>
                <a href="tel:1-315-562-0208" class="text-dark font-sm">1-315-562-0208</a>
              </div>
            </div>
          </div>
          <div class="col-lg-9 col-md-12 col-12 row signin-form">
            <div class="col-lg-8 col-md-12 col-12">
              <div class="border border-dark card" style="border-radius: 0;">
                <div class="d-flex tab-header">
                  <div class="signin-tab text-center align-items-center col-6 tab-active">
                    <h2 class="serif">Sign In</h2>
                  </div>
                  <div class="signup-tab text-center align-items-center col-6">
                    <h2 class="serif">Create Account</h2>
                  </div>
                </div>
                <div class="card-body signin-body">
                  <div class="row" style="display:none;">
                    <div class="col-lg-6 col-md-6 col-12 pt-2">
                      <button class="p-3 col-12 border border-dark social-btn"><img src="{{ asset('frontend/svg/facebook.svg')}}" alt="facebook" height="20"> Facebook</button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 pt-2">
                      <button class="p-3 col-12 border border-dark social-btn"><img src="{{ asset('frontend/svg/google.svg')}}" alt="facebook" height="20"> Google</button>
                    </div>
                  </div>
                  <br>
                  <!-- <hr>
                  <center><span style="background-color: white;">Or</span></center>
                  <hr> -->
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
                <div class="card-body signup-body" style="display: none;">
                  <div class="row" style="display:none">
                    <div class="col-lg-6 col-md-6 col-12 pt-2">
                      <button class="p-3 col-12 border border-dark social-btn"><img src="{{ asset('frontend/svg/facebook.svg')}}" alt="facebook" height="20"> Facebook</button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 pt-2">
                      <button class="p-3 col-12 border border-dark social-btn"><img src="{{ asset('frontend/svg/google.svg')}}" alt="facebook" height="20"> Google</button>
                    </div>
                  </div>
                  <br>
                  <!-- <hr>
                  <center><span style="background-color: white;">Or</span></center>
                  <hr> -->
                  <form action="{{ route('front.register') }}" method="POST" id="ajax_form">
                    @csrf
                    <div class="form-floating mb-3">
                      <input type="email"
                      class="col-12 form-control" name="email" id="email" aria-describedby="email" placeholder="Enter Email Here">
                      <label for="email" class="form-label">Email</label>
                      <small id="email" class="form-text text-muted">* Required Field</small>
                    </div>

                    <div class="form-floating mb-3">
                      <input type="password" class="col-12 form-control" name="password" id="password" placeholder="Enter Password Here" aria-describedby="password">
                      <label for="password" class="form-label">Password</label>
                      <small id="password" class="form-text text-muted">* Required Field</small>
                    </div>

                    <div class="form-floating mb-3">
                      <input type="password" class="col-12 form-control" name="password_confirmation" id="repassword" placeholder="Re-Enter Password Here" aria-describedby="password">
                      <label for="repassword" class="form-label">Confirm Password</label>
                      <small id="password" class="form-text text-muted">* Required Field</small>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text"
                      class="col-12 form-control" name="first_name" id="f-name" aria-describedby="f-name" placeholder="Enter First Name">
                      <label for="f-name" class="form-label">First Name</label>
                      <small id="f-name" class="form-text text-muted">* Required Field</small>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text"
                      class="col-12 form-control p-2" name="last_name" id="l-name" aria-describedby="l-name" placeholder="Enter Last Name">
                      <label for="l-name" class="form-label">Last Name</label>
                      <small id="l-name" class="form-text text-muted">* Required Field</small>
                    </div>
                    <div class="d-flex justify-content-between">
                      <a href="{{ route('password.request') }}" class="font-m-sm text-muted" style="text-decoration: underline;">Forgot Password</a>
                      <span class="text-muted font-m-sm">* Required</span>
                    </div>
                    

                    <div class="mb-3 mt-3 form-check c-cursor">
                      <input type="checkbox" class="form-check-input" id="check2"/>
                      <label class="form-check-label text-muted" for="check2"><span class="font-sm">Subscribe me to receive email updates. Ralph Lauren does not share or sell personal information</span></label>
                    </div>
                    <a href="#" class="font-sm text-dark" data-bs-toggle="modal" data-bs-target="#policy">See Privacy Policy</a>
                    <button type="submit" class="p-3 border col-12 mt-2" style="background-color: #041e3a; color: white;">Create Account</button>
                    
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 pt-lg-0 pt-3 Tracking">
              <div class="card order-status border-0 text-center p-3 pt-4" style="background-color: rgb(230, 230, 230);border-radius: 0;">
                <h6>CHECK ORDER STATUS</h6>
                <p class="p-3 font-sm">See your order even if you are not a registered user. Enter the order number and the billing address ZIP code.</p>
                <form action="">
                  <div class="mb-3 text-start">
                    <label for="order-number" class="form-label">* Order Number</label>
                    <input type="text" class="p-2" name="order_number" id="order-number" aria-describedby="order-number" placeholder="Enter Order Number">
                    <!-- <small id="order-number" class="form-text text-muted">* Required</small> -->
                  </div>
                  <div class="mb-3 text-start">
                    <label for="order-email" class="form-label">* Order Email</label>
                    <input type="email" class="p-2" name="order_email" id="order-email" aria-describedby="emailHelpId" placeholder="abc@mail.com">
                    <!-- <small id="emailHelpId" class="form-text text-muted">* Required</small> -->
                  </div>
                  <div class="mb-3 text-start">
                    <label for="billing-zip" class="form-label">* Billing Zip Code</label>
                    <input type="text" class="p-2" name="billing_zip" id="billing-zip" aria-describedby="billing-zip" placeholder="Billing Zip Code">
                    <!-- <small id="order-number" class="form-text text-muted">* Required</small> -->
                  </div>
                  <a href="#" class="u-botton-dark font-m">Check Status</a>
                </form>
              </div>
              
            </div>
            <div class="col-lg-4 col-md-12 col-12 pt-lg-0 pt-3 benefit" style="display: none;">
              <h5>BENEFITS OF CREATING AN ACCOUNT</h5>
              <p class="font-m-sm "><b>
                Enjoy Free Fast Shipping <i class="fas fa-truck-fast"></i> <a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#details">
                  Details
                </a>
              </b></p>
              <!-- Modal -->
              <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalTitleId">Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              
                    </div>
                    <div class="modal-body" style="max-height: 10rem; overflow-y: scroll;">
                        <p class="text-justify">
                          Enjoy free Fast shipping on orders made using a RalphLauren.com account. Enjoy free returns within 30 days of the order ship date. See our returns policy for details and exclusions. The free Fast shipping offer is automatically applied at checkout when Fast shipping is selected after signing in to your account on RalphLauren.com or on The Ralph Lauren App. Orders typically arrive within four business days if placed by 3 PM ET (11 AM ET for orders containing customized items). Your estimated delivery date will be provided at checkout. Orders containing fragrances, rugs, or lighting and orders greater than 30 units are not eligible for Fast shipping. Regular charges will apply to all other shipping methods. Any philanthropic donations added at checkout do not count toward the minimum purchase amount. This offer has no cash value. This offer is not applicable to purchases being shipped internationally. Ralph Lauren reserves the right to end or modify any free shipping offers at any time.
                        </p>
                    </div>
                    <div class="modal-footer">
                    </div>
                  </div>
                </div>
              </div>
              <p class="font-m-sm">
                <b>
                  Simplified Returns Process
                </b>
              </p>
              <p class="font-m-sm">
                <b>
                  Receive Exclusive Offers & News
                </b>
              </p>
              <p class="font-m-sm">
                <b>
                  Easy Access to Order Tracking & History
                </b>
              </p>
              <p class="font-m-sm">
                <b>
                  Faster Shopping & Checkout
                </b>
              </p>
              <a href="#" class="font-m-sm h-u text-dark">
                Read more about security
              </a>
              
              
              
              
            </div>
            
          </div>
        </div>
        <br>
    </div>
</section>

<!-- cover end  -->





<!-- Modal -->
<div class="modal fade" id="policy" tabindex="-1" role="dialog" aria-labelledby="Privacy" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="Privacy">Privacy Policy</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
      <div class="modal-body">
        <div class="container-fluid">
          <iframe src="assets/privecy_policy.txt" id="myIframe" frameborder="0" style="width: 100%;height: 80vh;border:3px solid black; background-color: white; color: black;"></iframe>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



@endsection

@push('js')
<script src="{{ asset('frontend/js/signin.js')}}"></script>
<script>

  var modalId = document.getElementById('modalId');
  modalId.addEventListener('show.bs.modal', function (event) {
      let button = event.relatedTarget;
      let recipient = button.getAttribute('data-bs-whatever');

  });
</script>
@endpush