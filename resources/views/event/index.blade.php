@extends('layouts.main')
@section('title', 'Register for Annual Festive of Praise and Worship')
@section('description', 'Register for Annual Festive of Praise and Worship. Our community of inspired oratorio, vocal, singer, instrumentalist and more')
@section('keyword', 'about, about music, learn more about oratorio, know more about music, oratorio, oratorio group, choir, campus choir, joint choir, community, vocal, singer, instrumentalist and Musical group, Young talents, Live performances, Concerts, Music videos, Original compositions, Recording studio, Creative collaboration, Music industry,
Entertaining performances, Dynamic artists, Music genres pop, rock, jazz, R&B, Music competitions, Fan base, Music education, Vocal coaching, Instrumental mastery, Music production, Sound engineering, Music promotion')
@section('canonical', 'https://oratoriogroup.org/contact-oratorio')
@section('main')
@include('partials._nav')
<br>
<br>
<section id="contact" class="contact-sec" data-aos="zoom-in" data-aos-duration="1000">
   <div class="container">
      <div class="col-xl-5 section-head text-center m-auto mb-5">
         <span class="label">Register, Plan, Support and Attend</span>
         <h2 class="title mx-2">
           Annual Festive of Praise and Worship
         </h2>
      </div>
      @if (session('status'))
        <p class="bg-whit border-t-4 border-red-600 p-5 shadow-lg relative rounded-md" uk-alert>
            {{ session('status') }}
        </p>
        @endif
      <div class="contact-wrap bg-none p-0">
         <div class="dots">
            <img src="assets/images/dots/dots13.png" alt="Shadow Image" class="contact-dots-1 img-moving-anim2">
         </div>
         <div class="contact-wrap row py-4 px-3 contact align-items-center m-0">
            <!-- <div class="col-lg-4">
               <div class="contact-thumb-wrap" style="background-image: url(assets/images/banner/contact-bg.png);">
                  <div class="contact-content">
                     <h5 class="title text-white">Contact Us</h5>
                     <p class="desc">
                        Get in touch and let us know how
                        we can help.
                     </p>
                     <div class="info">
                        <a href="mailto:support@oratorio.org" class="icon d-block mb-3">
                           <img src="assets/images/icon/mail1.svg" alt="Mail" style="color: #fff;"> Mail
                        </a>
                        <a class="location d-block mb-3">
                           <img src="assets/images/icon/map-pin2.svg" alt="Map"> 3 Campus
                        </a>
                        <a href="tel:+2349035155129" class="phone d-block">
                           <img src="assets/images/icon/phone3.svg" alt="Phone">
                           Call
                        </a>
                     </div>
                  </div>
               </div>
            </div> -->
            <div class="col-lg-12 mt-4 mt-lg-0">
               <form class="contact-form" action="{{ route('concert.store') }}" method="POST">
                  @csrf
                  <div class="row gy-3">
                     <div class="col-lg-3">
                        <label for="fullname" class="form-label">Full name</label>
                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Your full name" required>
                     </div> 
                     <div class="col-lg-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                     </div>
                     <div class="col-lg-3">
                        <label for="email" class="form-label">Phone no</label>
                        <input type="tel" class="form-control" name="phone"  pattern="^0(?:70|71|80|81|90|91)[0-9]{8}$" maxlength="11" minlength="11" id="phone" placeholder="Enter Phone no" required>
                     </div> 
                     <div class="col-lg-3">
                        <label for="school" class="form-label">Your School?</label>
                        <input type="text" class="form-control" name="school" id="school" placeholder="Current/Attended School">
                     </div> 
                  </div> 
                  <button class="mt-4 custom-btn2" type="submit">Attend</button>
               </form>
            </div>
         </div>

         <div class="dots">
            <img src="assets/images/dots/dots14.png" alt="Shadow Image" class="contact-dots-2 img-moving-anim3">
         </div>
      </div>
   </div>
</section>

@endsection