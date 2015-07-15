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
                <li><a href="{{url($hotspot)}}">Home</a></li>
                <li><a href="{{url($hotspot.'/adverts/'.$adv)}}">{{$adv}}</a></li>
                <li><a href="#">{{$deal->name}}</a></li>
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

                            @if($isAvailable == true)
                                <td><span class="text-success">Available</span></td>
                            @else
                                <td><span class="text-danger">Sold Out</span></td>
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
                    @if($isAvailable == true)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                {{ Form::open(array('url'=>$hotspot.'/payment/prepayment', 'class'=>'form', 'id'=>'payment', 'role'=>'form')) }}
                                <input type="hidden" name="cmd" value="_xclick">
                                <!--<input type="hidden" name="business" value="wivert_paypal@wivert.co.uk"> -->
                               {{-- <input type="hidden" name="at"
                                       value=" -djd-t8a-Lzw5MzWS8Mg2yUxuhwnPPgj6y9xSxfFHvxwcnpI3gEZ1rz96ei">--}}
                                <input type="hidden" name="business" value="robert-bussiness@wivert.co.uk">
                                <input type="hidden" name="item_name" value="{{str_replace('-', ' ',$deal->name)}}">
                                <input type="hidden" name="currency_code" value="GBP">
                                <input type="hidden" name="amount" value="{{$deal->price}}">
                                <input type="hidden" name="notify_url" value="{{url($hotspot.'/payment/status')}}">
                                <input type="hidden" name="return"
                                       value="{{url($hotspot.'/payment/status')}}">
                                <input type="hidden" name="cancel_return"
                                       value="{{url($hotspot.'/payment/status')}}">
                                <div class="form-group">
                                        <label for="InputEmail">Email address</label>
                                        {{ Form::text('custom', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
                                    </div>
                                {{ Form::submit('Buy', array('class'=>'btn btn-success btn-block'))}}
                                {{ Form::close() }}
                            </div>
                        </div>
                    @else
                            <p class="alert alert-danger txt-center">This item is not available anymore due to SOLD OUT.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /Content -->


@stop