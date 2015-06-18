@extends('layouts.default')
@section('head-tag')
    <title>WiVert - Register page</title>
@stop
@section('body-tag')

<!-- Content -->
<div class="row content">
    <div class="col-lg-3 content-left">
        <h4>Search</h4>
        <div class="well well-sm">
            <form>
                <fieldset>
                    <input type="text" class="form-control" />
                    <small><a href="#" class="btn-advanced-search">Advanced</a></small>
                    <input type="submit" class="btn btn-danger btn-sm btn-search" value="Search" />
                </fieldset>
            </form>
        </div>
        <h4>Categories</h4>
        <div class="list-group categories">
            <a href="#" class="list-group-item">Books <span class="glyphicon glyphicon-chevron-right"></span></a>
            <a href="#" class="list-group-item">Cameras & Photo <span class="glyphicon glyphicon-chevron-right"></span></a>
            <a href="#" class="list-group-item">Cell Phones & Accessories <span class="glyphicon glyphicon-chevron-right"></span></a>
            <a href="#" class="list-group-item">Clothing, Shoes & Accessories <span class="glyphicon glyphicon-chevron-right"></span></a>
            <a href="#" class="list-group-item">Computers & Networking <span class="glyphicon glyphicon-chevron-right"></span></a>
            <a href="#" class="list-group-item">DVDs & Movies <span class="glyphicon glyphicon-chevron-right"></span></a>
            <a href="#" class="list-group-item">Health & Beauty <span class="glyphicon glyphicon-chevron-right"></span></a>
            <a href="#" class="list-group-item">Music <span class="glyphicon glyphicon-chevron-right"></span></a>
            <a href="#" class="list-group-item">Toys & Hobbies <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
        <h4>Newest classifieds</h4>
        <div class="newest-classifieds">
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" style="width: 64px; height: 64px;" src="http://placehold.it/64x64/e0e0e0" />
                </a>
                <div class="media-body">
                    <p><a href="#"><strong>Samsung Galaxy S4</strong></a></p>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel ...</p>
                </div>
            </div>
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" style="width: 64px; height: 64px;" src="http://placehold.it/64x64/e0e0e0" />
                </a>
                <div class="media-body">
                    <p><a href="#"><strong>Vizio 60" Slim Frame 3D LED</strong></a></p>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel ...</p>
                </div>
            </div>
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" style="width: 64px; height: 64px;" src="http://placehold.it/64x64/e0e0e0" />
                </a>
                <div class="media-body">
                    <p><a href="#"><strong>Apple McBook Pro</strong></a></p>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel ...</p>
                </div>
            </div>
            <p class="text-right show-more"><a href="#">More &rarr;</a></p>
        </div>
    </div>
    <div class="col-lg-9 content-right">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="signUp.html">Sign Up</a></li>
        </ol>
        <h2>Sign Up</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sit amet porta eros, eget facilisis arcu. Duis condimentum fermentum enim, ac rutrum erat venenatis vel. Morbi pharetra viverra faucibus.</p>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="well">
                    {{ Form::open(array('url'=>$hotspot.'/register', 'role'=>'form')) }}
                 {{--   <form action="#" method="post" role="form">--}}
                        <div class="form-group">
                            <div class="row">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li class="alert alert-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email', 'type'=>'email')) }}
                            {{--<input class="form-control" name="youremail" placeholder="Your email" type="email" />--}}
                        </div>
                        <div class="form-group">
                            {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
                            {{--<input class="form-control" name="password" placeholder="New password" type="password" />--}}
                        </div>
                        <div class="form-group">
                            {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Re-enter new password', 'type'=>'password')) }}
                           {{-- <input class="form-control" name="reenterpassword" placeholder="Re-enter new password" type="password" />--}}
                        </div>
                    {{ Form::submit('Register', array('class'=>'btn btn-lg btn-primary btn-block'))}}
                    {{ Form::close() }}
                       {{-- <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
                    </form>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@stop