<?php

    class Database{

        private $mysqli;

        //Class constructor - create new mysqli object
        public function __construct(){

            $this->mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

            if($this->mysqli->connect_error){
                die( $this->mysqli->connect_error );
            }

            $this->mysqli->set_charset('utf8');

        }

        //Return multiple records from DB
        public function getRows($sql){

            $items = array();

            $result = $this->mysqli->query($sql);

            $this->checkError();

            while( $row = $result->fetch_object() ){
                $items[] = $row;
            }

            return $items;

        }

        //Return single record from DB
        public function getSingleRow($sql){

            $result = $this->mysqli->query($sql);

            $this->checkError();

            $item = $result->fetch_object();

            return $item;

        }

        //Execute DB query
        public function query($sql){

            $this->mysqli->query($sql);

            $this->checkError();

        }

        //Insert and return inserted id
        public function insert($sql){

            $this->mysqli->query($sql);

            $this->checkError();

            return $this->mysqli->insert_id;

        }

        //Check for query errors
        private function checkError(){

            if($this->mysqli->error){

                echo $this->mysqli->error;

                die();

            }
        }

        //Escape string
        public function escape($string){
            return $this->mysqli->real_escape_string($string);
        }



    }



?>
