<?php
    /* 
    *
    *   App Core Class
    *   Description: Creates URL & Loads core controller
    *   URL FORMAt - /controller/method/params
    *
    */
    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct(){
           // print_r($this->getUrl());

           $url = $this->getUrl();
           // Look in controllers for first value
           if(isset($url[0])){
                if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
                        $this->currentController = ucwords($url[0]);
                        unset($url[0]);
                }
           }

           // Require de controller
           require_once '../app/controllers/' . $this->currentController . '.php';
           $this->currenController = new $this->currentController;
           // check for second part of url
           if(isset($url[1])){
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }
           }
           // check for params
           $this->params = $url ? array_values($url) : [];

           // Call a callback with array of params
           call_user_func_array([new $this->currentController, $this->currentMethod], $this->params);
        }

        public function getUrl(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }