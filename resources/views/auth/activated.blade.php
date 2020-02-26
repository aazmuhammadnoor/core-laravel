@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Thank You For Your Activation</div>

                <div class="panel-body text-center">
                    <p class="text-center">
                       Your account active now !
                    </p>
                    <a href="{{ url('login') }}" class="btn btn-primary text-center">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
