@extends('layout.app')
@section('styles')
@endsection

@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Update Blog</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('blogger.blogs.update', $blog->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status:</label>
                                <select name="is_active" id="is_active" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="1" {{ $blog->is_active ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$blog->is_active ? 'selected' : '' }}>In active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Content:</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $blog->content }}</textarea>
                    </div>


                    <div class="text-right">
                        <a href="{{ route('blogger.blogs.index') }}" type="button" class="btn btn-secondary">Back <i
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
