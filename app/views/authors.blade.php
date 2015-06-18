@extends('layouts.default')
@section('head-tag')
    <title>AUTHORS</title>
@stop
@section('body-tag')
    <div class="container wrapper">
        <!-- Logo -->
        <div class="logo">
            <a href="index.html"><img src="img/czsale_logo.png"></a>
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
                <a href="addClassified.html" class="btn btn-success navbar-btn add-classified-btn navbar-left" role="button">Add classified</a>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
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
                    </li>
                    <li><a href="help.html">Help</a></li>
                    <li><a href="signUp.html">Sign Up</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign in <b class="caret"></b></a>
                        <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Remember me
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success btn-block">Sign in</button>
                                            </div>
                                        </form>
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
                </ul>
            </div>
        </nav>
        <!-- /Static navbar -->
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
                <h4>Featured</h4>
                <div id="slides">
                    <img src="img/slides/slide-00.jpg">
                    <img src="img/slides/slide-01.jpg">
                    <img src="img/slides/slide-02.jpg">
                    <a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
                    <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
                </div>
                <h4>Recommended</h4>
                <div class="row selected-classifieds">
                    <div class="col-lg-3">
                        <div class="thumbnail">
                            <img src="http://placehold.it/800x600/e0e0e0" />
                            <div class="caption">
                                <p><small><a href="#">Samsung Galaxy S4</a></small><p>
                                <p><strong>550 EUR</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="thumbnail">
                            <img src="http://placehold.it/800x600/e0e0e0" />
                            <div class="caption">
                                <p><small><a href="#">Vizio 60" Slim Frame 3D LED</a></small><p>
                                <p><strong>370 EUR</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="thumbnail">
                            <img src="http://placehold.it/800x600/e0e0e0" />
                            <div class="caption">
                                <p><small><a href="#">Logitech 2.1 HS-263</a></small><p>
                                <p><strong>36 EUR</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="thumbnail">
                            <img src="http://placehold.it/800x600/e0e0e0" />
                            <div class="caption">
                                <p><small><a href="#">Apple McBook Pro</a></small><p>
                                <p><strong>740 EUR</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row selected-classifieds">
                    <div class="col-lg-3">
                        <div class="thumbnail">
                            <img src="http://placehold.it/800x600/e0e0e0" />
                            <div class="caption">
                                <p><small><a href="#">Adidas Blake 46"</a></small><p>
                                <p><strong>55 EUR</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="thumbnail">
                            <img src="http://placehold.it/800x600/e0e0e0" />
                            <div class="caption">
                                <p><small><a href="#">Card reader MobileLite G2</a></small><p>
                                <p><strong>10 EUR</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="thumbnail">
                            <img src="http://placehold.it/800x600/e0e0e0" />
                            <div class="caption">
                                <p><small><a href="#">Electonics toolkit (40 pieces)</a></small><p>
                                <p><strong>28 EUR</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="thumbnail">
                            <img src="http://placehold.it/800x600/e0e0e0" />
                            <div class="caption">
                                <p><small><a href="#">Nokia Lumia 800</a></small><p>
                                <p><strong>185 EUR</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Content -->
        <div class="footer">
            <div class="well well-sm">
                <div class="pull-left">
                    <ul class="nav nav-pills">
                        <li><a href="addClassified.html"><span class="glyphicon glyphicon-plus"></span> Add classified</a></li>
                    </ul>
                </div>
                <div class="pull-right">
                    <ul class="nav nav-pills">
                        <li><a href="help.html">Help</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="conditions.html">Rules & conditions</a></li>
                    </ul>
                </div>
                <div class="clearfix">&nbsp;</div>
            </div>
            <div class="pull-right">
                <p class="text-muted"><small>Copyright &copy; 2013-2014, SenseMedia.cz - All Rights Reserved.</small></p>
            </div>
        </div>
    </div>
@stop






{{--
@foreach ($authors as $author)
    {{{ $author->name }}}
@endforeach--}}
