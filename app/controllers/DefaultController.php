<?php

class DefaultController extends ControllerBase{
	protected $model;

    public function indexAction(){
    	$objects=call_user_func($this->model."::find");
    	$this->view->setVars(array("objects"=>$objects,"siteUrl"=>$this->url->getBaseUri(),"baseHref"=>get_class($this)));
    	$this->view->pick("main/index");
    }

}

