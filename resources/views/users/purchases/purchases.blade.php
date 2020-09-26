@extends('users.user_layout')
@section('user_content')
<div class="container-fluid">

 <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Purchases of <strong>{{$user->name}}</strong> </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Chhalan No</th>
                        <th>Customer</th>
                        <th>Data</th>
                        <th>Total</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>Chhalan No</th>
                    <th>Customer</th>
                    <th>Data</th>
                    <th>Total</th>
                    <th class="text-center">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($user->purchases as $purchase)
                    <tr>
                    <td>{{ $purchase->challan_no }}</td>
                    <td>{{ $purchase->name }}</td>
                    <td>{{ $purchase->date }}</td>
                    <td>100</td>
                    <td class="text-center">
                        <form method="POST" action=" {{ route('users.destroy', ['user' => $sale->id]) }} ">
                            <a class="btn btn-primary btn-sm" href="{{ route('users.show', ['user' => $sale->id]) }}">
                                <i class="fa fa-eye"></i>
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
    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">The Big Boss Show</div>
    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">Comedy Show</div>
    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Funny videos</div>
    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Funny videos</div>

  </div>
@endsection
