<?php

    class ProposalModel extends BaseModel{


          //Method that returns all Proposals where prop_trash = 0 from DB in DESC order by date to display in /proposals
          public function getProposals(){
            return $this->database->getRows("SELECT * FROM proposals JOIN client WHERE prop_client_id = client_id AND prop_trash = 0 ORDER BY prop_time DESC");
          }

          public function trash($id){
            $this->database->query("UPDATE proposals SET prop_trash = 1
                                    WHERE prop_id = '$id' ");
          }

          //Method that returns all Proposals from DB in DESC order by date (exercício 1)
          public function getDetail($id){
            return $this->database->getSingleRow("
            SELECT * FROM proposals
            	JOIN planing ON
                prop_id = planing_prop_id
              JOIN budget ON
                prop_id = budget_prop_id
              WHERE
                  prop_id  = $id
            ");
          }



          // method that returns plannigs by using the variable $id
          public function getPlaning($id){
            //Escapes special characters in a string
            $id = $this->database->escape($id);
            return $this->database->getRows("SELECT * FROM proposals JOIN planing ON prop_id = planing_prop_id WHERE prop_id  = $id");}

          public function getBudget($id){
            //Escapes special characters in a string
            $id = $this->database->escape($id);
            return $this->database->getRows("SELECT * FROM proposals
              JOIN budget ON
                prop_id = budget_prop_id
              WHERE
                  prop_id  = $id");
          }

          public function getAllClients(){
            // Select all clients where client trash = 0 for displaying in proposal/detail/id client list
            return $this->database->getRows("SELECT * FROM client WHERE client_trash = 0");
          }

          // Changes visibility on db
          public function changeVisibility($id,$visibility){
            $this->database->query("UPDATE proposals SET prop_visibility = '$visibility' WHERE prop_id = '$id'");
          }

          // Changes payment on db
          public function changePayment($id,$prop_pay){
            $this->database->query("UPDATE proposals SET prop_pay = '$prop_pay' WHERE prop_id = '$id'");
            $this->database->query("DELETE FROM receipt WHERE receipt_prop_id = '$id'");
            $new_id = $this->database->insert("REPLACE INTO receipt (receipt_prop_id) VALUES ('$id')");
          }



          public function update($id,$name,$text,$local,$visibility,$pay,$client_id,$time_new_time,$planing_topic,$budgetProd,$budgetPrice){
          $this->database->query("UPDATE proposals SET
                                 prop_name = '$name',
                                 prop_text = '$text',
                                 prop_local = '$local',
                                 prop_visibility = '$visibility',
                                 prop_pay = '$pay',
                                 prop_client_id = '$client_id'
                                 WHERE
                                 prop_id = '$id'
                                 ");


//********** Update PLANING TABLE

          $planingEntries = $this->database->getRows("SELECT * FROM planing where planing_prop_id = '$id'");
          // var_dump($planingEntries);exit;
          // counting if the $planing_topic rows is smaller than $planingEntries
          if ( count($planingEntries) > count($planing_topic) ){
            // It goes from the last number of the $planing_topic until the last number of $planingEntries
            // It deletes everything in between. After it the foreach bellow...
            for($i=count($planing_topic); $i<=count($planingEntries); $i++)
            {
              $this->database->query("DELETE FROM planing WHERE planing_id = '$i'");
            }
          } // End of IF

          // .. will re-add the new entries into the db
          foreach ( $planing_topic as $key => $value ){
            $inc = $key+1;

            // var_dump($value);var_dump($time_new_time[$key]);

            $this->database->query("REPLACE
                 INTO planing SET
                 planing_time = '$time_new_time[$key]',
                 planing_topic = '$value',
                 planing_prop_id = '$id',
                 planing_id = '$inc'
             ");

           }// End of foreach function



//********** Update BUDGET TABLE

          $budgetEntries = $this->database->getRows("SELECT * FROM budget where budget_prop_id = '$id'");
          // var_dump($budgetEntries);exit;
          // counting if the $budgetProd rows is smaller than $budgetEntries
          if ( count($budgetEntries) > count($budgetProd) ){
            // It goes from the last number of the $budgetProd until the last number of $budgetEntries
            // It deletes everything in between. After it the foreach bellow...
            for($i=count($budgetProd); $i<=count($budgetEntries); $i++)
            {
              $this->database->query("DELETE FROM budget WHERE budget_id = '$i'");
            }
          } // End of IF

          // .. will re-add the new entries into the db
          foreach ( $budgetProd as $key => $value ){
            $inc = $key+1;

            // var_dump($value);var_dump($time_new_time[$key]);

            $this->database->query("REPLACE
                 INTO budget SET
                 budget_price = '$budgetPrice[$key]',
                 budget_prod = '$value',
                 budget_prop_id = '$id',
                 budget_id = '$inc'
             ");

           }// End of foreach function
           // Deletes everything of receipt where receipt_prop_id = $id for keeping just 1 receipt for each proposal
           $this->database->query("DELETE FROM receipt WHERE receipt_prop_id = '$id'");

           $new_id = $this->database->insert("REPLACE INTO receipt (receipt_prop_id) VALUES ('$id')");


        }// End Update function

        //Insert new record into Database
        public function create(){
          $new_id = $this->database->insert("INSERT INTO proposals VALUES ()");
                    $this->database->insert("INSERT INTO planing (planing_prop_id) VALUES ('$new_id')" );
                    $this->database->insert("INSERT INTO budget (budget_prop_id) VALUES ('$new_id')" );
          return $new_id;
        }





    }

 ?>
