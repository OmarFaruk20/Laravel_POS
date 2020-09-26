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
          <h6 class="m-0 font-weight-bold text-primary">{{ $headline ?? '' }}</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    @if ($mode == 'edit')
                            {!! Form::model($Category, ['route' => ['categories.update', $Category->id], 'method' => 'put']) !!}
                        @else
                            {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                    @endif

                        <div class="form-group row">
                            <label for="inputTitle" class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                              {{ Form::text('title', Null, ['class'=>'form-control', 'id'=>'inputTitle', 'placeholder'=>'Title']) }}
                            </div>
                        </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    {!! Form::close() !!}
                    {{-- </form> --}}
                </div>
            </div>
        </div>
      </div>

  </div>
@endsection
