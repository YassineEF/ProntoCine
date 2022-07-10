<?php
//We define a constant that store the path for our public folder project
define('ROOT',str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

//we call our dotenv class
require_once(ROOT.'config/Dotenv.class.php');
//Env variable/file
(new DotEnv(ROOT . 'config/.env'))->load();

//we require our template model and controller 
require_once(ROOT.'app/Model.php');
require_once(ROOT.'app/Controller.php');



//we divise the differente parameters
$params = explode("/",$_GET['p']);

//We check if there are at least1 prameter
if($params[0] != ""){
    //we save the first parameter in our variable controller    
    $controller = ucfirst($params[0]);
    
    //we save the second parameter in our variable controller    
    $action = isset($params[1]) ?$params[1] : 'index';

    //We require the controller
    require_once(ROOT.'controllers/'.$controller.'.class.php');
    //we instantiate the controller
    $controller = new $controller();

    if(method_exists($controller,$action)){
        unset($params[0]);
        unset($params[1]);

        call_user_func_array([$controller, $action], $params);
    }else{
        http_response_code(404);
        echo "La page demandée n'existe pas";
    }
}else{

}