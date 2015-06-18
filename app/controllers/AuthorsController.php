<?php

class AuthorsController extends BaseController{

    public function home(){
        $authors = DB::table('authors')->get();
        return View::make('authors')->with('authors', $authors);
    }
}