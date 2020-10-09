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
            <a href="{{route('users.index')}}" class="btn btn-info"><i class="fa fa-arrow-left"></i>Back</a>
        </div>
        <div class="col-md-8 text-right">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newSales">
                <i class="fa fa-plus"></i> New Sales
            </button>

            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPurchases">
                <i class="fa fa-plus"></i> New Purchases
            </button>

            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment">
                <i class="fa fa-plus"></i> New Payment
            </button>

            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newReceipt">
                <i class="fa fa-plus"></i> New Receipt
            </button>
        </div>
    </div>

    <div class="row clearfix mt-5">
        <div class="col-md-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link @if($tab_manu  == 'user_info') active @endif" href="{{ route('users.show', $user->id) }}">User Info</a>
                <a class="nav-link @if($tab_manu  == 'sales') active @endif" href="{{ route('users.sales', $user->id) }}">Sales</a>
                <a class="nav-link @if($tab_manu  == 'purchases') active @endif" href="{{ route('users.purchases', $user->id) }}">Purchase</a>
                <a class="nav-link @if($tab_manu  == 'payments') active @endif" href="{{ route('users.payments', $user->id) }}">Payment</a>
                <a class="nav-link @if($tab_manu  == 'receipts') active @endif" href="{{ route('users.receipts', $user->id) }}">Receipt</a>
            </div>
        </div>


        <div class="col-md-10">
            @yield('user_content')
        </div>
    </div>

<!-- Sales Modal -->
 <div class="modal fade" id="newSales" tabindex="-1" role="dialog" aria-labelledby="newSalesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => ['users.sales.store', $user->id], 'method' => 'POST']) !!}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newSalesModalLabel">New Sale Invoice</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label for="inputDate" class="col-sm-2 col-form-label">Date<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                {{ Form::date('date', Null, ['class'=>'form-control', 'id'=>'inputDate', 'placeholder'=>'Date', 'required']) }}
                </div>
            </div>

            <div class="form-group row">
                <label for="inputChallan_no" class="col-sm-2 col-form-label">Challan No</label>
                <div class="col-sm-10">
                {{ Form::text('challan_no', Null, ['class'=>'form-control', 'id'=>'inputChallan_no', 'placeholder'=>'Challan No']) }}
                </div>
            </div>

            <div class="form-group row">
                <label for="inputNote" class="col-sm-2 col-form-label">Note</label>
                <div class="col-sm-10">
                {{ Form::textarea('note', Null, ['class'=>'form-control', 'id'=>'inputNote', 'rows'=>'3', 'placeholder'=>'Notes']) }}
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

<!-- Purchase Modal -->
 <div class="modal fade" id="newPurchases" tabindex="-1" role="dialog" aria-labelledby="newPurchasesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => ['users.payments.store', $user->id], 'method' => 'POST']) !!}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newPurchasesModalLabel">Add New Purchases</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label for="inputDate" class="col-sm-2 col-form-label">Date<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                {{ Form::date('date', Null, ['class'=>'form-control', 'id'=>'inputDate', 'placeholder'=>'Date', 'required']) }}
                </div>
            </div>

            <div class="form-group row">
                <label for="inputAmount" class="col-sm-2 col-form-label">Amount<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                {{ Form::text('amount', Null, ['class'=>'form-control', 'id'=>'inputAmount', 'placeholder'=>'Amount', 'required']) }}
                </div>
            </div>

            <div class="form-group row">
                <label for="inputNote" class="col-sm-2 col-form-label">Note</label>
                <div class="col-sm-10">
                {{ Form::textarea('note', Null, ['class'=>'form-control', 'id'=>'inputNote', 'rows'=>'3', 'placeholder'=>'Notes']) }}
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

<!-- Payments Modal -->
  <div class="modal fade" id="newPayment" tabindex="-1" role="dialog" aria-labelledby="newPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => ['users.payments.store', $user->id], 'method' => 'POST']) !!}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newPaymentModalLabel">Add New Payment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label for="inputDate" class="col-sm-2 col-form-label">Date<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                {{ Form::date('date', Null, ['class'=>'form-control', 'id'=>'inputDate', 'placeholder'=>'Date', 'required']) }}
                </div>
            </div>

            <div class="form-group row">
                <label for="inputAmount" class="col-sm-2 col-form-label">Amount<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                {{ Form::text('amount', Null, ['class'=>'form-control', 'id'=>'inputAmount', 'placeholder'=>'Amount', 'required']) }}
                </div>
            </div>

            <div class="form-group row">
                <label for="inputNote" class="col-sm-2 col-form-label">Note</label>
                <div class="col-sm-10">
                {{ Form::textarea('note', Null, ['class'=>'form-control', 'id'=>'inputNote', 'rows'=>'3', 'placeholder'=>'Notes']) }}
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

<!-- Receipts Modal -->
  <div class="modal fade" id="newReceipt" tabindex="-1" role="dialog" aria-labelledby="newReceiptModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {!! Form::open(['route' => ['users.receipts.store', $user->id], 'method' => 'POST']) !!}
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="newReceiptModalLabel">Add New Receipts</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label for="inputDate" class="col-sm-2 col-form-label">Date<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                {{ Form::date('date', Null, ['class'=>'form-control', 'id'=>'inputDate', 'placeholder'=>'Date', 'required']) }}
                </div>
            </div>

            <div class="form-group row">
                <label for="inputAmount" class="col-sm-2 col-form-label">Amount<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                {{ Form::text('amount', Null, ['class'=>'form-control', 'id'=>'inputAmount', 'placeholder'=>'Amount', 'required']) }}
                </div>
            </div>

            <div class="form-group row">
                <label for="inputNote" class="col-sm-2 col-form-label">Note</label>
                <div class="col-sm-10">
                {{ Form::textarea('note', Null, ['class'=>'form-control', 'id'=>'inputNote', 'rows'=>'3', 'placeholder'=>'Notes']) }}
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

  </div>
@endsection
