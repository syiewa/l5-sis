<!-- start: HEADER -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <!-- start: TOP NAVIGATION CONTAINER -->
    <div class="container">
        <div class="navbar-header">
            <!-- start: RESPONSIVE MENU TOGGLER -->
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="clip-list-2"></span>
            </button>
            <!-- end: RESPONSIVE MENU TOGGLER -->
            <!-- start: LOGO -->
            <a class="navbar-brand" href="index.html">
                CLIP<i class="clip-clip"></i>ONE
            </a>
            <!-- end: LOGO -->
        </div>
        <div class="navbar-tools">
            <!-- start: TOP NAVIGATION MENU -->
            <ul class="nav navbar-right">
                <!-- start: USER DROPDOWN -->
                <li class="dropdown current-user">
                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                        <img src="assets/images/avatar-1-small.jpg" class="circle-img" alt="">
                        <span class="username">Peter Clark</span>
                        <i class="clip-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="pages_user_profile.html">
                                <i class="clip-user-2"></i>
                                &nbsp;My Profile
                            </a>
                        </li>
                        <li>
                            <a href="pages_calendar.html">
                                <i class="clip-calendar"></i>
                                &nbsp;My Calendar
                            </a>
                        <li>
                            <a href="pages_messages.html">
                                <i class="clip-bubble-4"></i>
                                &nbsp;My Messages (3)
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="utility_lock_screen.html"><i class="clip-locked"></i>
                                &nbsp;Lock Screen </a>
                        </li>
                        <li>
                            <a href="login_example1.html">
                                <i class="clip-exit"></i>
                                &nbsp;Log Out
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end: USER DROPDOWN -->
            </ul>
            <!-- end: TOP NAVIGATION MENU -->
        </div>
        <!-- start: HORIZONTAL MENU -->
        <div class="horizontal-menu navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.html">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.datastatis.index')}}">
                        Data Statis
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown">
                        <span class="selected"></span>
                        Data Dinamis <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{route('admin.berita.index')}}">
                                Index Berita
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown">
                        <span class="selected"></span>
                        Layouts <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="active">
                            <a href="javascript:void(0)">
                                Horizontal Menu
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                Sidebar Closed
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                Sidebar Fixed Page
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                Boxed Layout
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                Footer Fixed
                            </a>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="javascript:void(0)">
                                More options
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">
                                        Second level link
                                    </a>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="javascript:void(0)">
                                        More options
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0)">
                                                Third level link
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                Third level link
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                Third level link
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                Third level link
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                Third level link
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        Second level link
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        Second level link
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        Second level link
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="">
                        UI Lab
                    </a>
                </li>
                <li>
                    <a href="" class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown">
                        Pages <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="javascript:void(0)">
                                User Profile
                            </a>
                        </li>
                        <li>
                            <a href="pages_invoice.html">
                                <span class="title">Invoice</span>
                                <span class="badge badge-new">new</span>
                            </a>
                        </li>								
                        <li>
                            <a href="javascript:void(0)">
                                Gallery
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                Timeline
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                FAQs
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                Messages
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- end: HORIZONTAL MENU -->
    </div>
    <!-- end: TOP NAVIGATION CONTAINER -->
</div>