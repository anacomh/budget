<?php

    class ProposalsController extends BaseController{

      public function index(){
        //load Model
        $proposal_model = $this->loadModel('proposal');

        //Savedata to view, execute function described on Model
        $this->saveData('proposals', $proposal_model->getProposals() );

        //load View
        $this->loadView('propostas');

      }// Close index function

      public function detail(){
        //Load proposal model
        $proposal_model = $this->loadModel('proposal');

        //Send data to view
        $this->saveData('proposal', $proposal_model->getDetail($this->id) );

        //Send data to view
        $this->saveData('plans', $proposal_model->getPlaning($this->id) );

        //Send data to view
        $this->saveData('budget', $proposal_model->getBudget($this->id) );

        //Send data to view
        $this->saveData('clients', $proposal_model->getAllClients() );

        //load View
        $this->loadView('proposalDetail');
      }

      public function visibility(){
        $proposal_model = $this->loadModel('proposal');

        if (!empty($_POST['prop_visibility'])) $prop_visibility=1; else {
          $prop_visibility=0;
        }

        $proposal_model->changeVisibility($this->id,$prop_visibility);

          // Redirect
          $this->redirect('proposals');

      }

      public function payment(){
        $proposal_model = $this->loadModel('proposal');

        if (!empty($_POST['prop_pay'])) $prop_pay=1; else {
          $prop_pay=0;
        }

        $proposal_model->changePayment($this->id,$prop_pay);

          // Redirect
          $this->redirect('proposals');

      }


      public function update(){
        //Load proposal model
        $proposal_model = $this->loadModel('proposal');

        $prop_visibility = 0;
        if(isset($_POST['prop-visibility'])){
            $prop_visibility = 1;
        }

        $prop_pay = 0;
        if(isset($_POST['prop-pay'])){
            $prop_pay = 1;
        }

        $proposal_model->update($this->id,
                                $_POST['prop-name'],
                                $_POST['prop-text'],
                                $_POST['prop-local'],
                                $prop_visibility,
                                $prop_pay,
                                $_POST['client-id'],
                                $_POST['time-new-time'],
                                $_POST['planing-topic'],
                                $_POST['budget-prod'],
                                $_POST['budget-price']
                                );
        $this->redirect('proposals/detail/'.$this->id);
      }

      public function create(){

        //Load proposal model
        $proposal_model = $this->loadModel('proposal');
        //Create new book in DB
        $new_id = $proposal_model->create();
        //Redirect to detail page
        $this->redirect('proposals/detail/'.$new_id);
      }

      public function trash(){
        //Load books model
        $proposal_model = $this->loadModel('proposal');
        //update database
        $proposal_model->trash( $this->id );
        //Redirect
        $this->redirect('proposals');
      }





    }// Close Proposal controller


 ?>
