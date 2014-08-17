<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome(){
		return View::make('index');
	}


	public function getRegister(){
		return View::make('register');
	}


	public function postRegister(){
		$input = array(
			'username' => htmlspecialchars(Input::get('username')),
			'email' => htmlspecialchars(Input::get('email')),
			'password' => htmlspecialchars(Input::get('password')),
			'password_confirmation' => htmlspecialchars(Input::get('password_confirmation'))
			);

		$rules = array(
			'username' => 'required|min:5|alpha_num|unique:users',
			'email' => 'required|email|min:5|unique:users',
			'password' => 'required|alpha_num|min:5',
			'password_confirmation' => 'required|alpha_num|min:5|same:password'
			);

		$validator = Validator::make($input, $rules);
		if($validator->passes()){
				$data = array(
					'username' => Input::get('username'),
					'email' => Input::get('email'),
					'password' => Hash::make(Input::get('password'))
				);
			User::insert($data);
		return View::make('registered', $data)->with('success', 'Uspješno ste se registrirali!');
		} else {
			return Redirect::back()->withErrors($validator)->withInput();
		}
	}


	public function registered(){
		return View::make('registered');
	}


	public function getLogin(){
		return View::make('login');
	}


	public function postLogin(){
		$input = array(
			'email' => htmlspecialchars(Input::get('email')),
			'password' => htmlspecialchars(Input::get('password'))
			);

		$rules = array(
			'email' => 'required|email|min:5',
			'password' => 'required|alpha_num|min:5'
			);

		$validator = Validator::make($input, $rules);
		if(Auth::attempt($input)){
			return Redirect::route('home', $input);
		} else {
			return Redirect::back()->withErrors($validator);
		}
	}


	public function logout(){
		Auth::logout();
		Session::flush();
		return Redirect::to('login');
	}


	public function ranking(){
		return View::make('ranking');
	}

}
