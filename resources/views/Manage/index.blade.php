@extends('layouts.manage')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('user_id'))
                        <div class="alert alert-success">
                            {{ session('user_id') }}
                        </div>
                    @endif
                    You are logged in this page,you are manage!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection