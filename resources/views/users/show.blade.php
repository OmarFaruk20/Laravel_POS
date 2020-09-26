@extends('users.user_layout')
@section('user_content')

<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Info <strong>{{$user->name}}</strong> </h6>
        </div>
        <div class="card-body">
            <div class="row clearfix justify-content-md-center">
                <div class="col-md-8">
                    <table class="table table-striped">
                        <tr>
                            <th class="text-right">Name :</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">Group :</th>
                            <td>{{ $user->group->title }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">Phone :</th>
                            <td>{{ $user->phone }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">Email :</th>
                            <td>{{ $user->email }}</td>
                        </tr>

                        <tr>
                            <th class="text-right">Address :</th>
                            <td>{{ $user->address }}</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">The Big Boss Show</div>
    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">Comedy Show</div>
    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Funny videos</div>
    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Funny videos</div>
@endsection
