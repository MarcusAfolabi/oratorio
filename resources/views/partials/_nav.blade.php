<nav class="header-nav navbar fixed-top navbar-expand-lg position-absolute w-100">
        <div class="container header-nav-menu">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('new_logo_oratorio_group.png') }}" alt="Header Logo">
            </a>
            <div class="collapse navbar-collapse d-none d-lg-block">
                <ul class="navbar-nav m-auto" style="color: white;">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link py-3">Welcome</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('about-oratorio') }}" class="nav-link py-3">About Oratorio</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="{{ route('login') }}" target="_blank" class="nav-link py-3">Join</a>
                    </li> -->
                   
                    <li class="nav-item">
                        <a href="{{ url('gallery-oratorio') }}" class="nav-link py-3">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="modal" href="#donateModal" class="nav-link py-3">Support</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('audition.index') }}" target="_blank" class="nav-link py-3">Audition</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('contact-oratorio') }}" class="nav-link py-3">Contact</a>
                    </li>
                </ul>
                <div class="mode-and-button d-flex align-items-center">
                    <div class="mode me-md-3">
                        <img src="{{ asset('assets/images/icon/sun.svg') }}" alt="Sun" class="fa-sun" style="display: none;">
                        <img src="{{ asset('assets/images/icon/moon.svg') }}" alt="Moon" class="fa-moon">
                    </div>
                    <button class="header-btn custom-btn2" data-bs-toggle="modal" data-bs-target="#eventModal">Volunteer</button>
                </div>
            </div>

            <!-- mobile menu -->
            <div class="mobile-view-header d-block d-lg-none d-flex gap-3 align-items-center">
                <div class="mode me-md-3">
                    <img src="{{ asset('assets/images/icon/sun.svg') }}" alt="Sun" class="fa-sun" style="display: none;">
                    <img src="{{ asset('assets/images/icon/moon.svg') }}" alt="Moon" class="fa-moon">
                </div>
                <button class="header-btn custom-btn2" data-bs-toggle="modal" data-bs-target="#eventModal">Volunteer</button>
                <a class="border rounded-1 py-1 px-2 bg-light" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    <span class="navbar-toggler-icon nav-toggler-icon"></span>
                </a>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample">
                    <div class="offcanvas-header">
                        <a class="navbar-brand" href="#">
                            <img src="{{ asset('new_logo_oratorio_group.png') }}" alt="Header Logo">
                        </a>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="dropdown mt-3">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="#" class="nav-link py-3">Welcome</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#about" class="nav-link py-3">About Oratorio</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link py-3">Join</a>
                                </li>
                                <li class="nav-item">
                                    <a data-bs-toggle="modal" href="#donateModal" class="nav-link py-3">Donate</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#contact" class="nav-link py-3">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>