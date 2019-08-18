<?php

    class ClientsModel extends BaseModel{
          //Method that returns all Proposals from DB in DESC order by date (exercício 1)
          public function getClients(){
            return $this->database->getRows("SELECT * FROM client WHERE client_trash = 0");
          }

          public function trash($id){
            $this->database->query("UPDATE client SET client_trash = 1
                                    WHERE client_id = '$id' ");
          }

          // function being used for displaying details of the client
          public function getClient($id){
            //Escapes special characters in a string
            $id = $this->database->escape($id);
            return $this->database->getSingleRow("SELECT * FROM client WHERE client_id  = $id");
          }

          public function update($id,$name,$company,$email,$phone){
            //Update Database
            $this->database->query("UPDATE client SET
                                   client_name = '$name',
                                   client_company = '$company',
                                   client_email = '$email',
                                   client_phone = '$phone'
                                   WHERE
                                   client_id = '$id'
                                   ");
          }

          //Insert new record into Database
          public function create(){
            $new_id = $this->database->insert("INSERT INTO client VALUES ()");
            return $new_id;
          }


    }

 ?>
