@extends('users.user_layout')
@section('user_content')
<div class="container-fluid">

    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Receipts of <strong>{{$user->name}}</strong> </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Admin</th>
                        <th class="text-right">Total</th>
                        <th>Date</th>
                        <th>Note</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th colspan="2" class="text-right">Total :</th>
                        <th colspan="" class="text-right">{{ $user->receipts->sum('amount') }}</th>
                        <th>Date</th>
                        <th>Note</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($user->receipts as $receipt)
                    <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ optional($receipt->admin)->name  }}</td>
                    <td class="text-right">{{ $receipt->amount }}</td>
                    <td>{{ $receipt->date }}</td>
                    <td>{{ $receipt->note }}</td>
                    <td class="text-center">
                        <form method="POST" action=" {{ route('users.receipts.destroy', ['id' => $user->id, $receipt->id]) }} ">
                            {{-- <a class="btn btn-primary btn-sm" href="{{ route('users.show', ['id' => $user->id, $receipt->id]) }}">
                                <i class="fa fa-eye"></i>
                            </a> --}}
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
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
