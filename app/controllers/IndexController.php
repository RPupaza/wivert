<?php

class IndexController extends BaseController{

    public function index($hotspot){
        $news = Deal::join('adverts','adverts.id','=','deals.advert')->select('deals.*', 'adverts.name AS advert_name')->take(10)->orderBy('deals.id', 'desc')->get();
         //dd($news);
        $hp = Hotspot::where('name', '=', $hotspot)->first();
        $categ = Category::All();
        //var_dump($categ);
        if ($hp == NULL)
        {
            $hp = Hotspot::find(1);
        }

        if(Auth::check()){
            $usr_exists = User::where('email', '=', Auth::user()->email)->where('hotspot','=',$hp['id'])->first();
            if($usr_exists == NULL){
                //Auth::logout();
                return Redirect::to('/'.$_SESSION['hotspot'])->with('message', 'Don`t mess with the link without permission !')->with('errclass', 'alert-danger');
            } else {
            }
        }


        //dd($usr_exists);
        return View::make('index')->with('hotspot', $hotspot)->with('hp',$hp)->with('categories',$categ)->with('news',$news);
    }

    public function getCateg($hotspot, $category){

        $hp = Hotspot::where('name', '=', $hotspot)->first();
        $news = Deal::join('adverts','adverts.id','=','deals.advert')->take(10)->get();
       // dd($news);
        $categ = Category::All();
        //var_dump($categ);
        if ($hp == NULL)
        {
            $hp = Hotspot::find(1);
        }

        if(Auth::check()){
            $usr_exists = User::where('email', '=', Auth::user()->email)->where('hotspot','=',$hp['id'])->first();
            if($usr_exists == NULL){
                //Auth::logout();
                return Redirect::to('/'.$_SESSION['hotspot'])->with('message', 'Don`t mess with the link without permission !')->with('errclass', 'alert-danger');
            } else {
            }
        }


        //dd($usr_exists);
        return View::make('index')->with('hotspot', $hotspot)->with('hp',$hp)->with('categories',$categ)->with('news',$news);

    }


}