<?php

class IndexController extends BaseController{

    public function index($hotspot){

        $hp = Hotspot::where('name', '=', $hotspot)->first();
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
        return View::make('index')->with('hotspot', $hotspot)->with('hp',$hp);
    }


}