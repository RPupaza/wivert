@extends('layouts.default')
@section('head-tag')
    <title>WiVert - Register page</title>
@stop
@section('body-tag')

<!-- Content -->
<div class="row content">
    @include('includes.sidebar')
    <div class="col-lg-9 content-right">
        <ol class="breadcrumb">
            <li><a href="{{url($hotspot)}}">Home</a></li>
            <li><a href="{{url($hotspot.'/register')}}">Registration</a></li>
        </ol>
        <h2>Sign Up</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sit amet porta eros, eget facilisis arcu. Duis condimentum fermentum enim, ac rutrum erat venenatis vel. Morbi pharetra viverra faucibus.</p>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="well">
                    {{ Form::open(array('url'=>'https://arad.wivert.net/Payment', 'role'=>'form', 'name'=>'ccpay')) }}

                    <input name="Page" type="hidden" value="CreateUserPayAuthorize">

                    <input type="hidden" name="CPORT" value="8080">

                    <input type="hidden" name="redirurl" value="https://www.google.co.uk/?gfe_rd=cr&ei=yLybVf2DJtCSoQfQwoHQDw&gws_rd=ssl">

                    <input type="hidden" name="MT_Error" value="">

                    <!--// From ITEMS //-->
                    <input name="Desc" type="hidden" value="Free Account">
                    <input name="Price" type="hidden" value="0.00">
                    <input name="Amount" type="hidden" value="0.00">
                    <input name="CurrencyId" type="hidden" value="">
                    <input name="ItemName" type="hidden" value="Fre Account">
                    <input name="RequestNamePrefix" type="hidden" value="Meetering">
                    <!--// From *PersonalDetails //-->

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
                        {{ Form::text('UserName', null, array('class'=>'form-control', 'placeholder'=>'UserName', 'type'=>'text')) }}
                        {{--<input class="form-control" name="youremail" placeholder="Your email" type="email" />--}}
                    </div>
                    <div class="form-group">
                        {{ Form::text('FirstName', null, array('class'=>'form-control', 'placeholder'=>'FirstName', 'type'=>'text')) }}
                        {{--<input class="form-control" name="youremail" placeholder="Your email" type="email" />--}}
                    </div>
                    <div class="form-group">
                        {{ Form::text('LastName', null, array('class'=>'form-control', 'placeholder'=>'LastName', 'type'=>'text')) }}
                        {{--<input class="form-control" name="youremail" placeholder="Your email" type="email" />--}}
                    </div>
                        <div class="form-group">
                            {{ Form::text('Email', null, array('class'=>'form-control', 'placeholder'=>'Email', 'type'=>'email')) }}
                            {{--<input class="form-control" name="youremail" placeholder="Your email" type="email" />--}}
                        </div>
                        <div class="form-group">
                            {{ Form::password('Password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
                            {{--<input class="form-control" name="password" placeholder="New password" type="password" />--}}
                        </div>
                        <div class="form-group">
                            {{ Form::password('ConfirmPassword', array('class'=>'form-control', 'placeholder'=>'Re-enter new password', 'type'=>'password')) }}
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