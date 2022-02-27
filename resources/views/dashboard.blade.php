@extends('layout.app')

@section('styles')
@endsection

@section('content')
    <!-- Content area -->
    <div class="content">
        @include('layout.alert')
        This is 
        @auth($guard)
            {{ Str::ucfirst($guard) }}
        @endauth
         Dashboard!
        {{-- <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Add Todo</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('todos.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Label:</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Deadline:</label>
                                <input type="datetime-local" name="deadline" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description:</label>
                        <textarea rows="5" cols="5" name="description" class="form-control"></textarea>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit form <i
                                class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div> --}}
    </div>
    <!-- /content area -->
@endsection

@section('scripts')
@endsection
