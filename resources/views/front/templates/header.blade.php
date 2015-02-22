<header>
    <div role="navigation" class="navbar navbar-default navbar-fixed-top space-top">
        <!-- start: TOP NAVIGATION CONTAINER -->
        <div class="container">
            <div class="navbar-header">
                <!-- start: RESPONSIVE MENU TOGGLER -->
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- end: RESPONSIVE MENU TOGGLER -->
                <!-- start: LOGO -->
                <a class="navbar-brand" href="{{url()}}">
                    SMAN 1
                </a>
                <!-- end: LOGO -->
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if(count($menu) > 0)
                    @foreach($menu as $men)
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" data-hover="dropdown">
                            {{$men->title}} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($men->child as $child)
                            <li>
                                <a href="{{route('page.menu',$child->id)}}">
                                    {{$child->title}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>

                    @endforeach
                    @endif
<!--                    <li class="menu-search">
                         start: SEARCH BUTTON 
                        <a href="#" data-placement="bottom" data-toggle="popover">
                            <i class="clip-search-3"></i>
                        </a>
                         end: SEARCH BUTTON 
                         start: SEARCH POPOVER 
                        <div class="popover bottom search-box">
                            <div class="arrow"></div>
                            <div class="popover-content">
                                 start: SEARCH FORM 
                                <form class="" id="searchform" action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="input-group-btn">
                                            <button class="btn btn-main-color btn-squared" type="button">
                                                <i class="clip-search-3"></i>
                                            </button> </span>
                                    </div>
                                </form>
                                 end: SEARCH FORM 
                            </div>
                        </div>
                         end: SEARCH POPOVER 
                    </li>-->
                </ul>
            </div>
        </div>
        <!-- end: TOP NAVIGATION CONTAINER -->
    </div>
</header>