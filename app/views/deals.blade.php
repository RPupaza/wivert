@extends('layouts.default')
@section('head-tag')
    <title>WiVert - Advertiser</title>
@stop
@section('body-tag')

    <!-- Content -->
    <div class="row content">
        @include('includes.sidebar')
        <div class="col-lg-9 content-right">
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Cell Phones & Accessories</a></li>
                <li><a href="#">Smartphones</a></li>
            </ol>
            <h2>{{str_replace('-', ' ',$deal->name)}}</h2>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 hidden-sm hidden-xs" id="slider-thumbs">
                            <ul class="list-inline">
                                <li><a id="carousel-selector-0" class="selected"><img src="/img/deals/{{$deal->image}}" class="img-responsive" /></a></li>
                                </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <table class="table table-condensed table-hover">
                        <thead>
                        <th colspan="2">Details:</th>
                        </thead>
                        <tbody style="font-size: 12px;">
                        <tr>
                            <td>Classified ID</td>
                            <td>{{$deal->id}}</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>&#163; {{$deal->price}}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            @if($deal->available == 1)
                            <td>Available</td>
                            @else
                                <td style="color:red">Not available</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Payments</td>
                            <td>PayPal, Credit Card</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                            <span style="padding-left: 5px;"><strong>Seller:</strong></span>
                            <div class="well">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4><a href="{{url($hotspot.'/adverts/'.$adv)}}">{{$deal->fullname}}</a></h4>
                                       <small>Location: <cite title="Prague, Czech Republic">{{$deal->address}} <span class="glyphicon glyphicon-map-marker"></span></cite></small><br />
                                        <span class="glyphicon glyphicon-envelope"></span> {{$deal->email}}<br />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4>Description</h4>
                    <p style="text-align: justify;">{{$deal->description}}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h4>Buy product</h4>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form action="#" method="POST">
                                <div class="form-group">
                                    <label for="InputEmail">Email address</label>
                                    <input type="email" class="form-control" id="InputEmail" placeholder="Enter your email">
                                </div>
                                <button class="btn btn-info" type="submit">Buy</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Content -->


@stop