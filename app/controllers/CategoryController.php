<?php

class CategoryController extends BaseController{

    public function getCateg($hotspot, $category){

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

        $cat_name = Category::where('name','=',$category)->select('id')->first();

        $banner = Advert::where('priority','=', 1)
            ->where('category','=',$cat_name['id'])
            ->where('city', '=', $hp['city'])
            ->select('name','image')
            ->take(5)
            ->get();

        $recommand = Advert::where('priority','=', 2)
            ->where('category','=',$cat_name['id'])
            ->where('city', '=', $hp['city'])
            ->select('name','image')
            ->take(10)
            ->get();

        $silver = Advert::where('priority','=', 3)
            ->where('category','=',$cat_name['id'])
            ->where('city', '=', $hp['city'])
            ->select('name','image')
            ->take(15)
            ->get();

        $bronze = Advert::where('priority','=', 4)
            ->where('category','=',$cat_name['id'])
            ->where('city', '=', $hp['city'])
            ->select('name','image')
            ->take(20)
            ->get();

        $footer = Advert::where('priority','=', 5)
            ->where('category','=',$cat_name['id'])
            ->where('city', '=', $hp['city'])
            ->select('name','image')
            ->take(5)
            ->get();

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