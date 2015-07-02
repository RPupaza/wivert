@extends('layouts.default')
@section('head-tag')
    <title>WiVert - Advertiser</title>
@stop
@section('body-tag')

<!-- Content -->
{{--{{$advs}}--}}
<div class="row content">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="{{url($hotspot)}}">Home</a></li>
            <li><a href="#">{{$advs['name']}}</a></li>
        </ol>
        <h2>Contact</h2>
        <div class="row">
            <div class="col-md-8">
                <iframe src="{{$advs['gml']}}" style="border: none; width: 100%; height: 400px;"></iframe>
            </div>
            <div class="col-md-4">
                <div class="well well-sm">
                    <address>
                        <strong>{{str_replace('-', ' ',$advs['name'])}}</strong><br />
                        {{str_replace(',', '<br />', $advs['address'])}}<br />
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                    <address>
                        <strong>Company details</strong><br />
                        <p>{{$advs['fullname']}}</p>
                        <a href="mailto:{{$advs['email']}}">{{$advs['email']}}</a>
                    </address>
                </div>
            </div>
        </div>
        <hr>
        <div class="row classifieds-table">
            <div class="col-lg-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Deals</th>
                        <th class="text-center">Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deals as $deal)
                        <tr>
                            <td class="col-sm-8 col-md-6">
                                <div class="media">
                                    <a class="thumbnail pull-left" href="{{url($hotspot.'/adverts/'.$advs['name'].'/deals/'.$deal['name'])}}">
                                        <img class="media-object" src="/img/deals/thumb/{{$deal['image']}}" style="width: 72px; height: 72px;" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="{{url($hotspot.'/adverts/'.$advs['name'].'/deals/'.$deal['name'])}}">{{str_replace('-', ' ',$deal['name'])}}</a></h4>
                                        <p><small>{{$deal['description']}}</small></p>
                                    </div>
                                </div>
                            </td>
                            <td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;"><strong>&#163; {{$deal['price']}}</strong></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@stop