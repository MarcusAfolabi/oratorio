@extends('layouts.main')
@section('title', 'Gallery of Oratorio Music Foundation')
@section('description', 'Gallery of community of inspired oratorio, vocal, singer, instrumentalist and more')
@section('keyword', 'gallery, pictures, events, picstory, about, about music, learn more about oratorio, know more about music, oratorio, oratorio group, choir, campus choir, joint choir, community, vocal, singer, instrumentalist and Musical group, Young talents, Live performances, Concerts, Music videos, Original compositions, Recording studio, Creative collaboration, Music industry,
Entertaining performances, Dynamic artists, Music genres pop, rock, jazz, R&B, Music competitions, Fan base, Music education, Vocal coaching, Instrumental mastery, Music production, Sound engineering, Music promotion')
@section('canonical', 'https://oratoriogroup.org/gallery-oratorio')
@section('main')
@include('partials._nav')
<br>
<br>

<section id="gallery" class="gallery-sec">
   <div class="container">
      <div class="section-head col-xl-9 m-auto text-center mb-5">
         <h1 class="title mb-4">
           Gallery Events since 1996
         </h1>
         <p class="desc mx-3">
            Adejumo Oyindamola since 1996 has been visiting her past by ensuring ORATORIO annual concert holds every year with millions of naira always spent.
         </p>
      </div>
      <div class="about-items-wrap" data-aos="fade-right" data-aos-duration="1000">
         <div class="row g-4">
         <div class="dots img-moving-anim5">
               <img src="assets/images/dots/dots5.png" alt="Shape Images">
            </div>
            @forelse ($galleries->images as $image)
            <div class="col-sm-6 col-lg-3" data-aos="fade-right" data-aos-duration="700">
               <div class="about-item">
                  <div class="item-thumb">
                     <img src="{{ asset('storage/' . $image->path) }}" alt="About Images">
                     <div class="item-content text-white"> 
                     </div>
                  </div>
               </div>
            </div>
            @empty
            @endforelse 
            <div class="dots img-moving-anim5">
               <img src="{{ asset('assets/images/dots/dots4.png') }}" alt="Shape Images">
            </div>
         </div>
      </div>
   </div>
   <div class="shape">
      <img src="{{ asset('assets/images/shape/1.svg') }}" title="Oratorio Music Foundation" alt="Oratorio Music Foundation">
   </div>
</section>

@endsection