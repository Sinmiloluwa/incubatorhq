@extends('layouts.default')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All roles</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="d-sm-flex card-header py-3 justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">roles</h6>
                {{-- <a href="{{ route('roles.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Create
                    New role</a> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Created At</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->created_at }}</td>
                                    <td><a href="" class="btn btn-info btn-sm active" data-target="#detachUser" data-toggle="modal"
                                            role="button">Detach User</a>
                                        <a class="btn btn-danger btn-sm active px-2" role="button" data-toggle="modal"
                                            data-target="#attachModal-{{$role->id}}">Attach User</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="detachUser" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Users</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <select>
                                                    @foreach($roles as $key => $role)
                                                        @foreach($role->users as $user)
                                                            <option>{{$user->name}}</option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Cancel</button>
                                                        <form method="role" action="{{ route('user.detach', $role->id) }}">
                                                            {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger" href="">Delete</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
