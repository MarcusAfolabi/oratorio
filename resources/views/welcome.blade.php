@extends('layouts.main')
@section('title', 'Welcome to Oratorio Music Foundation')
@section('description', 'Join our community of vocal, singer, instrumentalist and more')
@section('keyword', 'oratorio, oratorio group, choir, campus choir, joint choir, community, vocal, singer, instrumentalist and Musical group, Young talents, Live performances, Concerts, Music videos, Original compositions, Recording studio, Creative collaboration, Music industry, 
Entertaining performances, Dynamic artists, Music genres (e.g. pop, rock, jazz, R&B, etc.), Music competitions, Fan base, Music education, Vocal coaching, Instrumental mastery, Music production, Sound engineering, Music promotion')
@section('canonical', 'https://oratoriogroup.org')
@section('main')

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
<section id="about" class="about-sec">
   <div class="container">
      <div class="section-head col-xl-9 m-auto text-center mb-5">
         <span class="label">Welcome to Oratorio Music Foundation</span>
         <h1 class="title mb-4">
            Music Passion since 1996
         </h1>
         <p class="desc mx-3">
            Adejumo Oyindamola since 1996 has been visiting her past by ensuring ORATORIO annual concert holds every year with millions of naira always spent.
         </p>
      </div>

      <div class="about-items-wrap" data-aos="fade-right" data-aos-duration="1000">
         <div class="row g-4">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="800">
               <div class="about-item">
                  <div class="item-thumb">
                     <img src="assets/images/about/about1.png" alt="About Images">
                     <div class="item-content">
                        <div class="content-title text-white">
                           <h5 class="title">WONDERS</h5>
                        </div>
                        <div class="about-video">
                           <a class="video-btn1 popup-video" data-bs-toggle="modal" data-bs-target="#iyanuModal" href="https://www.youtube.com/watch?v=Eh4GYfpcwJk"><span><i class="fas fa-play"></i></span></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-lg-3" data-aos="fade-right" data-aos-duration="700">
               <div class="about-item">
                  <div class="item-thumb">
                     <img src="assets/images/about/about2.png" alt="About Images">
                     <div class="item-content text-white">
                        <div class="content-title">
                           <h5 class="title">I SHALL NOT DIE</h5>
                        </div>
                        <div class="about-video">
                           <a class="video-btn1 popup-video" data-bs-toggle="modal" data-bs-target="#notDie" href="#"><span><i class="fas fa-play"></i></span></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-lg-3" data-aos="fade-right" data-aos-duration="600">
               <div class="about-item">
                  <div class="item-thumb">
                     <img src="assets/images/about/about3.png" alt="About Images">
                     <div class="item-content text-white">
                        <div class="content-title">
                           <h5 class="title">JESU OLUWA LO NIYIN</h5>
                        </div>
                        <div class="about-video">
                           <a class="video-btn1 popup-video" data-bs-toggle="modal" data-bs-target="#jesuOluwa" href="http://www.youtube.com/watch?v=Eh4GYfpcwJk"><span><i class="fas fa-play"></i></span></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dots img-moving-anim5">
               <img src="assets/images/dots/dots4.png" alt="Shape Images">
            </div>
         </div>
      </div>
   </div>
   <div class="shape">
      <img src="{{ asset('assets/images/shape/1.svg') }}" title="Oratorio Music Foundation" alt="Oratorio Music Foundation">
   </div>
</section>

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
                  Oyindamola Adejumo-Ayibiowu
               </h2>
               <p class="desc">
                  A Mother, A Mentor, A Doctorate, A Prophetess and More

                  <br><br>
                  Oyindamola Adejumo-Ayibiowu World Outreach is an organization that has the purpose of reaching out to Nigerian communities especially campus students through musical programs ministration, concerts, seminars, talent programs, and mentoring programs and other special events.
                  <a href="#">Learn More</a>

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
<section class="faq-sec">
   <div class="container">
      <div class="row align-items-end">
         <div class="col-lg-6 mb-0 mb-lg-0" data-aos="fade-right" data-aos-duration="1000">
            <div class="title-area">
               <h2 class="title mb-3">
                  Frequently asked questions,
                  about Oratorio Music Foundation
               </h2>
               <p class="desc mb-5">
                  A brief overview of the organization's mission and vision, as well as its services and activities.
               </p>

               <!-- <button class="faq-btn custom-btn">Learn More</button> -->
               <a href="{{ route('register') }}" target="_blank"> <button class="faq-btn custom-btn">Join Now</button></a>

            </div>
         </div>
         <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
            <div class="question-area">
               <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           How do I become a member of Oratorio?
                        </button>
                     </h2>
                     <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                           To become a member of Oratorio, you can visit our website and fill out our membership application form. Membership is open to individuals who are at least 18 years old and share our values and vision.
                        </div>
                     </div>
                  </div>
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                           What kind of volunteer opportunities does Oratorio offer? </button>
                     </h2>
                     <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                           Oratorio offers a wide range of volunteer opportunities for individuals with different skills and interests. Some of our volunteer opportunities include event planning, fundraising, community outreach, mentoring, and more.
                        </div>
                     </div>
                  </div>
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           Do I need any special skills or qualifications to volunteer with Oratorio?
                        </button>
                     </h2>
                     <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                           No, you do not need any special skills or qualifications to volunteer with Oratorio. We welcome volunteers from all backgrounds and experiences, and we provide training and support to help you succeed in your role.
                        </div>
                     </div>
                  </div>
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                           How much time do I need to commit as a volunteer with Oratorio?
                        </button>
                     </h2>
                     <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                           The time commitment for volunteering with Oratorio varies depending on the role and project. We have both short-term and long-term volunteer opportunities, and we work with volunteers to find a schedule that fits their availability and interests.
                        </div>
                     </div>
                  </div>
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                           How can I get involved with Oratorio if there is no chapter in my area?
                        </button>
                     </h2>
                     <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                           Oratorio has a global network of members and volunteers, and we welcome individuals from all over the world to join us. If there is no chapter in your area, you can still get involved with Oratorio by becoming a virtual volunteer, supporting our online campaigns, or starting a new chapter in your community. Please contact us for more information.
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="container">
   <hr>
</div>
 
<section id="contact" class="contact-sec" data-aos="zoom-in" data-aos-duration="1000">
   <div class="container">
      <div class="col-xl-5 section-head text-center m-auto mb-5">
         <span class="label">Contact us for any of your inquires</span>
         <h2 class="title mx-2">
            We are here when you need us.
            Need immediate assistance?
         </h2>
      </div>
      <div class="contact-wrap bg-none p-0">
         <div class="dots">
            <img src="assets/images/dots/dots13.png" alt="Shadow Image" class="contact-dots-1 img-moving-anim2">
         </div>
         <div class="contact-wrap row py-4 px-3 contact align-items-center m-0">
            <div class="col-lg-4">
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
            </div>
            <div class="col-lg-8 mt-4 mt-lg-0">
               <form class="contact-form" action="{{ route('contact.store') }}" method="POST">
                  @csrf

                  <div class="row gy-3">
                     <div class="col-lg-6">
                        <label for="fullname" class="form-label">Full name</label>
                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Your full name" required>
                     </div> 
                     <div class="col-lg-6">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                     </div>
                     <div class="col-lg-6">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Subject" required>
                     </div>
                  </div>
                  <div class="mb-3">

                  </div>
                  <div class="text-area col-12 mb-3">
                     <label for="message" class="form-label">Your message</label>
                     <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter Your message"></textarea>
                  </div>
                  <button class=" custom-btn2" type="submit">Submit</button>
               </form>
            </div>
         </div>

         <div class="dots">
            <img src="assets/images/dots/dots14.png" alt="Shadow Image" class="contact-dots-2 img-moving-anim3">
         </div>
      </div>
   </div>
</section>
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