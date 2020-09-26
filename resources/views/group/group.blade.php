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
            <h1 class="h3 mb-4 text-gray-800">Groups List</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{url('group/create')}}" class="btn btn-info"><i class="fa fa-plus"></i>New Groups</a>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">All Groups</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th class="text-center">Action</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($Group as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->title}}</td>
                  <td class="text-center">
                      <a href="{{url('group/edit').'/'.$item->id}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                      <a onclick="return confirm('Are you sure?')" href="{{url('group/delete').'/'.$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
