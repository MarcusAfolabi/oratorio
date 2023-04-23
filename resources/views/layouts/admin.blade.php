<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title') | Oratorio Music Foundation</title>
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('admin/css/site.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="canonical" href="@yield('canonical')" />
</head>

<body class="layout-row">
    <div id="aside" class="page-sidenav no-shrink bg-light nav-dropdown fade" aria-hidden="true">
        <div class="sidenav h-100 modal-dialog bg-light">
            <div class="navbar"> <a href="#" class="navbar-brand"> <img src="{{ asset('head_icon.png') }}" title="Oratorio music foundation" alt="Oratorio music foundation"> <span class="hidden-folded d-inline l-s-n-1x">Admin</span> </a><!-- / brand --></div>
            <div class="flex scrollable hover">
                <div class="nav-active-text-primary" data-nav>
                    <ul class="nav bg">
                        <li class="nav-header hidden-folded"><span class="text-muted">Main</span></li>
                        <li class="{{ Request::routeIs('dashboard.index') ? 'active' : ''}}"><a href="{{ route('dashboard.index')}}"><span class="nav-icon text-primary"><i data-feather="home"></i></span> <span class="nav-text">Dashboard</span></a></li>
                        <li class="{{ Request::routeIs('users.index') ? 'active' : ''}}"><a href="{{ route('users.index') }}" class=""><span class="nav-icon text-success"><i data-feather="users"></i></span> <span class="nav-text">Members</span>
                                <span><b class="badge badge-pill gd-success">
                                        @php $count = App\Models\User::select('id')->count(); @endphp
                                        {{ $count }}
                                    </b></span> </a>
                        </li>
                        <li class="{{ Request::routeIs('community.index') ? 'active' : ''}}"><a href="{{ route('community.index') }}" class=""><span class="nav-icon text-primary"><i data-feather="message-circle"></i></span> <span class="nav-text">Community</span>
                                <span><b class="badge badge-pill gd-primary">
                                        @php $count = App\Models\Community::select('id')->count(); @endphp
                                        {{ $count }}
                                    </b></span> </a>
                        </li>
                        <li class="{{ Request::routeIs('field.index') ? 'active' : ''}}"><a href="{{ route('field.index') }}"><span class="nav-icon text-warning"><i data-feather="message-circle"></i></span> <span class="nav-text">Educational Fields</span>
                        <li class="{{ Request::routeIs('industry.index') ? 'active' : ''}}"><a href="{{ route('industry.index') }}"><span class="nav-icon text-warning"><i data-feather="message-circle"></i></span> <span class="nav-text">Industry Fields</span>
                                <!-- <li><a href="#"><span class="nav-icon text-danger"><i data-feather="mail"></i></span> <span class="nav-text">Email</span></a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="main" class="layout-column flex">
        <div id="header" class="page-header">
            <div class="navbar navbar-expand-lg"> <a href="#" class="navbar-brand d-lg-none"> <img src="{{ asset('head_icon.png') }}" alt="..."> <span class="hidden-folded d-inline l-s-n-1x d-lg-none">Admin</span>
                </a>
                <div class="collapse navbar-collapse order-2 order-lg-1" id="navbarToggler">
                    <form class="input-group m-2 my-lg-0">
                        <div class="input-group-prepend"><button type="button" class="btn no-shadow no-bg px-0 text-inherit"><i data-feather="search"></i></button>
                        </div><input type="text" class="form-control no-border no-shadow no-bg typeahead" placeholder="Search community..." data-plugin="typeahead" data-api="../assets/api/menu.json">
                    </form>
                </div>
                <ul class="nav navbar-menu order-1 order-lg-2">

                    <li class="nav-item dropdown"><a class="nav-link px-2 mr-lg-2" data-toggle="dropdown"><i data-feather="bell"></i> <span class="badge badge-pill badge-up bg-primary">5</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mt-3 w-md animate fadeIn p-0">
                            <div class="scrollable hover" style="max-height: 250px">
                                <div class="list list-row">
                                    <div class="list-item" data-id="5">
                                        <div><a href="#"><span class="w-32 avatar gd-warning"><img src="../assets/img/a5.jpg" alt="."></span></a></div>
                                        <div class="flex">
                                            <div class="item-feed h-2x">Learn how to use <a href="#">Google
                                                    Analytics</a> to discover vital information about your readers.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-item" data-id="6">
                                        <div><a href="#"><span class="w-32 avatar gd-danger"><img src="../assets/img/a6.jpg" alt="."></span></a></div>
                                        <div class="flex">
                                            <div class="item-feed h-2x">Just saw this on the <a href="#">@eBay</a>
                                                dashboard, dude is an absolute unit.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex px-3 py-2 b-t">
                                <div class="flex"><span>2+ Notifications</span></div><a href="page.setting.html">See all
                                    <i class="fa fa-angle-right text-muted"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" class="nav-link d-flex align-items-center px-2 text-color"><span class="avatar w-24" style="margin: -2px"><img src="{{ asset(auth()->user()->profile_photo_path) }}" alt="oratorio admin"></span></a>
                        <div class="dropdown-menu dropdown-menu-right w mt-3 animate fadeIn"><a class="dropdown-item" href="page.profile.html"><span>{{ auth()->user()->name }}</span> </a><a class="dropdown-item" href="page.price.html"><span class="badge bg-success text-uppercase">Upgrade</span>
                                <span>to Pro</span></a>
                            <div class="dropdown-divider"></div>
                            @php $user = Auth::user()->id; @endphp
                            <a class="dropdown-item" href="{{ route('profile.edit', $user) }}"><span>My Profile</span> </a>
                            <a class="dropdown-item d-flex" href="page.invoice.html"><span class="flex">Invoice</span> <span><b class="badge badge-pill gd-warning">5</b></span> </a><a class="dropdown-item" href="page.faq.html">Need help?</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="page.setting.html"><span>Account Settings</span> </a><a class="dropdown-item" href="signin.1.html">Sign out</a>
                        </div>
                    </li>
                    <li class="nav-item d-lg-none"><a href="#" class="nav-link px-2" data-toggle="collapse" data-toggle-class data-target="#navbarToggler"><i data-feather="search"></i></a></li>
                    <li class="nav-item d-lg-none"><a class="nav-link px-1" data-toggle="modal" data-target="#aside"><i data-feather="menu"></i></a></li>
                </ul>
            </div>
        </div>
        @yield('admin')
    </div>
    <script src="{{ asset('admin/js/site.min.js') }}"></script>
</body>

</html>