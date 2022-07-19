<?php

class Movies extends Controller
{
    public function __construct()
    {
        $this->loadModel("Movie");
    }
    public function index()
    {
        $movies =  $this->Movie->getData("/movie/popular");

        $series =  $this->Movie->getData("/tv/popular");

        $this->render('index', ['movies' => $movies, 'series' => $series]);
    }
    public function singleFilm($id)
    {
        $movie = $this->Movie->getData("/movie/$id");
        $video = $this->Movie->getData("/movie/$id/videos");
        $cast = $this->Movie->getData("/movie/$id/credits");
        $this->render('singleFilm', ['movie' => $movie, 'video' => $video, 'cast' => $cast]);
    }

    public function genreMovie($id, $page)
    {
        $movieList = $this->Movie->getData("/discover/movie", ["with_genres" => $id, "page" => $page]);
        $this->render('genreMovie', ['movieList' => $movieList, 'id' => $id, 'page' => $page]);
    }

    public function categoryFilm($category, $page)
    {
        // $this->loadModel("Movie");
        $movieCat = $this->Movie->getData("/movie/$category", ["page" => $page]);
        $this->render('categoryFilm', ['movieCat' => $movieCat, 'category' => $category, 'page' => $page]);
    }
    public function find()
    {
        $queryString = explode('=', $_SERVER['REQUEST_URI']);
        $query = $queryString[1];

        $searchRes = $this->Movie->getData("/search/multi", ["query" => $query]);
        $this->render('find', ['searchRes' => $searchRes, 'query' => $query]);
    }
    public function error()
    {
        $this->render('error');
    }
}
