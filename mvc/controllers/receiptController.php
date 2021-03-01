<?php

    class ReceiptController extends BaseController{

      public function index(){
        //load Model
        $receipt_model = $this->loadModel('Receipt');

        //Savedata to view, execute function described on Model
        $this->saveData('payedProposals', $receipt_model->getPayedProposals() );

        // $this->saveData('payDay', $receipt_model->getPayDay($id) );

        //load View
        $this->loadView('receiptList');

        }// Close index function


      public function detail(){
        //load Model
        $receipt_model = $this->loadModel('receipt');

        // $this->title('Olá');

        // save data to view
        $this->saveData('receiptDetail', $receipt_model->getReceiptDetail($this->id) );

        $this->saveData('budget', $receipt_model->getTotal($this->id) );

        $receiptDetails = $receipt_model->getReceiptDetail($this->id);
        $receipt_visibility = $receiptDetails->receipt_visibility;

        if ($receipt_visibility == 1 ){
        // load View
        $this->loadView('receiptDetail','projectHeader', 'projectFooter');
        } else {
        $this->loadView('invisibleReceipt','projectHeader', 'projectFooter');
        }







      }// Close detail function

      public function visibility(){
        $receipt_model = $this->loadModel('Receipt');
        if (!empty($_POST['receipt_visibility'])) $receipt_visibility=1; else {
          $receipt_visibility=0;
        }
        $receipt_model->changeVisibility($this->id,$receipt_visibility);
        // var_dump($receipt_visibility);die();
        // Redirect
        $this->redirect('receipt');

      }


    }// Close home controller


 ?>
