@extends('layouts.default')
@section('head-tag')
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/owl.theme.carousel.css">
    <title>WiVert - Landing page</title>
@stop
@section('body-tag')
            <!-- Content -->
        <div class="row content">

            @include('includes.sidebar')
            <div class="col-lg-9 content-right">
                <h4>Featured</h4>
                <div id="slides1">
                    @foreach($banner as $ban)
                        <div><a href="{{url($hotspot.'/visited/'.$ban['name'])}}"><img src="/img/slides/{{$ban['image']}}"></a></div>
                    @endforeach
                </div>
                @if(count($banner) == 0)
                    <p class="alert alert-warning txt-center">No results for this category !</p>
                @endif
                <h4>Gold</h4>
                <div class="row selected-classifieds">
                    <div id="slide-gold">
                    @foreach($recommand as $rec)
                        <div class="col-lg-12">
                            <div class="thumbnail">
                               <img src="/img/slides/{{$rec['image']}}" />
                                <div class="caption">
                                    <p><small><a href="{{url($hotspot.'/visited/'.$rec['name'])}}">{{$rec['name']}}</a></small><p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    @if(count($recommand) == 0)
                        <p class="alert alert-warning txt-center">No results for this category !</p>
                    @endif
                </div>
                <h4>Silver</h4>
                <div class="row selected-classifieds">
                    <div id="slide-silver">
                        @foreach($silver as $slv)
                            <div class="col-lg-12">
                                <div class="thumbnail">
                                    <img src="/img/slides/{{$slv['image']}}" />
                                    <div class="caption">
                                        <p><small><a href="{{url($hotspot.'/visited/'.$slv['name'])}}">{{$slv['name']}}</a></small><p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if(count($silver) == 0)
                        <p class="alert alert-warning txt-center">No results for this category !</p>
                    @endif
                </div>
                <h4>Bronze</h4>
                <div class="row selected-classifieds">
                    <div id="slide-bronze">

                        @foreach($bronze as $brz)
                            <div class="col-lg-12">
                                <div class="thumbnail">
                                    <img src="/img/slides/{{$brz['image']}}" />
                                    <div class="caption">
                                        <p><small><a href="{{url($hotspot.'/visited/'.$brz['name'])}}">{{$brz['name']}}</a></small><p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if(count($bronze) == 0)
                        <p class="alert alert-warning txt-center">No results for this category !</p>
                    @endif
                </div>
                <h4>Footer</h4>
                <div id="slides2">
                    @foreach($footer as $ftr)
                        <div><a href="{{url($hotspot.'/visited/'.$ftr['name'])}}"><img src="/img/slides/{{$ftr['image']}}"></a></div>
                    @endforeach
                </div>
                @if(count($footer) == 0)
                    <p class="alert alert-warning txt-center">No results for this category !</p>
                @endif
            </div>
        </div>
        <!-- /Content -->

@stop

@section('scripts')
    <script src="/js/owl.carousel.min.js"></script>
    <script>
        $( document ).ready(function() {
            // Slider
            $("#slides1").owlCarousel({
                dots: true,
                pagination:true,
                items:1,
                autoplay:true,
                autoplayTimeout:2000,
                autoplayHoverPause:true,
                lazyLoad:true,
                loop:true,
                animateOut: 'fadeOut',
                margin:10
            });

            $("#slides2").owlCarousel({
                dots: false,
                pagination:false,
                items:1,
                autoplay:true,
                autoplayTimeout:2000,
                autoplayHoverPause:true,
                lazyLoad:true,
                loop:true,
                animateOut: 'fadeOut',
                margin:10
            });

            $("#slide-gold").owlCarousel({
                dots: false,
                pagination: false,
                items:4,
                autoplay:true,
                autoplayTimeout:2000,
                autoplayHoverPause:true,
                lazyLoad:true,
                loop:true,
                margin:10
            });
            $("#slide-silver").owlCarousel({
                dots: false,
                pagination: false,
                items:4,
                autoplay:true,
                autoplayTimeout:2000,
                autoplayHoverPause:true,
                lazyLoad:true,
                loop:true,
                margin:10
            });
            $("#slide-bronze").owlCarousel({
                dots: false,
                pagination: false,
                items:4,
                autoplay:true,
                autoplayTimeout:2000,
                autoplayHoverPause:true,
                lazyLoad:true,
                loop:true,
                margin:10
            });
        });
    </script>
@stop






{{--
@foreach ($authors as $author)
    {{{ $author->name }}}
@endforeach--}}
