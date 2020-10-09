@extends('users.user_layout')
@section('user_content')
<div class="container-fluid">


    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sales of <strong>{{$user->name}}</strong> </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Chhalan No</th>
                        <th>Customer</th>
                        <th>Data</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $TotalItem = 0;
                        $grandTotal = 0;
                    @endphp

                    @foreach ($user->sales as $sale)
                    <tr>
                    <td>{{ $sale->challan_no }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $sale->date }}</td>
                    <td>
                        @php
                            $itemQty = $sale->items()->sum('quantity');
                            $TotalItem += $itemQty;
                            echo $itemQty;
                        @endphp
                    </td>
                    <td>
                        @php
                            $total = $sale->items()->sum('total');
                            $grandTotal += $total;
                            echo $total;
                        @endphp
                    </td>
                    <td class="text-center">
                        <form method="POST" action="{{ route('users.sales.destroy', ['id' => $user->id, 'invoice_id' => $sale->id]) }}">
                            <a class="btn btn-primary btn-sm" href="{{ route('users.sales.invoice_details', ['id' => $user->id, 'invoice_id' => $sale->id]) }}">
                                <i class="fa fa-eye"></i>
                            </a>
                            @if($itemQty == 0)
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                            @endif
                        </form>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Chhalan No</th>
                        <th>Customer</th>
                        <th>Data</th>
                        <th>{{ $TotalItem }}</th>
                        <th>{{ $grandTotal }}</th>
                        <th class="text-center">Action</th>
                    </tr>
                </tfoot>
                </table>
            </div>
            </div>
    </div>
    </div>
    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">The Big Boss Show</div>
    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">Comedy Show</div>
    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Funny videos</div>
    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Funny videos</div>

  </div>
@endsection
