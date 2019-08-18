<?php

    class ProjectModel extends BaseModel{


      public function getClientId($id){
        return $this->database->getSingleRow("SELECT prop_client_id FROM proposals WHERE prop_id = '$id' ");
      }

      public function getMainDetails($id,$client_id){
        return $this->database->getSingleRow("SELECT * FROM proposals
                                            JOIN client ON prop_client_id = client_id
                                            WHERE prop_id = '$id' and client_id = '$client_id'
                                            ");
      }

        public function getPlaning($id){
          return $this->database->getRows("SELECT * FROM proposals
                                              JOIN planing on prop_id = planing_prop_id
                                              WHERE prop_id = '$id'
                                              ");
        }

        public function getBudget($id){
          return $this->database->getRows("SELECT * FROM proposals
                                              JOIN budget on prop_id = budget_prop_id
                                              WHERE prop_id = '$id'
                                              ");
        }

    }
?>
