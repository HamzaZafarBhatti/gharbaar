<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gharbaar</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    {{-- @yield('styles') --}}

    <!-- Core JS files -->
    <script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/ui/ripple.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->

    <script src="{{ asset('assets/js/app.js') }}"></script>
    <!-- /theme JS files -->


</head>

<body>
    @include('layout.header')

    <!-- Page content -->
    <div class="page-content">
        <!-- Main sidebar -->
        {{-- <div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

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
                            <h6 class="mb-0 text-white text-shadow-dark"></h6>
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

        </div> --}}
        <!-- /main sidebar -->

        <!-- Main content -->
        <div class="content-wrapper">

            <div class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h5 class="card-title">Login Api Testing</h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" id="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-info" id="adminLogin">Admin
                                            Login</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-info" id="userLogin">User Login</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-info" id="bloggerLogin">Blogger
                                            Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header header-elements-inline">
                                <h5 class="card-title">User CRUD</h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="user_name" id="user_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="user_email" id="user_email"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="user_password" id="user_password"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Token</label>
                                            <textarea name="accessToken" id="accessToken" cols="30" rows="5"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-info" id="createUser">Create
                                            User</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-info" id="getAllUsers">Get All
                                            Users</button>
                                    </div>
                                </div>
                            </div>

                            <table class="table datatable-basic-users">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @include('layout.footer')
        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
    <script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.extend($.fn.dataTable.defaults, {
                autoWidth: true,
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> _INPUT_',
                    searchPlaceholder: 'Type to filter...',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: {
                        'first': 'First',
                        'last': 'Last',
                        'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
                        'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
                    }
                }
            });

            function logIn(role, route) {
                $.ajax({
                    url: route,
                    method: "POST",
                    data: {
                        email: email.value,
                        password: password.value
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status === false) {
                            alert(response.msg);
                        } else {
                            localStorage.setItem('userData', JSON.stringify(response));
                            alert('You are logged in as ' + role + '! Your Token is: ' + response
                                .access_token);
                            accessToken.value = response.access_token
                        }
                    }
                })
            }
            $('#adminLogin').click(function() {
                logIn('Admin', "{{ route('api.admin.login') }}")
            })
            $('#userLogin').click(function() {
                logIn('User', "{{ route('api.user.login') }}")
            })
            $('#bloggerLogin').click(function() {
                logIn('Blogger', "{{ route('api.blogger.login') }}")
            })
            $('#getAllUsers').click(function() {
                getAllUsers('admin', "{{ route('api.get.allUsers') }}")
            })
            $('#createUser').click(function() {
                createUser('admin', "{{ route('api.create.user') }}")
            })

            function createUser(guard, route) {
                $.ajax({
                    url: route,
                    method: "post",
                    headers: {
                        accept: 'application/json',
                        authorization: 'Bearer ' + accessToken.value,
                    },
                    data: {
                        name: user_name.value,
                        email: user_email.value,
                        password: user_password.value,
                    },
                    dataType: "json",
                    success: function(response) {
                        if(response.status) {
                            alert('User added!');
                            getAllUsers('admin', "{{ route('api.get.allUsers') }}")
                        } else {
                            alert('Error!');
                        }
                    }
                })
            }

            function getAllUsers(guard, route) {
                $.ajax({
                    url: route,
                    method: "GET",
                    headers: {
                        accept: 'application/json',
                        authorization: 'Bearer ' + accessToken.value,
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        $('.datatable-basic-users').DataTable({
                            "data": response,
                            "paging": true,
                            "lengthChange": false,
                            "ordering": true,
                            "info": false,
                            "searching": false,
                            "autoWidth": false,
                            "responsive": true,
                            "destroy": true
                        });
                    }
                })
            }
        })
    </script>
</body>

</html>
