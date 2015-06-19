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
        @foreach($categories as $categ)
            <a href="#" class="list-group-item">{{str_replace('-', ' ',$categ['name'])}} <span class="glyphicon glyphicon-chevron-right"></span></a>
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