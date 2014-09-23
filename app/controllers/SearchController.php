<?php



class SearchController extends BaseController {
	

		public function searchMovies(){
		//preg_replace pretvara više spaceova u 1 space
		$input = preg_replace('/\s+/',' ', Input::get('keyword'));
		$keyword = htmlspecialchars(trim($input));
		$rules = array('keyword' => 'alpha_spaces');
		$validator = Validator::make(array('keyword' => $keyword), $rules);

		/*if(!Cache::has('kontakti')){
				$osobeSearch = Djelatnik::get(array('ime', 'prezime'));
				foreach($osobeSearch as $o){
					$osobeArr[] = trim($o->ime).' '.trim($o->prezime);
				}
				Cache::put('kontakti', $osobeArr, $this->cache_time);
			}else{
				$osobeArr = Cache::get('kontakti');
			}
			$osobeArr = json_encode($osobeArr);*/

		if($validator->passes()){

			$movies = Movies::where('name', 'LIKE', '%'.$keyword.'%')->get();
			$grades = Ranking::all();

			foreach($movies as $movie){
				foreach($grades as $grade){
					if($movie->id == $grade->movie_id){
						if($grade->vote_num != 0){
						$avg = $grade->total/$grade->vote_num;
						} else {
							$avg = 0;
						}

						$data[] = array('id' => $movie->id, 'name' => $movie->name, 'year' => $movie->year, 'avgGrade' => $avg, 'votesNo' => $grade->vote_num);
					}
				}
			}
			//sortiranje asocijativnog polja po prosjeku
			$average = array();
			foreach($data as $key => $val){
				$average[$key] = $val['avgGrade'];
			}
			array_multisort($average, SORT_DESC, $data);
			return View::make('movie_results', array('movies' => $data));
		} else {
			return Redirect::back()->with('fail', 'Unesite naziv filma!');
		}
	}
}