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
                        <div class="col-md-12 " id="slider-thumbs">
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
                            <td>Raiting</td>
                            <td>@for($i = 1; $i <= $rate; $i++)
                                    <script>
                                        $(document).ready(function(){
                                            var i = '{{$i}}';
                                            var id = '{{$rate}}';
                                            $('.total-rates-'+ id).find('#'+i+'.rated').addClass('rate-btn-hover');
                                        });
                                    </script>
                                @endfor


                                <div class="rates total-rates-{{$rate}} total-rate rate-ex3-cnt">
                                    <div id="1" class="rated "></div>
                                    <div id="2" class="rated "></div>
                                    <div id="3" class="rated  "></div>
                                    <div id="4" class="rated  "></div>
                                    <div id="5" class="rated  "></div>
                                </div>
                            </td>
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
                                        {{ Form::text('custom', null, array('class'=>'form-control', 'required' => 'required', 'placeholder'=>'Email Address')) }}
                                    </div>
                                {{ Form::submit('Buy', array('class'=>'btn btn-success btn-block'))}}
                                {{ Form::close() }}
                            </div>
                        </div>
                    @else
                            <p class="alert alert-danger txt-center">This item is not available anymore due to SOLD OUT.</p>
                    @endif
                </div>

                <div class="col-md-12">
                    <h4><span id="show_comment" class="active_comment">Comments</span> / <span id="add_comment" class="">Add</span></h4>
                    <div class="well">
                        <div class="input-group insert-rating-wrap">
                            <p class="alert alert-danger txt-center error">Fill all the fields !</p>
                            <p id="success" class="alert alert-success txt-center error">Thank you for your comment !</p>
                            {{ Form::open(array('url'=>$hotspot.'/', 'class'=>'form', 'id'=>'payment', 'role'=>'form')) }}

                            <input type="hidden" id="hotspot" value="{{$hotspot}}">
                            <input type="hidden" id="deal" value="{{$deal->id}}">
                            <div class="form-group">
                                {{ Form::text('commentUser', null, array('class'=>'form-control chat-input', 'id' => 'commentUser', 'placeholder'=>'Your Name')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::text('commentText', null, array('class'=>'form-control chat-input', 'id' => 'commentText', 'placeholder'=>'Write your message here...')) }}
                            </div>
                            <div class="form-group">
                                <div class="rate-ex1-cnt">
                                    <div id="1" class="rate-btn-1 rate-btn rate-btn-hover"></div>
                                    <div id="2" class="rate-btn-2 rate-btn"></div>
                                    <div id="3" class="rate-btn-3 rate-btn"></div>
                                    <div id="4" class="rate-btn-4 rate-btn"></div>
                                    <div id="5" class="rate-btn-5 rate-btn"></div>
                                </div>
                            </div>
                            <span class="input-group-btn">
                                <a href="#" class="btn btn-primary btn-sm rate-submit"><span class="glyphicon glyphicon-comment"></span> Add Comment</a>
                            </span>
                            {{ Form::close() }}
                        </div>

                        <ul data-brackets-id="12674" id="sortable" class="list-unstyled ui-sortable comments-wrap">

                            @if($hasComments == 0)
                                <li><p class="alert alert-success txt-center comments-mobile-title">Be the first to rate & comment on this product !</p></li>
                            @endif
                            @foreach($comments as $comment)
                                <strong class="pull-left primary-font">{{$comment['name']}}</strong>
                                @for($i = 1; $i <= $comment['rate']; $i++)
                                    <script>
                                        $(document).ready(function(){
                                            var i = '{{$i}}';
                                            var id = '{{$comment['id']}}';
                                            $('.rates-'+ id).find('#'+i+'.rated').addClass('rate-btn-hover');
                                        });
                                    </script>
                                @endfor


                                <div class="rates rates-{{$comment['id']}} rate-ex3-cnt">
                                    <div id="1" class="rated "></div>
                                    <div id="2" class="rated "></div>
                                    <div id="3" class="rated  "></div>
                                    <div id="4" class="rated  "></div>
                                    <div id="5" class="rated  "></div>
                                </div>
                                <small class="pull-right text-muted">
                                    <span class="glyphicon glyphicon-time"></span>{{date('F d, Y', strtotime($comment['created_at']))}}</small>
                                </br>
                                <li class="ui-state-default">{{$comment['text']}}</li>
                                </br>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Content -->


@stop
@section('scripts')
    <script src="/js/rating.js"></script>
@stop

