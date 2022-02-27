@extends('layout.app')

@section('styles')
@endsection

@section('content')
    <!-- Content area -->
    <div class="content">
        @include('layout.alert')
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Blogger List</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        @auth('admin')
                            <a type="button" class="btn btn-primary" href="{{ route('admin.bloggers.create') }}">Add Blogger <i
                                    class="icon-add ml-2"></i></a>
                        @endauth
                        @auth('user')
                            <a type="button" class="btn btn-primary" href="{{ route('user.bloggers.create') }}">Add Blogger <i
                                    class="icon-add ml-2"></i></a>
                        @endauth
                    </div>
                </div>
            </div>

            <div class="card-body">
            </div>

            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$bloggers->isEmpty())
                        @foreach ($bloggers as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items center" style="gap: 0.5rem;">
                                        @auth('admin')
                                            <a class="btn btn-info"
                                                href="{{ route('admin.bloggers.edit', $item->id) }}">Edit <i
                                                    class="icon-pencil ml-2"></i></a>
                                            <form action="{{ route('admin.bloggers.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete <i
                                                        class="icon-trash ml-2"></i></button>
                                            </form>
                                        @endauth
                                        @auth('user')
                                            <a class="btn btn-info" href="{{ route('user.bloggers.edit', $item->id) }}">Edit
                                                <i class="icon-pencil ml-2"></i></a>
                                            <form action="{{ route('user.bloggers.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete <i
                                                        class="icon-trash ml-2"></i></button>
                                            </form>
                                        @endauth
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No Blogger found!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- /content area -->
@endsection

@section('scripts')
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
            $('.datatable-basic').DataTable();
        })
    </script>
@endsection
