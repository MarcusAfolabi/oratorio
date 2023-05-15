<!DOCTYPE html>
<html lang="en">


<head>

	<meta charset="utf-8" />

	<!--Meta Tegs-->
	<title>Audition</title>
	<meta content="" name="description" />

	<!--Icons-->
	<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<!-- Google font -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,700,900' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700' rel='stylesheet' type='text/css'>

	<!--Style-->
	<link rel="stylesheet" href="{{ asset('audition/libs/bootstrap/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('audition/libs/animate/animate.css') }}" />
	<link rel="stylesheet" href="{{ asset('audition/libs/icons/materialdesignicons.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('audition/libs/icons/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('audition/libs/hero-slider/hero-style.css') }}">
	<link rel="stylesheet" href="{{ asset('audition/css/main.css') }}" />
	<link rel="stylesheet" href="{{ asset('audition/css/media.css') }}" />

</head>

<body>
	<!-- Header Section Start -->
	<header class="header" id="header">
		<div class="header-sticky__wrapp">
			<div class="container">
				<div class="row">
					<div class="logo col-md-3 col-sm-4 col-xs-12">
						<a class="navbar-brand" href="/">
							<span class="logo__text">Audition</span>
						</a>
					</div>
					<div class="main__menu-wrap col-md-8 col-sm-7 col-xs-6">
						<nav class="main__menu pull-right" id="main__nav">
							<ul class="m-menu__list clearfix">

								<li class="fs__list-item"><a href="https://twitter.com/OratorioGroup" class="animation"><i class="mdi mdi-twitter"></i></a></li>
								<li class="fs__list-item"><a href="https://web.facebook.com/OratorioGroup" class="animation"><i class="mdi mdi-facebook"></i></a></li>
								<li class="fs__list-item"><a href="https://www.instagram.com/official_OratorioGroup" class="animation"><i class="mdi mdi-instagram"></i></a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section class="cd-hero">
		<ul class="cd-hero-slider">
		<li class="selected" style="background-image: url('{{ asset('audition/img/audition_oratorio.png') }}')">
				<div class="cd-full-width">
					<div class="cd-full__contant">
						<p class="m-img__subtitle title__grey"> </p>
						<h1 class="m-img__title"></h1>
					</div>
				</div>
			</li>

		</ul>

		<div class="cd-slider-nav">
			<nav>
				<ul>
					<li class="selected"><a href="#"></a></li>
				</ul>
			</nav>
		</div>
	</section>


	<div class="section about">
		<div class="container">
			<div class="row">
				<div class="col-md-6 about__text-wrapp">
				<x-validation-errors class="mb-4" />
				@if (session('status'))
				<p class="bg-whit border-t-4 border-red-600 p-5 shadow-lg relative rounded-md" uk-alert>
					{{ session('status') }}
				</p>
				@endif
					<div class="about__title title__grey">Our Vision</div>
					<div class="about__big-tex text__quote"><span class="line__text"></span>To be an anointed
						international musical group ministering with excellent skill and creativity, wining souls to the
						kingdom of God in large numbers, sharing the love of God with others and giving hope to our
						generation by promoting destinies to glory.
					</div>
					
				</div>
				<br>
				<br>
				<div class="col-md-6 about__text-wrapp">
					<div class="about__title title__grey">Your first step</div>
					<form action="{{ route('audition.participant') }}">
						@csrf
						<input id="email" type="email" name="email" class="px-4 py-4  text-white input input__subscribe" placeholder="Your e-mail">
						<button type="submit" class="submit__button animation"><i class="mdi mdi-arrow-right"></i>Apply
							Now</button>
					</form>
				</div>
				
			</div>
		</div>
	</div>
	<section class="section services">
		<div class="container">
			<div class="row">
				<h2 class="section__title">Audition Benefits</h2>
				<div class="services__wrapp">
					<div class="services__section clearfix">
						<div class="col-md-6 services__content services__content_left">
							<h3 class="services__title services__title_l">Personal Growth and Confidence Building</h3>
							<div class="services__text">The audition process itself can be a transformative experience
								for participants. It challenges them to step out of their comfort zones, face their
								fears, and develop confidence in their musical abilities. Through the audition and
								subsequent involvement in the Oratorio Group, individuals can experience personal growth
								and self-discovery.</div>
						</div>
						<div class="col-md-6 services__photo"><img src="{{ asset('audition/img/music-people-instruments_guitar.png') }}" class="rounded-lg" alt="Personal Growth and Confidence Building" title="Personal Growth and Confidence Building"></div>
					</div>
					<div class="services__section clearfix">
						<div class="col-md-6 services__content services__content_right">
							<h3 class="services__title services__title_r">Talent Discovery</h3>
							<div class="services__text">The Oratorio Audition provides a platform for individuals to
								showcase their musical talents and abilities. It allows the Oratorio Group to discover
								and identify individuals with exceptional musical potential.</div>
						</div>
						<div class="col-md-6 services__photo"><img src="{{ asset('audition/img/music-people-instruments_sax.png') }}" alt="Talent Discovery" title="Talent Discovery"></div>
					</div>
					<div class="services__section clearfix">
						<div class="col-md-6 services__photo"><img src="{{ asset('audition/img/music-people-instruments_keyboard.png') }}" alt="Performance Opportunities" title="Performance Opportunities"></div>
						<div class="col-md-6 services__content services__content_right">
							<h3 class="services__title services__title_r">Performance Opportunities</h3>
							<div class="services__text">Successful audition candidates may
								have the chance to perform with the Oratorio Group in various musical concerts, events,
								and outreach programs. These performances allow individuals to gain exposure, showcase
								their talent to a wider audience, and contribute to the mission of bringing hope and
								inspiration through music.</div>
						</div>
					</div>
					<div class="services__section clearfix">
						<div class="col-md-6 services__content services__content_left">
							<h3 class="services__title services__title_l">Mentorship and Coaching</h3>
							<div class="services__text">The Oratorio Group offers coaching and mentorship programs to
								its members. By participating in the audition, individuals have the chance to receive
								guidance and support from experienced mentors and coaches who can help them refine their
								skills and navigate their musical journey.</div>
						</div>
						<div class="col-md-6 services__photo"><img src="{{ asset('audition/img/music-people-instruments_vocal.png') }}" alt="Mentorship and Coaching" title="Mentorship and Coaching"></div>
					</div>
					<div class="services__section clearfix">
						<div class="col-md-6 services__photo"><img src="{{ asset('audition/img/music-people-instruments_lead.png') }}" alt="Networking Opportunities" title="Networking Opportunities"></div>
						<div class="col-md-6 services__content services__content_right">
							<h3 class="services__title services__title_r">Networking Opportunities</h3>
							<div class="services__text">The Oratorio Audition brings together aspiring musicians and
								individuals passionate about music. It provides a networking platform where participants
								can connect with like-minded individuals, exchange ideas, and form collaborations within
								the music industry.</div>
						</div>
					</div>
					<div class="services__section clearfix">
						<div class="col-md-6 services__content services__content_right">
							<h3 class="services__title services__title_r">Skill Development</h3>
							<div class="services__text">Participating in the Oratorio Audition offers an opportunity for
								individuals to further develop their musical skills. Through the audition process and
								subsequent training, participants can enhance their vocal abilities, musical
								interpretation, and stage presence.</div>
						</div>
						<div class="col-md-6 services__photo"><img src="{{ asset('audition/img/music-people-instruments_bass.png') }}" alt="Skill Development" title="Skill Development"></div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<div class="section action">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text__quote action__text">Take the first step towards fulfilling your dreams. Join
					the Oratorio Audition now! </div>
				<form action="{{ route('audition.participant') }}">
					@csrf
					<input id="email" type="email" name="email" class="px-4 py-4  text-white input input__subscribe" placeholder="Your e-mail">
					<button type="submit" class="submit__button animation"><i class="mdi mdi-arrow-right"></i>Apply
						Now</button>
				</form>
			</div>
		</div>
	</div>

	<div class="scroll-top animation"><i class="mdi mdi-arrow-up"></i></div>

	<div class="hidden"></div>

	<script src="{{ asset('audition/libs/jquery/jquery-1.11.2.min.js') }}"></script>
	<script src="{{ asset('audition/libs/modernizr/modernizr.js') }}"></script>
	<script src="{{ asset('audition/libs/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('audition/libs/plugins-scroll/plugins-scroll.js') }}"></script>
	<script src="{{ asset('audition/libs/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
	<script src="{{ asset('audition/libs/izotope/isotope.pkgd.min.js') }}"></script>
	<script src="{{ asset('audition/libs/hero-slider/hero-slider.js') }}"></script>
	<script src="{{ asset('audition/js/common.js') }}"></script>
</body>

</html>