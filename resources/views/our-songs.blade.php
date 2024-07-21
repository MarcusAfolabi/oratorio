@extends('layouts.main')
@section('title', 'Oratorio Songs')
@section('description', 'Contact Our community of inspired oratorio, vocal, singer, instrumentalist and more')
@section('keyword', 'about, about music, learn more about oratorio, know more about music, oratorio, oratorio group, choir, campus choir, joint choir, community, vocal, singer, instrumentalist and Musical group, Young talents, Live performances, Concerts, Music videos, Original compositions, Recording studio, Creative collaboration, Music industry,
Entertaining performances, Dynamic artists, Music genres pop, rock, jazz, R&B, Music competitions, Fan base, Music education, Vocal coaching, Instrumental mastery, Music production, Sound engineering, Music promotion')
@section('main')
@include('partials._nav')
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="info-sec">
    <div class="container">
        <div class="info-countdown" style="background-image: url(assets/images/banner/the-lamb-slain.png);">
            <ul class="counter-box d-flex justify-content-around" data-countdown="2023/10/22">
            </ul>
            <div class="dots img-moving-anim2">
                <img src="assets/images/dots/dots3.png" alt="Shadow Image">
            </div>
        </div>
        <div class="information-area">
            <div class="row g-4">
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="600">
                    <div class="mail">
                        <div class="icon"><img src="assets/images/icon/map-pin.svg" alt="Mail"></div>
                        <a href="mailto:help@oratoriogroup.org" class="mail-link">Youtube Videos</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="800">
                    <div class="location">
                        <div class="icon"><img src="assets/images/icon/map-pin.svg" alt="Map"></div>
                        <a href="#" class="location-link">Audio Songs</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="1000">
                    <div class="number">
                        <div class="icon"><img src="assets/images/icon/map-pin.svg" alt="Phone"></div>
                        <a href="#" class="number-link">Possibilities Music</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection