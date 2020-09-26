@extends('layout.master')
@section('main_content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create New Groups</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">New Groups</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{url('group/update')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="group-title">User Group Title</label>
                          <input type="text" name="title" class="form-control" id="group-title" value="{{$edit->title}}">
                        </div>
                        <input type="hidden" name="id" value="{{$edit->id}}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
      </div>

  </div>
@endsection
