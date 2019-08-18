<?php

    class HomeController extends BaseController{

      public function index(){
        //load Model
        $proposal_model = $this->loadModel('proposal');

        //Savedata to view, execute function described on Model
        $this->saveData('proposals', $proposal_model->getProposals() );

        //load View
        $this->loadView('propostas');

      }// Close index function

      public function detail(){

      }// Close detail function

    }// Close home controller


 ?>
