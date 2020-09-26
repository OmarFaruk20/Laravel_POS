@extends('users.user_layout')
@section('user_content')
<div class="container-fluid">

    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Payments of <strong>{{$user->name}}</strong> </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Admin</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Note</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th colspan="2" class="text-right">Total :</th>
                        <th class="text-right">{{ $user->payments->sum('amount') }}</th>
                        <th>Date</th>
                        <th>Note</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($user->payments as $payment)
                    <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ ($payment->admin_id) ? $payment->admin->name : "" }}</td>
                    <td class="text-right">{{ $payment->amount }}</td>
                    <td>{{ $payment->date }}</td>
                    <td>{{ $payment->note }}</td>
                    <td class="text-center">
                        <form method="POST" action=" {{ route('users.payments.destroy', ['id' => $user->id, 'payment_id' => $payment->id]) }} ">
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
