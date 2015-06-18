<?php

class DealsController extends BaseController{

    public function getDeal($hotspot, $advert_name ,$deal_name){
        $hp = Hotspot::where('name', '=', $hotspot)->first();
       // $deal = Advert::join('advertisers', 'adverts.advertiser', '=', 'advertisers.id')->where('adverts.name','=',$advert)->first();
        $deal = DB::table('deals')->join('adverts','adverts.id','=','deals.advert')->join('advertisers','advertisers.id','=','adverts.advertiser')->select('advertisers.fullname','advertisers.email', 'adverts.address', 'deals.*')->where('deals.name', '=', $deal_name)->first();
       // dd($deal);
        if ($hp == NULL)
        {
            $hp = Hotspot::find(1);
        }
        if ($deal == NULL){
           return Redirect::to('/'.$hotspot.'/adverts/'.$advert_name)->with('message','No deal was found !')->with('hp', $hp)->with('hotspot', $hotspot)->with('errclass', 'alert-danger');
        } else {
            return View::make('deals')->with('deal',$deal)->with('hp', $hp)->with('hotspot', $hotspot)->with('adv',$advert_name);
        }
    }
}