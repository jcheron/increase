<?php
class AuthController extends ControllerBase {

	public function initialize(){
		if($this->request->isAjax()){
			$this->view->disable();
		}
	}

	public function indexAction(){
		echo Auth::getInfoUser($this);
		echo $this->jquery->compile($this->view);
	}

	/**
	 * Déconnecte l'utilisateur actuel
	 */
	public function disconnectAction(){
		$this->session->remove("activeUser");
		$this->session->destroy();
		$this->dispatcher->forward(array("controller"=>"Auth","action"=>"index"));
	}

	public function connectAsUserAction(){
		$user=User::findFirst("role like '%user%'");
		$this->session->set("activeUser",$user);
		$this->dispatcher->forward(array("controller"=>"Auth","action"=>"index"));
	}


}