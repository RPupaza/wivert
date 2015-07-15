<?php

class DealsController extends BaseController{

    public function getDeal($hotspot, $advert_name ,$deal_name){

        $news = Deal::join('adverts','adverts.id','=','deals.advert')
            ->select('deals.*', 'adverts.name AS advert_name')
            ->take(10)
            ->orderBy('deals.id', 'desc')
            ->get();

        $categ = Category::All();
        $hp = Hotspot::where('name', '=', $hotspot)
            ->first();

       $deal = DB::table('deals')
            ->join('adverts','adverts.id','=','deals.advert')
            ->join('advertisers','advertisers.id','=','adverts.advertiser')
            ->select('advertisers.fullname','advertisers.email', 'adverts.address', 'deals.*')
            ->where('deals.name', '=', $deal_name)
            ->first();
       // dd($deal);
        if ($hp == NULL)
        {
            $hp = Hotspot::find(1);
        }
        $code = Code::select('id')
            ->where('deal','=',$deal->id)
            ->where('available','=',1)
            ->exists();
        //var_dump($code);
        if ($deal == NULL){
           return Redirect::to('/'.$hotspot.'/adverts/'.$advert_name)
               ->with('message','No deal was found !')
               ->with('hp', $hp)
               ->with('news',$news)
               ->with('hotspot', $hotspot)
               ->with('errclass', 'alert-danger');
        } else {
            return View::make('deals')
                ->with('deal',$deal)
                ->with('hp', $hp)
                ->with('hotspot', $hotspot)
                ->with('adv',$advert_name)
                ->with('categories',$categ)
                ->with('news',$news)
                ->with('isAvailable',$code);
        }
    }
}