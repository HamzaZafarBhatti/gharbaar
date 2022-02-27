@extends('layout.app')

@section('styles')
@endsection

@section('content')
    <!-- Content area -->
    <div class="content">
        @include('layout.alert')
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">User List</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a type="button" class="btn btn-primary" href="{{ route('admin.users.create') }}">Add User <i
                                class="icon-add ml-2"></i></a>
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
                    @if (!$users->isEmpty())
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items center" style="gap: 0.5rem;">
                                        <a class="btn btn-info" href="{{ route('admin.users.edit', $item->id) }}">Edit
                                            <i class="icon-pencil ml-2"></i></a>
                                        <form action="{{ route('admin.users.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete <i
                                                    class="icon-trash ml-2"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">No User found!</td>
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
