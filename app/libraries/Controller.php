<?php 
    /**
     * 
     * Base Controller
     * 
     * Description: Load the modes and views
     */
    class Controller {
        public function model($model, $data = []){
            //
            if(file_exists('../app/models/' . ucwords($model) . '.php')){
                require_once '../app/models/' . ucwords($model) . '.php';
                //
                return new $model();
            }else{
                $data = ["model", $model];
                require_once ERRORVIEWS . '404View.php';
            }
        }

        public function view($view, $data = []){
            // check for view file
            if(file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            }else{
                $data = ["view", $view];
                require_once ERRORVIEWS . '404View.php';
            }
        }
    }