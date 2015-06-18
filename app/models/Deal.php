<?php

class Deal extends Eloquent{

    public static function getDealInfo($deal){
        $Advert = DB::table('deals')->where('name', $deal)->first();
        // return $hotspot;

        // var_dump($hotspot);
    }
}