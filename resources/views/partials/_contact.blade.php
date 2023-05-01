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
                        <label for="email" class="form-label">Phone no</label>
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter Phone no" required>
                     </div>
                     <div class="col-lg-6">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject of contact" required>
                     </div>
                  </div>
                  <div class="mb-3">

                  </div>
                  <div class="text-area col-12 mb-3">
                     <label for="message" class="form-label">Your message</label>
                     <textarea class="form-control" id="message" name="message" rows="3" placeholder="Express Your message"></textarea>
                  </div>
                  <button class=" custom-btn2" type="submit">Send</button>
               </form>
            </div>
         </div>

         <div class="dots">
            <img src="assets/images/dots/dots14.png" alt="Shadow Image" class="contact-dots-2 img-moving-anim3">
         </div>
      </div>
   </div>
</section>