<?php
/**
 * Class that treats the contents of the proposal in 3 groups:
 * 1) the group where you can execute the "getSingleRow" function and
 * 2) the two groups where you need to perform a "Foreach", and therefore use the "getRows" function.
 * The first group contains the information in the proposal table + clients, and the second and third group
 * contains the information in the Planning and Budget table.
 */

class ProjectController extends BaseController {

  public function detail(){

    //Load proposal model
    $project_model= $this->loadModel('project');

    // Receive client id to be able to do the getMainDetails query on Model
    $client = $project_model->getClientId($this->id);
    // Get proper column of the row
    $client_id = $client->prop_client_id;

    //Send data to view
    $this->saveData('mainDetails', $project_model->getMainDetails($this->id,$client_id) );
    $this->saveData('planing', $project_model->getPlaning($this->id) );
    $this->saveData('budget', $project_model->getBudget($this->id) );
    // var_dump($moreDetails);

    // Select the view
    // Receive prop-visibility
    $propDetails = $project_model->getMainDetails($this->id,$client_id);
    $visibility = $propDetails->prop_visibility;
    if ($visibility == 1 ){
    $this->loadView('project','projectHeader', 'projectFooter');
  } else {
    $this->loadView('invisibleProject','projectHeader', 'projectFooter');
  }

  }

}
