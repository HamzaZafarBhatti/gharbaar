@extends('layout.app')
@section('styles')
@endsection

@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Add User</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" name="password" class="form-control" >
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <a href="{{ route('admin.users.index') }}" type="button" class="btn btn-secondary">Back <i
                                class="icon-arrow-left8 ml-2"></i></a>
                        <button type="submit" class="btn btn-primary">Update <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /content area -->
@endsection

@section('scripts')
@endsection
