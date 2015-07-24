<div class="col-lg-3 content-left sidebar-mobile">
    <i class="setting">
        <span></span>
    </i>
<div class="col-lg-12 mobile-body">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-custom">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$hotspot}} offers</h3>
                    <span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
                </div>
                <div class="panel-body">Panel content <i class="glyphicon glyphicon-chevron-right"></i></div>
                <div class="panel-body">Panel content <i class="glyphicon glyphicon-chevron-right"></i></div>
                <div class="panel-body">Panel content <i class="glyphicon glyphicon-chevron-right"></i></div>
                <div class="panel-body">Panel content <i class="glyphicon glyphicon-chevron-right"></i></div>
            </div>
        </div>
    </div>
    <h4>Categories</h4>
    <div class="list-group categories">
        @foreach($categories as $categ)
            <a href="{{url($hotspot.'/category/'.$categ['name'])}}" class="list-group-item">{{str_replace('-', ' ',$categ['name'])}} <span class="glyphicon glyphicon-chevron-right"></span></a>
        @endforeach
    </div>
    <h4>Newest Deals</h4>
    <div class="newest-classifieds">
        @foreach($news as $new)
            <div class="media">
                <a class="pull-left" href="{{url($hotspot.'/adverts/'.$new['advert_name'].'/deals/'.$new['name'])}}">
                    <img class="media-object" style="width: 64px; height: 64px;" src="/img/deals/mini/{{$new['image']}}" />
                </a>
                <div class="media-body">
                    <p><a href="{{url($hotspot.'/adverts/'.$new['advert_name'].'/deals/'.$new['name'])}}"><strong>{{str_replace('-', ' ',$new['name'])}}</strong></a></p>
                    <p>{{Str::limit($new['description'], 50)}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
<script>
    $(document).ready(function(){
        $('.setting').click(function(){
            $('.mobile-body').animate({
                width:"toggle"
            });
        });
    });
</script>