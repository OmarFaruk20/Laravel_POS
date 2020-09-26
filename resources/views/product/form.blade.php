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

        {{-- @if ($mode == 'edit')
            <h2>Update <strong>{{$user->name}}</strong> Information </h2>
            @else
            <h2>Create New User</h2>
        @endif --}}
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
          <h6 class="m-0 font-weight-bold text-primary">{{ $mode ?? '' }}</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    @if ($mode == 'edit')
                            {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put']) !!}
                        @else
                            {!! Form::open(['route' => 'products.store', 'method' => 'POST']) !!}
                    @endif

                        <div class="form-group row">
                            <label for="inputTitle" class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                              {{ Form::text('title', Null, ['class'=>'form-control', 'id'=>'inputTitle', 'placeholder'=>'Title']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputDescription" class="col-sm-2 col-form-label">Description<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                              {{ Form::textarea('description', Null, ['class'=>'form-control', 'id'=>'inputDescription', 'placeholder'=>'Description']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="group" class="col-sm-2 col-form-label">Category<span class="text-danger">*</span> </label>
                            <div class="col-sm-10">
                              {{ Form::select('category_id', $category, Null, ['class'=>'form-control', 'id'=>'group', 'placeholder'=>'Select Category']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputCostPrice" class="col-sm-2 col-form-label">Cost Price</label>
                            <div class="col-sm-10">
                              {{ Form::text('cost_price', Null, ['class'=>'form-control', 'id'=>'inputCostPrice', 'placeholder'=>'Cost Price']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputSellPrice" class="col-sm-2 col-form-label">Sell Price</label>
                            <div class="col-sm-10">
                              {{ Form::text('price', Null, ['class'=>'form-control', 'id'=>'inputSellPrice', 'placeholder'=>'Sell Price']) }}
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
