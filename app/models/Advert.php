<?php

class Advert extends Eloquent{

    public static function getAdvertInfo($name){
        $Advert = DB::table('Adverts')->where('name', $name)->first();
        // return $hotspot;

        // var_dump($hotspot);
    }
}