<?php

class UsersController extends DefaultController{
	public function initialize(){
		parent::initialize();
		$this->model="User";
	}

	public function frmAction($id=NULL){
		$user=$this->getInstance($id);
		$this->view->setVars(array("user"=>$user,"siteUrl"=>$this->url->getBaseUri()));
	}
}

