@extends('adminlte::page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>{{ $user->profile->firstname.' '.$user->profile->lastname }}</h1>
                <div class="panel">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>Email: {{ $user->email }}</li>
                            <li>Phone: {{ $user->profile->phone }}</li>
                            <li>Country: {{ $user->profile->country }}</li>
                            <li>Region: {{ $user->profile->region }}</li>
                            <li>City: {{ $user->profile->city }}</li>
                            <li>Address: {{ $user->profile->address }}</li>
                            <li>Sex: {{ $user->profile->sex }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
