@extends('layout.master')
@section('main_content')
<div class="container-fluid">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        @if ($mode == 'edit')
            <h2>Update <strong>{{$user->name}}</strong> Information </h2>
            @else
            <h2>Create New User</h2>
        @endif
    <!-- Page Heading -->
    @if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
      </div>
    @endif

    <h2>{{ $headline ?? '' }}</h2>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Add New</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    @if ($mode == 'edit')
                            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
                        @else
                            {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
                    @endif


                        <div class="form-group row">
                            <label for="group" class="col-sm-2 col-form-label">User Group<span class="text-danger">*</span> </label>
                            <div class="col-sm-10">
                              {{ Form::select('group_id', $groups, Null, ['class'=>'form-control', 'id'=>'group', 'placeholder'=>'group']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                              {{ Form::text('name', Null, ['class'=>'form-control', 'id'=>'inputName', 'placeholder'=>'Name']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPhone" class="col-sm-2 col-form-label">Phone<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                              {{ Form::text('phone', Null, ['class'=>'form-control', 'id'=>'inputPhone', 'placeholder'=>'Phone']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              {{ Form::text('email', Null, ['class'=>'form-control', 'id'=>'inputEmail', 'placeholder'=>'Email']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                              {{ Form::text('address', Null, ['class'=>'form-control', 'id'=>'inputAddress', 'placeholder'=>'Address']) }}
                            </div>
                        </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                    {!! Form::close() !!}
                    {{-- </form> --}}
                </div>
            </div>
        </div>
      </div>

  </div>
@endsection
