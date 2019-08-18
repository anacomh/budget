<?php


    class Router{

        private $path = array();
        private $controller;
        private $action;
        private $id;
        private $params = array();

        //Constructor class
        public function __construct(){

            $this->getPath();
            $this->getParams();
            $this->loadController();

        }

        //Get URL path
        private function getPath(){

            //Explode URL Path
            if( isset($_GET['path']) ){
                $url_parts = explode('/',$_GET['path']);
            }

            //Assign controller
            if( isset($url_parts[0]) && $url_parts[0] != ''){
                $this->controller = $url_parts[0];
            }else{
                $this->controller = 'Home';
            }

            //Assign action
            if( isset($url_parts[1]) && $url_parts[1] != ''){
                $this->action = $url_parts[1];
            }else{
                $this->action = 'index';
            }

            //Assign id
            if( isset($url_parts[2]) && $url_parts[2] != ''){
                $this->id = $url_parts[2];
            }else{
                $this->id = 0;
            }

        }

        //Get URl query parameters
        private function getParams(){

            //Assign url query parameters
            foreach($_GET as $key=>$value){
                $this->params[$key] = $value;
            }

        }

        //Load controller class
        private function loadController(){

            //Store controller full class name
            $controller_class = ucfirst($this->controller).'Controller';

            //Check if controller class exists
            if( !class_exists($controller_class) ){
                die('Controller $controller_class does not exist');
            }

            //Create controller class object
            $controller = new $controller_class( $this->controller, $this->action, $this->id, $this->params);


        }


    }


 ?>
