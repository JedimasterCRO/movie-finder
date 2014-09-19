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
		if(Auth::check()){
			$movies = Movies::all();
			$grades = Ranking::all();

			foreach($movies as $movie){
				foreach($grades as $grade){
					if($movie->id == $grade->movie_id){
						(double)$avg = $grade->total/$grade->vote_num;

						$data[] = array('id' => $movie->id, 'name' => $movie->name, 'year' => $movie->year, 'avgGrade' => $avg);
					}
				}
			}

			//sortiranje asocijativnog polja po prosjeku
			function cmp($a, $b){
				return $b['avgGrade'] - $a['avgGrade'];
			}
			usort($data, "cmp");

			return View::make('ranking', array('movies' => $data));
		} else {
			return Redirect::to('login');
		}
	}
	
	
	public function getInsertMovie(){
		if(Auth::check()){
			$category = Category::orderBy('category_name')->get();
			return View::make('insert_movie')->with('category', $category);
		} else {
			return Redirect::to('login');
		}
	}
	
	
	public function postInsertMovie(){

		if(Auth::check()){

		$input = array(
			'name' => htmlspecialchars(trim(Input::get('name'))),
			'year' => Input::get('year'),
			'movie_length' => Input::get('movie_length'),
			'description' => htmlspecialchars(trim(Input::get('description'))),
			'category' => Input::get('category'),
			'director' => htmlspecialchars(trim(Input::get('director'))),
			'stars' => htmlspecialchars(trim(Input::get('stars'))),
			'file' => Input::file('file')
			);

		$sourceFile = $input['file'];
		if(isset($sourceFile)){
			$filename = $sourceFile->getClientOriginalName();
			$extension = $sourceFile->getClientOriginalExtension();
			$file = basename($filename, '.'.$extension);
			$newFilename = $file.str_random(8).'.'.$extension;
			$destinationPath = 'img/movie_covers/';
		}
			//dd($newFilename);
		$rules = array(
			'name' => 'required|alpha_spaces|unique:movies,name',
			'year' => 'required|digits:4',
			'movie_length' => 'required|digits_between:2,3',
			'description' => 'required|min:20|max:1000',
			'category' => 'required',
			'director' => 'required|alpha_spaces|min:4',
			'stars' => 'required|alpha_spaces|min:4',
			'file' => 'required|image|max:500'
			);
			
		$validator = Validator::make(Input::all(), $rules);
//dd($validator->passes());
		if($validator->passes()){
			$imageSave = $sourceFile->move($destinationPath, $newFilename);
			$data = array(
			'name' => ucwords(Input::get('name')),
			'year' => Input::get('year'),
			'movie_length' => Input::get('movie_length'),
			'description' => Input::get('description'),
			'category_id' => (int)Input::get('category'),
			'director' => ucwords(Input::get('director')),
			'stars' => ucwords(Input::get('stars')),
			'cover_image' => $destinationPath.$newFilename,
			'user_id' => Auth::user()->id
			);

			//dd($data);
			Movies::insert($data);
			
				return Redirect::to('my_movies');
			} else {
				return Redirect::back()->withErrors($validator)->withInput();
			}
		} else {
			return Redirect::to('login');
		}
	}

	public function myMovies(){
		if(Auth::check()){
		$movies = Movies::where('user_id', Auth::user()->id)->get();
		return View::make('my_movies', array('movies' => $movies));
		} else {
			return Redirect::to('login');
		}
	}


	public function rateMovie($id){
		if(Auth::check()){
		$grades = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
		$movie = Movies::find($id);

		return View::make('rate_movie', array('grades' => $grades, 'movie' => $movie));
		} else {
			return Redirect::to('login');
		}
	}


	public function validateRateMovie(){

		if(Auth::check()){
		$grade = array('grade' => Input::get('grade'));
		$rules = array(
			'grade' => 'required'
			);

		$validator = Validator::make($grade, $rules);

		if($validator->passes()){
			$rankings = Ranking::where('movie_id', Input::get('movie_id'))->first();
			if(empty($rankings)){
				Ranking::insert(array('movie_id' => Input::get('movie_id'), 'vote_num' => 0, 'total' => 0));
				$rankings->total = 0;
			}

			$data = array(
				'vote_num' => $rankings->vote_num + 1,
				'total' => $rankings->total + $grade['grade']
				);

			Ranking::where('movie_id', Input::get('movie_id'))->update($data);
			$rated = 1;
			return Redirect::back()->with('success', 'Thank you for rating this movie!')->with('rated', $rated);
		} else {
			return Redirect::back()->withErrors($validator);
		}
	} else {
			return Redirect::to('login');
		}
	}

}
