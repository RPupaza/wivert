<?php

class UsersController extends BaseController
{

    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    public function getRegister($hotspot)
    {
        $categ = Category::All();
        $news = Deal::join('adverts','adverts.id','=','deals.advert')
            ->select('deals.*', 'adverts.name AS advert_name')
            ->take(10)
            ->orderBy('deals.id', 'desc')
            ->get();

        $hp = Hotspot::where('name', '=', $hotspot)->first();
        if ($hp == NULL)
        {
            $hp = Hotspot::find(1);
        }

        return View::make('register')
            ->with('hotspot', $hotspot)
            ->with('categories',$categ)
            ->with('news',$news)
            ->with('hp',$hp);
    }

    public function create($hotspot)
    {
        $hp = Hotspot::where('name', '=', $hotspot)->first();
        $validator = Validator::make(Input::all(), User::$rules);
        $usr_exists = User::where('email', '=', Input::get('email'))->where('hotspot','=',$hp['id'])->first();

        if ($hp == NULL)
        {
            $hp = Hotspot::find(1);
        }
            //dd($hp['id']);
          //  dd($usr_exists);
        if($usr_exists == NULL){
            if ($validator->passes()) {
                // validation has passed, save user in DB
                $user = new User;
                $user->email = Input::get('email');
                $user->password = Hash::make(Input::get('password'));
                $user->hotspot = $hp['id'];
                $user->save();

                return Redirect::to('/'.$hotspot)->with('message', 'Welcome aboard to <strong>'.$hotspot.'</strong>, now Sign in !')->with('errclass', 'alert-success');
            } else {
                // validation has failed, display error messages
                return Redirect::to('/'.$hotspot.'/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput()->with('errclass', 'alert-danger');
            }

        } else {
            return Redirect::to('/'.$hotspot.'/register')->with('message', 'This Email is already registered to this hotspot !')->with('errclass', 'alert-danger');
        }


    }


    public function doLogin($hotspot)
    {
        $hp = Hotspot::where('name', '=', $hotspot)->first();

        if ($hp == NULL)
        {
            $hp = Hotspot::find(1);
        }
        //dd($hotspot);
        $rules = array(
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/'.$hotspot)
                ->with('message', 'Please provide a real Email and password !')->with('errclass', 'alert-danger')// send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email' => Input::get('email'),
                'password' => Input::get('password'),
                'hotspot' => $hp['id']
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {
                $_SESSION['hotspot'] = $hotspot;
                return Redirect::to('/'.$hotspot);
            } else {
                return Redirect::to('/'.$hotspot)
                    ->with('message', 'Your username/password combination was incorrect')->with('errclass', 'alert-danger')
                    ->withInput();
            }
        }
    }

    public function getLogout($hotspot) {
        Auth::logout();
        return Redirect::to('/'.$hotspot);
    }
}