@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ($usertype == 1 ? 'UserList' : 'Personal Details') }}</div>
                <div class="card-body">
                        <div id="divalert" class="alert d-none text-center" role="alert"></div>
                    <section class="wrap-cont container-fluid">
                        <input type="hidden" id="actionUrl" value="{{ route('sendEmail') }}"/>
                        <div class="table-responsive mt-2">
                            <table class="table table-striped table-bordered tab-count-1 user_table" id="Infinite_Table" width="100%">
                                <thead>
                                <tr>
                                    <th class="fixed_th_sorts_fn">First Name</th>
                                    <th class="fixed_th_sorts_fn">Last Name</th>
                                    <th class="fixed_th_sorts_fn">Email</th>
                                    <th class="fixed_th_sorts_fn">Work Flow Engine</th>
                                    @if($usertype == 1)
                                    <th class="fixed_th_sorts_fn">Action</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody id="sactivity_body">
                                    @if(!empty($userlist))
                                        @foreach($userlist as $user)
                                        <tr>
                                        <td class="fixed_th_sorts_fn">{{$user->name}}</td>
                                        <td class="fixed_th_sorts_fn">{{$user->lastname}}</td>
                                        <td class="fixed_th_sorts_fn">{{$user->email}}</td>
                                        <td class="fixed_th_sorts_fn">{{$user->wname}}</td>
                                        @if($usertype == 1)
                                        <td class="fixed_th_sorts_fn"><button class="action_btn" data-curid="{{$user->id}}" data-email="{{$user->email}}"  data-atype="3">Approve</button><button class="action_btn"  data-curid="{{$user->id}}" data-email="{{$user->email}}" data-atype="4">Reject</button></td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script src="{{asset('js/home.js')}}" crossorigin="anonymous"></script>
@endpush