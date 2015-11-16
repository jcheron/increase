<?php
class BaseModel extends \Phalcon\Mvc\Model{
	public function __toString(){
		return $this->toString();
	}
}