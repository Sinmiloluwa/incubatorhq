@extends('layouts.default')
@section('content')
    <div class="container-fluid">
         <!-- Page Heading -->
         <h1 class="h3 mb-2 text-gray-800">All Drafts</h1>
 
         <!-- DataTales Example -->
         <div class="card shadow mb-4">
             <div class="d-sm-flex card-header py-3 justify-content-between align-items-center">
                 <h6 class="m-0 font-weight-bold text-primary">Drafts</h6>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                             <tr>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Created At</th>
                             </tr>
                         </thead>
                         <tfoot>
                             <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                             </tr>
                         </tfoot>
                         <tbody>
                             @foreach ($users as $user)
                                 <tr>
                                     <td>{{ $user->name }}</td>
                                     <td>{{ $user->email }}</td>
                                     <td>{{ $user->created_at }}</td>
                                     <td>
                                         <a class="btn btn-danger btn-sm active px-2" role="button" data-target="#revokeModal-{{$user->id}}" data-toggle="modal">Revoke User</a>
                                     </td>
                                 </tr>
                                 <div class="modal fade" id="revokeModal-{{$user->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                     <div class="modal-dialog" role="document">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h5 class="modal-title" id="exampleModalLabel">Revoke User</h5>
                                                 <button class="close" type="button" data-dismiss="modal"
                                                     aria-label="Close">
                                                     <span aria-hidden="true">×</span>
                                                 </button>
                                             </div>
                                             <div class="modal-body">Are you sure you want to revoke this user?</div>
                                             <div class="modal-footer">
                                                     <button class="btn btn-secondary" type="button"
                                                         data-dismiss="modal">Cancel</button>
                                                         <form method="POST" action="{{ route('user.revoke', $user->id) }}">
                                                             {{ csrf_field() }}
                                                     <button type="submit" class="btn btn-danger" href="">Confirm</a>
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
@endsection