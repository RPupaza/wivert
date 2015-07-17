<?php

class VisitedController extends BaseController{

    public function visit($hotspot, $advert){

        $hotspotID = Hotspot::where('name','=',$hotspot)->select('id')->first();
        $advertID = Advert::where('name','=',$advert)->select('id')->first();
        $visited = Visit::where('hotspot','=',$hotspotID['id'])->where('advert','=',$advertID['id'])->where('created_at','=',new DateTime('today'))->first();
        if($visited != NULL){
            $visited->visits = $visited['visits'] + 1;
            $visited->save();
        } else {
            $visited = new Visit;

            $visited->hotspot = $hotspotID['id'];
            $visited->advert = $advertID['id'];
            $visited->visits = 1;
            $visited->created_at = date('Y-m-d');
            $visited->save();
        }
        return Redirect::to('/'.$hotspot.'/adverts/'.$advert);
        
    }
}