<?php

    abstract class Controller{
        //This metod allow us to charge model
        public function loadModel(string $model){
            //We search the model we need
            require_once(ROOT.'models/'.$model.'.php');

            //We instantiate this model who will be accessible par "Movie"
            $this->$model = new $model();
        }


        //show views
        public function render(string $fichier, array $data = []){
            extract($data);
            //start buffer
            $movieGenres = $this->Movie->getData("/genre/movie/list");
            $serieGenres = $this->Movie->getData("/genre/tv/list");
            ob_start();
            //we generate the view
            require_once(ROOT.'views/'.strtolower(get_class($this)).'/'.$fichier.'.php');
            //we stock the content in the content variable
            $content = ob_get_clean();
            //We create the template
            require_once(ROOT.'views/Layouts/default.php');
        }
        }