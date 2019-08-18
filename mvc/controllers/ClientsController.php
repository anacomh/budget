<?php

    class ClientsController extends BaseController{

      public function index(){
        //load Model
        $clients_model = $this->loadModel('clients');

        //Savedata to view, execute function described on Model
        $this->saveData('clients', $clients_model->getClients() );

        //load View
        $this->loadView('clients');

      }// Close index function

      public function detail(){
        //load Model
        $clients_model = $this->loadModel('clients');
        //Send data to view
        $this->saveData( 'client' , $clients_model->getClient($this->id) );
        //load View
        $this->loadView('clientdetail');
      }// Close detail function

      public function update(){
        //Load books model
        $clients_model = $this->loadModel('clients');

        //Update database
        $clients_model->update($this->id,
                            $_POST['client-name'],
                            $_POST['client-company'],
                            $_POST['client-email'],
                            $_POST['client-phone']
                          );
        //Redirect
        $this->redirect('clients/detail/'.$this->id);
      }// Close detail function

      public function create(){

        //Load proposal model
        $clients_model = $this->loadModel('clients');
        //Create new book in DB
        $new_id = $clients_model->create();
        //Redirect to detail page
        $this->redirect('clients/detail/'.$new_id);
      }

      public function trash(){
        //Load books model
        $clients_model = $this->loadModel('clients');
        //update database
        $clients_model->trash( $this->id );
        //Redirect
        $this->redirect('clients');
      }


    }// Close home controller


 ?>
