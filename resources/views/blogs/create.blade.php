@extends('layout.app')

@section('styles')
@endsection

@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Add Blog</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('blogger.blogs.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status:</label>
                                <select name="is_active" id="is_active" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">In active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Content:</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
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
