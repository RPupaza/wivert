<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="...">
    <meta name="keywords" content="...">
    <meta name="author" content="...">
    <link href="/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="/css/czsale.css" rel="stylesheet" media="screen">
    <link href="/css/czsale-responsive.css" rel="stylesheet" media="screen">
    <link href="/css/style.css" rel="stylesheet" media="screen">
    <link href="/css/rating.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="/css/hotspot/{{$hotspot}}.css">
    @yield('head-tag')
</head>
<script src="/js/jquery-1.10.2.min.js"></script>
<body>
<div class="container wrapper">
         @if(Auth::check())
                <p class="wellcome"><span>{{$hp['name']}}</span> welcomes you aboard <span>{{Auth::user()->email}}</span></p>
            @endif
    <!-- Logo -->
    <div class="logo">
        {{-- <img src="http://ads.wivert.net/dashboard/img/advert/{{$hp['img']}}"> --}}
        <a href="/{{$hotspot}}"><img src="/img/logos/{{$hp['img']}}"></a>
    </div>
    <!-- /Logo -->
    <!-- Static navbar -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#czsale-navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="czsale-navbar">
          {{--  <a href="addClassified.html" class="btn btn-success navbar-btn add-classified-btn navbar-left" role="button">Add classified</a>--}}

            <ul class="nav navbar-nav navbar-right">
                {{--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.html">Home page</a></li>
                        <li><a href="addClassified.html">Add classified</a></li>
                        <li><a href="category.html">Category page</a></li>
                        <li><a href="detail.html">Classified detail</a></li>
                        <li><a href="conditions.html">Rules & Conditions</a></li>
                        <li><a href="help.html">Help (FAQ)</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="signUp.html">Sign Up</a></li>
                    </ul>
                </li>--}}
              {{--  <li><a href="help.html">Help</a></li>--}}
                @if(!Auth::check())
                    <li>{{ HTML::link($hotspot.'/register', 'Register') }}</li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign in <b class="caret"></b></a>
                        <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        {{ Form::open(array('url'=>'http://wireless.wivert.net/login', 'class'=>'form', 'id'=>'login-nav', 'role'=>'form')) }}
                                        {{-- <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">--}}
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                            {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username')) }}
                                            {{--  <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>--}}
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                                            {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
                                            {{-- <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>--}}
                                        </div>
                                        {{-- <div class="checkbox">
                                             <label>
                                                 <input type="checkbox"> Remember me
                                             </label>
                                         </div>--}}
                                        <div class="form-group">
                                            {{ Form::submit('Login', array('class'=>'btn btn-success btn-block'))}}
                                            {{-- <button type="submit" class="btn btn-success btn-block">Sign in</button>--}}
                                        </div>
                                        {{ Form::close() }}
                                        {{-- </form>--}}
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Sign In with Google">
                                <input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Sign In with Twitter">
                            </li>
                        </ul>
                    </li>
                @else
                    <li>{{ HTML::link($hotspot.'/logout', 'logout') }}</li>
                @endif

            </ul>
        </div>
    </nav>
    <!-- /Static navbar -->
@if(Session::has('message'))
    <p class="alert {{Session::get('errclass')}} txt-center">{{ Session::get('message') }}</p>
@endif
@yield('body-tag')