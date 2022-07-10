<?php

    class Actors extends Controller{

        public function singleActor($id){
            $this->loadModel("Movie");
            $actor = $this->Movie->getData("/person/$id");
            $movies = $this->Movie->getData("/person/$id/combined_credits");
            $this->render('singleActor',['actor' => $actor, 'movies' => $movies]);
        }
    }