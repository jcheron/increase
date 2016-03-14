<?php

class IndexController extends ControllerBase
{

    public function indexAction(){
    	$this->view->setVar("infoUser",Auth::getInfoUser($this));
    	$this->jquery->getOnClick("a.btn","","#content",array("attr"=>"data-ajax"));
    	$this->jquery->compile($this->view);
    }
}

