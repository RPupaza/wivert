@extends('layouts.default')
@section('head-tag')
    <title>WiVert - Landing page</title>
@stop
@section('body-tag')
@foreach($news as $new)
    @endforeach
        <!-- Content -->
        <div class="row content">
            @include('includes.sidebar')
            <div class="col-lg-9 content-right">
                <h4>Featured</h4>
                <div id="slides">
                    <img src="/img/slides/slide-00.jpg">
                    <img src="/img/slides/slide-01.jpg">
                    <img src="/img/slides/slide-02.jpg">
                    <a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
                    <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
                </div>
                <h4>Recommended</h4>
                <div class="row selected-classifieds">
                    <div class="col-lg-3">
                        <div class="thumbnail">
                            <img src="http://placehold.it/800x600/e0e0e0" />
                            <div class="caption">
                                <p><small><a href="{{url($hotspot.'/adverts/buy-1-get-1-free')}}">Samsung Galaxy S4</a></small><p>
                                <p><strong>550 EUR</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="thumbnail">
                            <img src="http://placehold.it/800x600/e0e0e0" />
                            <div class="caption">
                                <p><small><a href="{{url($hotspot.'/adverts/Free-Wifi')}}">Vizio 60" Slim Frame 3D LED</a></small><p>
                                <p><strong>370 EUR</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="thumbnail">
                            <img src="http://placehold.it/800x600/e0e0e0" />
                            <div class="caption">
                                <p><small><a href="{{url($hotspot.'/adverts/3')}}">Logitech 2.1 HS-263</a></small><p>
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
                                <p><small><a href="{{url($hotspot.'/adverts/4')}}">Adidas Blake 46"</a></small><p>
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

@stop






{{--
@foreach ($authors as $author)
    {{{ $author->name }}}
@endforeach--}}
