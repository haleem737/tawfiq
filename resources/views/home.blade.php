@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <h1>Welcome Mr. {{$client->name}} </h1>
                    <h2>{{$client->co_name}}</h2>


                    <div class='container'>
                        
                        <div class='row'>
                            <div class='panel panel-default'>
                                <div class='panel-body text-center'>
                                
                                    <img id='co_logo' src='https://www.femsa.org/wp-content/plugins/bp-custom-users/includes/img/logo.png'>
                                    <h2>{{$client->co_name}}</h2>
                                    <h4><b>{{$client->name}}</b></h4>
                                    <h4><b>{{$client->email}}</b></h4>

                                <a style='margin:10px 0' href='/orders/create'><button class='btn btn-success'>New Job Order</button></a> 
                                <a style='margin:10px 0' href='/client/new_quotation'><button class='btn btn-success'>New Quotation</button></a> 

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
