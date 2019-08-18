<?php

    class BaseController{

        protected $controller;
        protected $action;
        protected $id;
        protected $params;

        public $database;
        protected $cart;
        private $view;
        private $data;

        //Class constructor
        public function __construct($controller,$action,$id,$params){

            //Assign parameters
            $this->controller = $controller;
            $this->action = $action;
            $this->id = $id;
            $this->params = $params;

            //Create database object
            $this->database = new Database();

            //Execute action
            $this->action($this->action);

        }

        //Execute action
        private function action($action_name){

            //Check if controller method exists
            if( !method_exists($this,$action_name) ){
                die('Method '.$action_name.' is not defined');
            }

            //Execute controller method
            $this->$action_name();

        }

        //Load Model
        protected function loadModel($model){

            $model_class = $model.'Model';

            if(!class_exists($model_class)){
                die("Model $model_class does not exist.");
            }

            return new $model_class($this->database);

        }

        //Add data
        protected function saveData($key,$value){
            $this->data[$key] = $value;
        }

        //Output View
        protected function loadView($template, $header='header', $footer='footer'){
            new View( $template, $this->data, $header, $footer );
        }






        //Redirect application
        protected function redirect($path){
            header('location:'.BASE_URL.$path);
        }


    }



?>
