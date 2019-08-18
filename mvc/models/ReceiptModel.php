<?php

    class ReceiptModel extends BaseModel{

      public function getPayedProposals() {
        return $this->database->getRows("SELECT * FROM proposals JOIN receipt ON receipt_prop_id = prop_id JOIN client ON prop_client_id = client_id WHERE prop_pay = 1 AND prop_trash = 0");
      }

      public function getReceiptDetail($id){
        return $this->database->getSingleRow("SELECT * FROM proposals JOIN receipt ON receipt_prop_id = prop_id JOIN client ON prop_client_id = client_id WHERE prop_pay = 1 AND prop_id = '$id'");
      }

      public function getTotal($id){
          return $this->database->getRows("SELECT * FROM proposals JOIN budget ON budget_prop_id = prop_id WHERE prop_id = '$id'");
      }


      // Changes visibility on db
      public function changeVisibility($id,$visibility){
        $this->database->query("UPDATE receipt SET receipt_visibility = '$visibility' WHERE receipt_prop_id = '$id'");
      }



    }// Close receipt controller


 ?>
