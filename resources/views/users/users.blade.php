@extends('layout.master')
@section('main_content')
<div class="container-fluid">

    <!-- Page Heading -->
    @if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
      </div>
    @endif

    <div class="row clearfix page_header">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800">Users list</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{url('users/create')}}" class="btn btn-info"><i class="fa fa-plus"></i>New User</a>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Group</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th class="text-center">Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Group</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th class="text-center">Action</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($users as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  <td>{{ optional($item->group)->title }}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->phone}}</td>
                  <td>{{$item->address}}</td>
                  <td class="text-center">
                    <form method="POST" action=" {{ route('users.destroy', ['user' => $item->id]) }} ">
                        <a class="btn btn-primary btn-sm" href="{{ route('users.edit', ['user' => $item->id]) }}">
                             <i class="fa fa-edit"></i>
                        </a>
                        <a class="btn btn-primary btn-sm" href="{{ route('users.show', ['user' => $item->id]) }}">
                            <i class="fa fa-eye"></i>
                       </a>
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                      {{-- <a href="{{url('users').'/'.$item->id}}" class="btn btn-outline-info"><i class="fa fa-edit"></i>Edit</a>
                      <a onclick="return confirm('Are you sure?')" href="{{url('user/delete').'/'.$item->id}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i>Delete</a> --}}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
@endsection
