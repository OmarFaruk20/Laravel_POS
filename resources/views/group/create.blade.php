@extends('layout.master')
@section('main_content')
<div class="container-fluid">

    <!-- Page Heading -->
    @if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
      </div>
    @endif
    <h1 class="h3 mb-4 text-gray-800">Create New Groups</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">New Groups</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{url('group/store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="group-title">User Group Title</label>
                          <input type="text" name="title" class="form-control" id="group-title" placeholder="User Group Title">
                        </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
      </div>

  </div>
@endsection
