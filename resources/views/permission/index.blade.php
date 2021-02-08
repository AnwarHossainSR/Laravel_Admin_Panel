@extends('layouts.admin')

@section('title')
Permissions
@endsection
@section('content')

<div class="pl-3 pr-3">
    @include('partials.alert')
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Permission Table</h3>

        <div class="card-tools">
            <a href="{{ url('/permission/create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create new permission</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created On</th>
                    <th>Updated On</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->created_at }}</td>
                        <td>{{ $permission->updated_at }}</td>
                        <td>
                            <a href={{"permission/edit/".$permission->id}} class="btn btn-sm btn-info">Edit</a>
                            <a href={{"permission/delete/".$permission->id}} class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>No Result Found</tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
