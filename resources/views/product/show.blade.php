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
        <div class="col-md-4">
            <a href="{{route('products.index')}}" class="btn btn-info"><i class="fa fa-arrow-left"></i>Back</a>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Product</h6>
        </div>
        <div class="card-body">
            <div class="row clearfix justify-content-md-center">
                <div class="col-md-8">
                    <table class="table table-striped">
                        @foreach ($product as $item)


                        <tr>
                            <th class="text-right">Category :</th>
                            <td>{{ $item->category->title }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">title :</th>
                            <td>{{ $item->title }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">Description :</th>
                            <td>{{ $item->description }}</td>
                        </tr>

                        <tr>
                            <th class="text-right">Cost Price :</th>
                            <td>{{ $item->cost_price }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">Price :</th>
                            <td>{{ $item->price }}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
      </div>
  </div>
@endsection
