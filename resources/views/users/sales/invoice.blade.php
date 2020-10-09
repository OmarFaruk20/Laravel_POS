@extends('users.user_layout')
@section('user_content')

<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Sales Invoice Details </h6>
        </div>
        <div class="card-body">
            <div class="row clearfix justify-content-md-center">
                <div class="col-md-6">
                    <div class="no_padding no_margin"> <strong>Customer: </strong>{{ $user->name }}</div>
                    <div class="no_padding no_margin"> <strong>Email: </strong>{{ $user->email }}</div>
                    <div class="no_padding no_margin"> <strong>Phone: </strong>{{ $user->phone }}</div>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <div class="no_padding no_margin"> <strong>Challan No: </strong>{{ $invoice->challan_no }}</div>
                    <div class="no_padding no_margin"> <strong>Date: </strong>{{ $invoice->date }}</div>
                </div>
            </div>
            <div class="invoice_items">
                <table class="table table-borderless">
                    <thead>
                        <th>Sl</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </thead>
                    <tbody>
                        @foreach ($invoice->items as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->product->title}}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->total }}</td>
                            <td>
                                <form method="POST" action="{{ route('users.sales.invoices.delete_item', ['id' => $user->id, 'invoice_id' => $invoice->id, 'item_id' =>$item->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </td>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th></th>
                        <th colspan="2"><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#newProduct"><i class="fa fa-plus"></i>Add Products</button></th>
                        <th class="text-right">Total :</th>
                        <th>{{ $invoice->items()->sum('total') }}</th>
                        <th></th>
                    </tfoot>
                </table>
            </div>
        </div>
        </div>
    </div>

<!-- Sales Modal -->
<div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => ['users.sales.invoices.add_item', ['id' => $user->id, 'invoice_id' => $invoice->id] ], 'method' => 'POST']) !!}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newProductModalLabel">Add New Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label for="product" class="col-sm-2 col-form-label text-right">Product<span class="text-danger">*</span> </label>
                <div class="col-sm-10">
                  {{ Form::select('product_id', $products, Null, ['class'=>'form-control', 'id'=>'product', 'required', 'placeholder'=>'select product']) }}
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPrice" class="col-sm-2 col-form-label">Unite Price<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                {{ Form::text('price', Null, ['class'=>'form-control', 'id'=>'inputPrice', 'required', 'placeholder'=>'Unite Price']) }}
                </div>
            </div>

            <div class="form-group row">
                <label for="inputQuantity" class="col-sm-2 col-form-label text-right">Quantity<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                {{ Form::text('quantity', Null, ['class'=>'form-control', 'id'=>'inputQuantity',  'required', 'placeholder'=>'Quantity']) }}
                </div>
            </div>

            <div class="form-group row">
                <label for="inputTotal" class="col-sm-2 col-form-label text-right">Total<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                {{ Form::text('total', Null, ['class'=>'form-control', 'id'=>'inputTotal', 'required', 'placeholder'=>'Total']) }}
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
@endsection
