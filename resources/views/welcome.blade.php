@extends('layouts.main')
@section('title', 'Welcome to Oratorio Music Foundation')
@section('description', 'Join our community of vocal, singer, instrumentalist and more')
@section('keyword', 'oratorio, oratorio group, choir, campus choir, joint choir, community, vocal, singer, instrumentalist and Musical group, Young talents, Live performances, Concerts, Music videos, Original compositions, Recording studio, Creative collaboration, Music industry, 
Entertaining performances, Dynamic artists, Music genres, pop, rock, jazz, R&B, etc, Music competitions, Fan base, Music education, Vocal coaching, Instrumental mastery, Music production, Sound engineering, Music promotion')
@section('canonical', 'https://oratoriogroup.org')
@section('main')
@include('layouts.hero')

<div class="info-sec">
   <div class="container">
      <div class="info-countdown" style="background-image: url(assets/images/banner/bg.png);">
         <ul class="counter-box d-flex justify-content-around" data-countdown="2023/04/28">
         </ul>
         <div class="dots img-moving-anim2">
            <img src="assets/images/dots/dots3.png" alt="Shadow Image">
         </div>
      </div>
      <div class="information-area">
         <div class="row g-4">
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="600">
               <div class="mail">
                  <div class="icon"><img src="assets/images/icon/mail.svg" alt="Mail"></div>
                  <a href="mailto:help@oratoriogroup.org" class="mail-link">help@oratoriogroup.org</a>
               </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="800">
               <div class="location">
                  <div class="icon"><img src="assets/images/icon/map-pin.svg" alt="Map"></div>
                  <a href="#" class="location-link">3+ Campuses</a>
               </div>
            </div>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="1000">
               <div class="number">
                  <div class="icon"><img src="assets/images/icon/phone.svg" alt="Phone"></div>
                  <a href="#" class="number-link">+1 (234) 812-6657 871</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@include('partials._about')

<div class="container mt-5">
   <hr>
</div>


<div id="sponsors" class="brand-sec">
   <div class="container">
      <div class="brand-items-wrap d-md-flex text-center justify-content-around align-items-center" data-aos="fade-up" data-aos-duration="1000">
         <div class="brand-item mb-3">
            <div class="icon">
               <img src="assets/images/brand/JCCF_logo.png" alt="Brand Image 1"> JCCF
            </div>
         </div>
         <div class="brand-item mb-3">
            <div class="icon">
               <img src="assets/images/brand/fpe_logo.png" alt="Brand Image 3"> FPE
            </div>
         </div>
         <div class="brand-item mb-3">
            <div class="icon">
               <img src="assets/images/brand/adeyemi_logo.png" alt="Brand Image 4"> ACE
            </div>
         </div>
         <div class="brand-item mb-3">
            <div class="icon">
               <img src="assets/images/brand/poly_ibadan.png" alt="Brand Image 5"> IB
            </div>
         </div>
      </div>
   </div>
</div>
<section class="cta-sec">
   <div class="container">
      <div class="cta-content-wrap text-center" data-aos="fade-right" data-aos-duration="1000">
         <h2 class="cta-title m-auto mb-0 mx-5">
            Join our community of music lovers and enthusiasts
         </h2>
      </div>
</section>

<section class="video-sec" data-src="assets/images/banner/dashboard-conference-video-bg.svg" data-parallax>
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6">
            <div class="video-wrap">
               <div class="video-image img-moving-anim1">
                  <img src="assets/images/video/oyindamola_at_concert.png" alt="oyindamola_at_concert">
               </div>
               <div class="video-play">
                  <img src="assets/images/video/ara_ire_concert.png" alt="ara_ire_concert" data-bs-backdrop="static">
                  <a class="video-btn1 popup-video" href="#" data-bs-toggle="modal" data-bs-target="#araIre"><span><i class="fas fa-play"></i></span></a>
               </div>
               <div class="dots img-moving-anim2">
                  <img src="assets/images/dots/dots6.png" alt="Shadow Image">
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="video-content-wrap">
               <h2 class="title">
                  Dr. Oyindamola Adejumo-Ayibiowu
               </h2>
               <p class="desc">
                  A Mother, A Mentor, A Doctorate, A Prophetess and More

                  <br><br>
                  Oyindamola Adejumo-Ayibiowu World Outreach is an organization that has the purpose of reaching out to Nigerian communities especially campus students through musical programs ministration, concerts, seminars, talent programs, and mentoring programs and other special events.
                  <a href="{{ url('about-oratorio') }}">Learn More</a>

               </p>
               <div class="management d-flex">
                  <h3 class="event count-block p-lg-5 p-3"><span>26+</span>Concert</h3>
                  <h3 class="event count-block p-lg-5 p-3"><span>03</span>Campus</h3>
                  <h3 class="speakers count-block p-lg-5 p-3"><span>20k+</span>Students</h3>
               </div>
               <div class="dots img-moving-anim3">
                  <img src="assets/images/dots/dots7.png" alt="Shadow Image">
               </div>
               <a href="{{ route('register') }}" target="_blank"> <button class="custom-btn2 video-btn">Join Now</button></a>
            </div>
         </div>
      </div>
   </div>
</section>
@include('partials._faq')
<div class="container">
   <hr>
</div> 
<section class="blog-sec" data-aos="fade-up" data-aos-duration="1000">
   <div class="container">
      <div class="section-head d-flex justify-content-between">
         <h2 class="blog-title">
            Join our community of vocal, singer, instrumentalist and more
         </h2>
         <a href="{{ route('register') }}" target="_blank"> <button class="blog-btn custom-btn">Join Now</button></a>
      </div>
   </div>
   <div class="shape">
      <img src="assets/images/shape/7.svg" alt="Shape">
   </div>
</section>

<x-musicmodal :modal />
@endsection