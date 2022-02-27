@extends('layout.app')

@section('styles')
@endsection

@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Add Blogger</h5>
            </div>

            <div class="card-body">
                @auth('admin')
                <form action="{{ route('admin.bloggers.store') }}" method="POST">
                @endauth
                @auth('user')
                <form action="{{ route('user.bloggers.store') }}" method="POST">
                @endauth
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit form <i
                                class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /content area -->
@endsection

@section('scripts')
@endsection
