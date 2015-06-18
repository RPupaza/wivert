<?php

class Hotspot extends Eloquent{

    public static function getHotspot($name){
        $hotspot = DB::table('hotspots')->where('name', $name)->first();
       // return $hotspot;

       // var_dump($hotspot);
    }
}