<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title') | Inspiring our generation since 1996</title>
   <meta name="description" content="@yield('description')">
   <meta name="author" content="oratorio music foundation developers">
   <meta name="keywords" content="@yield('keywords')">
   <link rel="shortcut icon" href="https://oratoriogroup.org/concert_favicon.png">
   <link rel="canonical" href="@yield('canonical')" />

   <meta name="msapplication-TileColor" content="#E70000">
   <meta name="theme-color" content="#E70000">
   <link rel="preconnect" href="https://fonts.googleapis.com/">
   <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
   <link rel="preload" href="{{ asset('assets/css/aos.css') }}" as="style">
   <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
   <link rel="preload" href="{{ asset('assets/css/animate.min.css') }}" as="style">
   <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
   <link rel="preload" href="{{ asset('assets/css/magnific-popup.css') }}" as="style">
   <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
   <link rel="preload" href="{{ asset('assets/css/all.min.css') }}" as="style" crossorigin="anonymous" referrerpolicy="no-referrer">
   <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" crossorigin="anonymous" referrerpolicy="no-referrer">
   <link rel="preload" href="{{ asset('assets/css/slick-theme.css') }}" as="style">
   <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
   <link rel="preload" href="{{ asset('assets/css/slick.css') }}" as="style">
   <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
   <link rel="preload" href="{{ asset('assets/css/bootstrap.min.css') }}" as="style">
   <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
   <link rel="preload" href="{{ asset('assets/css/style.css') }}" as="style">
   <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

   <link rel="preload" href="{{ asset('assets/css/icons.css') }}" as="style">
   <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">
   <link rel="preload" href="{{ asset('assets/css/uikit.css') }}" as="style">
   <link rel="stylesheet" href="{{ asset('assets/css/uikit.css') }}">
   <link rel="preload" href="{{ asset('assets/css/connect.css') }}" as="style">
   <link rel="stylesheet" href="{{ asset('assets/css/connect.css') }}">
   <link rel="preload" href="{{ asset('assets/dist/tailwind.min.css') }}" as="style">
   <link href="{{ ('assets/dist/tailwind.min.css') }}" rel="stylesheet">

   <!-- Open Graph / Facebook -->
   <meta property="og:type" content="website">
   <meta property="og:url" content="https://oratoriogroup.org/">
   <meta property="og:title" content="@yield('title')">
   <meta property="og:description" content="@yield('description')">
   <meta property="og:image" content="https://oratoriogroup.org/assets/img/oratorio.png">

   <!-- Twitter -->
   <meta property="twitter:card" content="summary_large_image">
   <meta property="twitter:url" content="https://oratoriogroup.org/">
   <meta property="twitter:title" content="@yield('title')">
   <meta property="twitter:description" content="@yield('description')">
   <meta property="twitter:image" content="https://oratoriogroup.org/assets/img/oratorio.png">
   <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-178400534-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-178400534-1');
</script>

</head>

<body>
   <div class="body-wrap">

      @yield('main')
      <div class="modal  popup-box fade" id="eventModal" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog popup-box-dialog modal-dialog-centered">
            <div class="modal-content popup-box-content">
               <div class="popup-card" style="width:100%">
                  <button type="button" class="btn popup2-btn  ms-auto" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
                  <img src="assets/images/popup.png" class="card-img-top" alt="popup-bg">
                  <div class="card-body popup-card-body">
                     <div class="popup-title-area">
                        <p class="popup-sub"></p>
                        <h5 class="card-title popup-title"></h5>
                     </div>
                  </div>
                  <!-- <form action="{{ route('volunteer.store') }}" class="popup-form" method="POST">
                     @csrf
                     <div class="row gy-3 mb-3">
                        <div class="col-lg-6">
                           <label for="fullname" class="form-label">Full name</label>
                           <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Your Full Name" required>
                        </div>
                        <div class="col-lg-6">
                           <label for="email" class="form-label">Email</label>
                           <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                        </div>
                        <div class="col-lg-6">
                           <label for="phone" class="form-label">Phone</label>
                           <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter Phone" required>
                        </div>
                        <div class="col-lg-6">
                           <label for="department" class="form-label">Department to serve</label>
                           <select class="form-control bg-black-50" name="department" id="department" required>
                              <option title="Physical Attendance is required" value="Music">Music </option>
                              <option value="Intercessory Team">Intercessory Team </option>
                              <option value="Welfare Team">Welfare Team </option>
                              <option value="Protocol Team">Protocol Team </option>
                              <option value="Publicity/ Evangelism Team">Publicity/ Evangelism Team </option>
                              <option value="Media Team">Media Team </option>
                           </select>
                        </div>
                        <div class="col-lg-6">
                           <label for="attendance" class="form-label">Willing to attend physical meetings?</label>
                           <select class="form-control bg-black-50" name="attendance" id="attendance" required>
                              <option value="Yes">Yes </option>
                              <option value="No">No </option>
                           </select>
                        </div>
                     </div>
                     <button type="submit" class="custom-btn2">Join Now</button>
                  </form> -->

                  
               </div>
            </div>
         </div>
      </div> 
      <div class="modal  popup-box fade" id="donateModal" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog popup-box-dialog modal-dialog-centered">
            <div class="modal-content popup-box-content">
               <div class="popup-card" style="width:100%">
                  <button type="button" class="btn popup2-btn  ms-auto" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>
                  <img src="assets/images/popup.png" class="card-img-top" alt="popup-bg">
                  <div class="card-body popup-card-body">
                     <div class="popup-title-area">
                        <p class="popup-sub"></p>
                        <h5 class="card-title popup-title"></h5>
                     </div>
                  </div>
                  <form action="https://checkout.flutterwave.com/v3/hosted/pay" class="popup-form" method="POST">
                     @csrf
                     <div class="row gy-3 mb-3">
                        <div class="col-lg-6">
                           <label for="exampleFormControlInput5" class="form-label">Full name</label>
                           <input type="text" class="form-control" name="customer[name]" id="fullname" placeholder="Your name" required>
                        </div>
                        <input type="hidden" name="public_key" value="FLWPUBK-fd46e84af0c86ba8904baef11a90ccc4-X" />
                        <input type="hidden" name="tx_ref" value="<?php echo date("H:i:s"); ?>" />
                        <input type="hidden" name="currency" value="NGN" />
                        <input type="hidden" name="redirect_url" value="https://oratoriogroup.org/#status" />

                        <div class="col-lg-6">
                           <label for="exampleFormControlInput6" class="form-label">Email</label>
                           <input type="email" class="form-control" name="customer[email]" id="email" placeholder="Enter Email" required>
                        </div>
                        <div class="col-lg-6">
                           <label for="exampleFormControlInput7" class="form-label">Phone</label>
                           <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter Phone">
                        </div>
                        <div class="col-lg-6">
                           <label for="exampleFormControlInput8" class="form-label">Giving Options</label>
                           <select class="form-control bg-black-50" name="options" id="options" required>
                              <option title="These are musical Instruments to be used for rehearsals such as keyboard, gitar, drum-set" value="Musical Instruments">Musical Instruments </option>
                              <option title="These are outreach to urban and rural area, spreading the word of God, providing medical aids, and welfare material" value="Evangelism Support">Community-work Support </option>
                              <option value="Annual Concert Support">Annual Concert Support </option>
                           </select>
                        </div>
                        <div class="col-lg-6">
                           <label for="exampleFormControlInput7" class="form-label">Amount</label>
                           <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter Amount" required>
                        </div>
                     </div>
                     <button type="submit" class="custom-btn2">Donate</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
      @include('layouts.footer')

   </div>
   <link rel="preload" href="{{ asset('assets/js/jquery.min.js') }}" as="script">
   <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
   <link rel="preload" href="{{ asset('assets/js/jquery.countdown.min.js') }}" as="script">
   <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
   <link rel="preload" href="{{ asset('assets/js/aos.js') }}" as="script">
   <script src="{{ asset('assets/js/aos.js') }}"></script>
   <link rel="preload" href="{{ asset('assets/js/jquery.magnific-popup.min.js') }}" as="script">
   <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
   <link rel="preload" href="{{ asset('assets/js/bootstrap.min.js') }}" as="script">
   <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
   <link rel="preload" href="{{ asset('assets/js/slick.min.js') }}" as="script">
   <script src="{{ asset('assets/js/slick.min.js') }}"></script>
   <link rel="preload" href="{{ asset('assets/js/parallax.min.js') }}" as="script">
   <script src="{{ asset('assets/js/parallax.min.js') }}"></script>
   <link rel="preload" href="{{ asset('assets/js/main.js') }}" as="script">
   <script src="{{ asset('assets/js/main.js') }}"></script>

   <link rel="preload" href="{{ asset('assets/dist/jquery-3.6.0.min.js') }}" as="script" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
   <script src="{{ asset('assets/dist/jquery-3.6.0.min.js') }}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <link rel="preload" href="{{ asset('assets/js/tippy.all.min.js') }}" as="script">
   <script src="{{ asset('assets/js/tippy.all.min.js') }}"></script>
   <link rel="preload" href="{{ asset('assets/js/uikit.js') }}" as="script">
   <script src="{{ asset('assets/js/uikit.js') }}"></script>
   <link rel="preload" href="{{ asset('assets/js/simplebar.js') }}" as="script">
   <script src="{{ asset('assets/js/simplebar.js') }}"></script>
   <link rel="preload" href="{{ asset('assets/js/custom.js') }}" as="script">
   <script src="{{ asset('assets/js/custom.js') }}"></script>
   <link rel="preload" href="{{ asset('assets/js/bootstrap-select.min.js') }}" as="script">
   <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
   <link rel="preload" href="{{ asset('assets/dist/ionicons.js') }}" as="script">
   <script src="{{ ('assets/dist/ionicons.js') }}"></script>


</body>

</html>