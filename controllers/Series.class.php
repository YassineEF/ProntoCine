<?php

class Series extends Controller
{
    public function __construct()
    {
        $this->loadModel("Movie");
    }
    public function singleSerie($id)
    {
        $oneSerie = $this->Movie->getData("/tv/$id");
        $video = $this->Movie->getData("/tv/$id/videos");
        $cast = $this->Movie->getData("/tv/$id/credits");
        $this->render('singleSerie', ['oneSerie' => $oneSerie, 'video' => $video, 'cast' => $cast]);
    }
    public function genreSerie($id, $page)
    {
        $serieList = $this->Movie->getData("/discover/tv", ["with_genres" => $id, "page" => $page]);
        $this->render('genreSerie', ['serieList' => $serieList, 'id' => $id, 'page' => $page]);
    }
    public function categoryTv($category,$page)
    {
        $serieCat = $this->Movie->getData("/tv/$category",["page" => $page]);
        $this->render('categoryTv', ['serieCat' => $serieCat, 'category' => $category, 'page' => $page]);
    }
}
