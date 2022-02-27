<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
    <div class="navbar-brand">
        <a href="{{ route('admin.dashboard') }}" class="d-inline-block">
            {{-- <img src="{{ asset('global_assets/images/logo_light.png') }}" alt=""> --}}
            <h4 style="margin: 0;text-decoration: none;font-weight: 500;color: #fff;">Gharbaar</h4>
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->
