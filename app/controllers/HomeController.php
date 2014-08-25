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
					'password' => Hash::make(Input::get('password')),
					'created_at' => date('Y-m-d')
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
	
	
	public function getInsertMovie(){
		$category = Category::orderBy('category_name')->get();
		return View::make('insert_movie')->with('category', $category);
	}
	
	
	public function postInsertMovie(){

		$input = array(
			'name' => htmlspecialchars(trim(Input::get('name'))),
			'year' => htmlspecialchars(trim(Input::get('year'))),
			'description' => htmlspecialchars(trim(Input::get('description'))),
			'category' => Input::get('category'),
			'director' => htmlspecialchars(trim(Input::get('director'))),
			'stars' => htmlspecialchars(trim(Input::get('stars'))),
			'file' => Input::file('file')
			);
		$sourceFile = Input::file('file');
		$filename = $sourceFile->getClientOriginalName();
		$extension = $sourceFile->getClientOriginalExtension();
		$file = basename($filename, '.'.$extension);
		$newFilename = $file.str_random(8).'.'.$extension;
		$destinationPath = 'img/movie_covers/';
			
		$rules = array(
			'name' => 'required|alpha_spaces|unique:movies,name',
			'year' => 'required|digits:4',
			'description' => 'required|min:20|max:1000',
			'category' => 'required',
			'director' => 'required|alpha_spaces|min:4',
			'stars' => 'required|alpha_spaces|min:4',
			'file' => 'required|image|max:500'
			);
			
		$validator = Validator::make($input, $rules);
		//dd($validator->passes());
		if($validator->passes()){
			$imageSave = $sourceFile->move($destinationPath, $newFilename);
			$data = array(
			'name' => ucwords(Input::get('name')),
			'year' => Input::get('year'),
			'description' => Input::get('description'),
			'category_id' => (int)Input::get('category'),
			'director' => ucwords(Input::get('director')),
			'stars' => ucwords(Input::get('stars')),
			'cover_image' => $destinationPath.$newFilename
			);

			//dd($data);
			Movies::insert($data);
			
			return Redirect::to('insert_movie');
			} else {
			return Redirect::back()->withErrors($validator);
			}
	}

}
