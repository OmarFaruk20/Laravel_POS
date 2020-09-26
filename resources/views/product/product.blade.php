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
            <h1 class="h3 mb-4 text-gray-800">Products list</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{route('products.create')}}" class="btn btn-info"><i class="fa fa-plus"></i>New Product</a>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">All Products</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Category_Id</th>
                    <th>Title</th>
                    <th>Cost Price</th>
                    <th>Sell Price</th>
                    <th class="text-center">Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Category_Id</th>
                    <th>Title</th>
                    <th>Cost Price</th>
                    <th>Sell Price</th>
                    <th class="text-center">Action</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($products as $product)
                <tr>
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->category->title }}</td>
                  <td>{{ $product->title }}</td>
                  <td>{{ $product->cost_price}}</td>
                  <td>{{ $product->price}}</td>
                  <td class="text-center">
                    <form method="POST" action=" {{ route('products.destroy', ['product' => $product->id]) }} ">
                        <a class="btn btn-primary btn-sm" href="{{ route('products.show', ['product' => $product->id]) }}">
                            <i class="fa fa-eye"></i>
                       </a>
                        <a class="btn btn-primary btn-sm" href="{{ route('products.edit', ['product' => $product->id]) }}">
                             <i class="fa fa-edit"></i>
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
