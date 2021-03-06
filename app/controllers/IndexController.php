<?php

class IndexController extends BaseController{

    public function index($hotspot){



      /* Mail::send('emails.deals.promoCode', array('firstname'=>'Ehsan'), function($message) {
            $message->to('ehsan@wivert.co.uk')->subject('Here will be the voucher email !');
        });*/

        $hp = Hotspot::where('name', '=', $hotspot)->first();
        if ($hp == NULL)
        {
            $hp = Hotspot::find(1);
        }

        $news = Deal::join('adverts','adverts.id','=','deals.advert')
            ->select('deals.*', 'adverts.name AS advert_name')
            ->take(10)
            ->orderBy('deals.id', 'desc')
            ->get();

        $categ = Category::where('id','<>',$hp['category'])->get();

        $banner = Advert::where('priority','=', 1)
            ->where('category','<>',$hp['category'])
            ->where('city', '=', $hp['city'])
            ->select('name','image')
            ->take(5)
            ->get();

        $recommand = Advert::where('priority','=', 2)
            ->where('category','<>',$hp['category'])
            ->where('city', '=', $hp['city'])
            ->select('name','image')
            ->take(10)
            ->get();

        $silver = Advert::where('priority','=', 3)
            ->where('category','<>',$hp['category'])
            ->where('city', '=', $hp['city'])
            ->select('name','image')
            ->take(15)
            ->get();

        $bronze = Advert::where('priority','=', 4)
            ->where('category','<>',$hp['category'])
            ->where('city', '=', $hp['city'])
            ->select('name','image')
            ->take(20)
            ->get();

        $footer = Advert::where('priority','=', 5)
            ->where('category','<>',$hp['category'])
            ->where('city', '=', $hp['city'])
            ->select('name','image')
            ->take(5)
            ->get();
       // print_r($banner);


        if(Auth::check()){
            $usr_exists = User::where('email', '=', Auth::user()->email)->where('hotspot','=',$hp['id'])->first();
            if($usr_exists == NULL){
                //Auth::logout();
                return Redirect::to('/'.$_SESSION['hotspot'])->with('message', 'Don`t mess with the link without permission !')->with('errclass', 'alert-danger');
            } else {
            }
        }


        //dd($usr_exists);
        return View::make('index')
            ->with('hotspot', $hotspot)
            ->with('hp',$hp)
            ->with('categories',$categ)
            ->with('news',$news)
            ->with('banner',$banner)
            ->with('recommand',$recommand)
            ->with('silver',$silver)
            ->with('bronze',$bronze)
            ->with('footer',$footer);
    }




}