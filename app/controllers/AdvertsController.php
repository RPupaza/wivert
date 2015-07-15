<?php

class AdvertsController extends BaseController{

    public function getAdvert($hotspot, $advert){

        $hp = Hotspot::where('name', '=', $hotspot)->first();
        $adv = Advert::join('advertisers', 'adverts.advertiser', '=', 'advertisers.id')->select('adverts.*', 'advertisers.fullname', 'advertisers.email')->where('adverts.name','=',$advert)->first();
        $deals = Deal::where('advert', '=', $adv['id'])->get();

        foreach($deals as $key => $deal){
            $available[] = Code::where('deal', '=', $deal['id'])->where('available', '=', 1)->select('id')->exists();
        }
        if ($hp == NULL)
        {
            $hp = Hotspot::find(1);
        }
        if ($adv == NULL){
            return Redirect::to('/'.$hotspot)
                ->with('message','STOP messing with the link !')
                ->with('hp', $hp)
                ->with('hotspot', $hotspot)
                ->with('errclass', 'alert-danger');
        } else {
            return View::make('adverts')
                ->with('advs',$adv)
                ->with('hp', $hp)
                ->with('hotspot', $hotspot)
                ->with('deals',$deals)
                ->with('availability', $available);
        }
    }
}