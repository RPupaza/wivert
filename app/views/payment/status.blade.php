@extends('layouts.default')
@section('head-tag')
    <title>WiVert - Advertiser</title>
@stop
@section('body-tag')
    <div class="row content status-page">

        <div class="col-lg-12 content-right">
            <ol class="breadcrumb">
                <li><a href="{{url($hotspot)}}">Home</a></li>
            </ol>
            <h2>Your Order Has Been Processed!</h2>
            <p>Your payment of <span>{{$details['price']}}</span> GBP is complete !</p>
            <h3>Payment Information:</h3>
            <p>Transaction Code: <span>{{$details['txn']}}</span></p>
            <p>Name: <span>{{$details['name']}}</span></p>
            <p>Price: <span>{{$details['price']}} GBP</span></p>
            <p>Expiration date: <span>{{$details['exp_date']}}</span></p>
            <h3>An Email with the offer will be sent shortly to <span>{{$details['email']}}</span></h3>
            <hr>

        </div>
    </div>
@stop