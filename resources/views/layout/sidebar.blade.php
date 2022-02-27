<!-- Main sidebar -->
<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        <span class="font-weight-semibold">Navigation</span>
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user-material">
            <div class="sidebar-user-material-body">
                <div class="card-body text-center">
                    <a href="#">
                        <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"
                            class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
                    </a>
                    <h6 class="mb-0 text-white text-shadow-dark">{{ auth()->guard(config('auth.defaults.guard'))->user()->name }}</h6>
                </div>

                <div class="sidebar-user-material-footer">
                    <a href="#user-nav"
                        class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle"
                        data-toggle="collapse"><span>My account</span></a>
                </div>
            </div>

            <div class="collapse" id="user-nav">
                <ul class="nav nav-sidebar">
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                   this.closest('form').submit();">
                                <i class="icon-switch2"></i>
                                <span>{{ __('Log Out') }}</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                @auth('admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link">
                            <i class="icon-list"></i>
                            <span>
                                Users
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.bloggers.index') }}" class="nav-link">
                            <i class="icon-list"></i>
                            <span>
                                Bloggers
                            </span>
                        </a>
                    </li>
                @endauth
                @auth('user')
                    <li class="nav-item">
                        <a href="{{ route('user.bloggers.index') }}" class="nav-link">
                            <i class="icon-list"></i>
                            <span>
                                Bloggers
                            </span>
                        </a>
                    </li>
                @endauth
                @auth('blogger')
                    <li class="nav-item">
                        <a href="{{ route('blogger.blogs.index') }}" class="nav-link">
                            <i class="icon-list"></i>
                            <span>
                                Blogs
                            </span>
                        </a>
                    </li>
                @endauth

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
<!-- /main sidebar -->
