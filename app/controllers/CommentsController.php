<?php

class CommentsController extends BaseController{

    public function comment($hotspot){

        $hotspotID = Hotspot::where('name','=',$hotspot)->select('id')->first();
        $name = $_POST['user'];
        $text = $_POST['text'];
        $rate = $_POST['rate'];
        $deal = $_POST['deal'];

        $comment = new Comment;

        $comment->hotspot = $hotspotID['id'];
        $comment->name = $name;
        $comment->rate = $rate;
        $comment->text = $text;
        $comment->deal = $deal
        ;
        $comment->created_at = date('Y-m-d');
        $comment->save();

        /*return Redirect::to('http://localhost:8000/wivert/adverts/buy-1-get-1-free/deals/IPhone-5c-16gb-(blue)-Apple-refurb');*/
    }
}