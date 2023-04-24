<header>
    <div class="header_wrap">
        <div class="header_inner mcontainer">
            <div class="left_side">

                <span class="slide_menu" uk-toggle="target: #wrapper ; cls: is-collapse is-active">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path d="M3 4h18v2H3V4zm0 7h12v2H3v-2zm0 7h18v2H3v-2z" fill="currentColor"></path>
                    </svg>
                </span>

                <div id="logo">
                    <a href="#">
                        <img src="assets/images/logo.png" alt="oratorio logo">
                        <img src="assets/images/logo-mobile.png" class="logo_mobile" alt="oratorio logo">
                    </a>
                </div>
            </div>

            <!-- search icon for mobile -->
            <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
            <div class="header_search">
                <input name="search" type="text" class="form-control" placeholder="Search for events, jobs and more.." autocomplete="off">
                <i class="uil-search-alt"></i>
            </div>
            <div uk-drop="mode: click" class="hidden md:w-1/3 w-11/12 shadow-lg rounded-md -mt-1 bg-white">
                <div class="-mt-2 p-3">
                    <h4 class="font-semibold mb-1 mt-2 px-2.5 text-lg"> recent jobs </h4>
                    <ul>
                        <li>
                            <a href="#" class="flex items-center space-x-2 p-2 hover:bg-gray-100 rounded-md">
                                <img src="assets/images/avatars/avatar-4.jpg" alt="" class="border mr-3 rounded-full shadow-sm w-8">
                                Erica Jones
                            </a>
                        </li> 
                    </ul>
                </div>
            </div>

            <div class="right_side">

                <div class="header_widgets">
                    <a href="#" class="is_icon" uk-tooltip="title: Notifications">
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                        </svg>
                        <span>0</span>
                    </a>
                    <!-- <div uk-drop="mode: click" class="header_dropdown">
                        <div class="dropdown_scrollbar" data-simplebar>
                            <div class="drop_headline">
                                <h4>Notifications </h4>
                                <div class="btn_action">
                                    <a href="#" data-tippy-placement="left" title="Notifications">
                                        <ion-icon name="settings-outline"></ion-icon>
                                    </a>
                                    <a href="#" data-tippy-placement="left" title="Mark as read all">
                                        <ion-icon name="checkbox-outline"></ion-icon>
                                    </a>
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <a href="#">
                                        <div class="drop_avatar">
                                            <img src="assets/images/avatars/avatar-1.jpg" alt="">
                                        </div>
                                        <span class="drop_icon bg-gradient-primary">
                                            <i class="icon-feather-thumbs-up"></i>
                                        </span>
                                        <div class="drop_text">
                                            <p>
                                                <strong>Adrian Mohani</strong> Like Your Comment On Video
                                                <span class="text-link">Learn Prototype Faster </span>
                                            </p>
                                            <time> 2 hours ago </time>
                                        </div>
                                    </a>
                                </li>
                                <li class="not-read">
                                    <a href="#">
                                        <div class="drop_avatar status-online"> <img src="assets/images/avatars/avatar-2.jpg" alt="">
                                        </div>
                                        <div class="drop_text">
                                            <p>
                                                <strong>Stella Johnson</strong> Replay Your Comments in
                                                <span class="text-link">Adobe XD Tutorial</span>
                                            </p>
                                            <time> 9 hours ago </time>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> -->

                    <!-- Message -->
                    <a href="#" class="is_icon" uk-tooltip="title: Message">
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                        </svg>
                        <span>0</span>
                    </a>
                    <!-- <div uk-drop="mode: click" class="header_dropdown is_message">
                        <div class="dropdown_scrollbar" data-simplebar>
                            <div class="drop_headline">
                                <h4>Messages </h4>
                                <div class="btn_action">
                                    <a href="#" data-tippy-placement="left" title="Notifications">
                                        <ion-icon name="settings-outline" uk-tooltip="title: Message settings ; pos: left"></ion-icon>
                                    </a>
                                    <a href="#" data-tippy-placement="left" title="Mark as read all">
                                        <ion-icon name="checkbox-outline"></ion-icon>
                                    </a>
                                </div>
                            </div>
                            <input type="text" class="uk-input" placeholder="Search in Messages">
                            <ul>
                                <li class="un-read">
                                    <a href="#">
                                        <div class="drop_avatar"> <img src="assets/images/avatars/avatar-7.jpg" alt="">
                                        </div>
                                        <div class="drop_text">
                                            <strong> Stella Johnson </strong> <time>12:43 PM</time>
                                            <p> Alex will explain you how ... </p>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="drop_avatar"> <img src="assets/images/avatars/avatar-4.jpg" alt="">
                                        </div>
                                        <div class="drop_text">
                                            <strong> Jonathan Madano </strong> <time> Sun</time>
                                            <p> Replay Your Comments insit amet consectetur </p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="see-all"> See all in Messages</a>
                    </div> -->
                    <a href="#">
                        <img src="{{ asset(auth()->user()->profile_photo_url) }}" title="{{ auth()->user()->name }}" class="is_avatar" alt="{{ auth()->user()->name }}">
                    </a>
                    <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">

                        <a href="timeline.html" class="user">
                            <div class="user_avatar">
                                <img src="{{ asset(auth()->user()->profile_photo_url) }}" title="{{ auth()->user()->name }}" alt="{{ auth()->user()->name }}">
                            </div>
                            <div class="user_name">
                                <div> {{ auth()->user()->name }} {{ auth()->user()->last_name }}</div>
                                <span> {{ auth()->user()->slug }}</span>
                            </div>
                        </a> @php $user = auth()->user(); @endphp
                        <a href="{{ route('users.edit', $user) }}">
                            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                            </svg>
                            Manage Account
                        </a>
                        <a href="{{ route('post.list') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd" />
                            </svg>
                            Manage Jobs
                        </a> 
                        <a href="{{ route('user.logout') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Log Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>