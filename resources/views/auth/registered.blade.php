@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Thank You For Your Registration</div>

                <div class="panel-body">
                    <p class="text-center">
                        Thanks you {{ $user->first_name }}, please check your email for activating your account.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
