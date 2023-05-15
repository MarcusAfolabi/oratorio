<!DOCTYPE html>
<html lang="en">


<head>

	<meta charset="utf-8" />

	<!--Meta Tegs-->
	<title>Thank you - Audition</title>
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
	<header class="header" id="header">
		<div class="header-sticky__wrapp">
			<div class="container">
				<div class="row">
					<div class="logo col-md-3 col-sm-4 col-xs-12">
						<a class="navbar-brand" href="index.html">
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

	 <br>
	 <br>


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
				</div>
				<br>
				<br> 
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