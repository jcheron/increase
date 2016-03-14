<?php
use Ajax\Jquery;
use Ajax\JsUtils;
/**
 * Classe de gestion de l'authentification
 * @author jcheron
 * @version 1.1
 * @package increase.my
 */
class Auth {
	/**
	 * Retourne l'utilisateur actuellement connecté<br>
	 * ou NULL si personne ne l'est
	 * @return User
	 */
	public static function getUser($controller){
		$session=$controller->session;
		$user=null;
		if($session->has("activeUser"))
			$user=$session->get("activeUser");
		return $user;
	}

	/**
	 * Retourne vrai si un utilisateur est connecté
	 * @return boolean
	 */
	public static function isAuth($controller){
		return null!==self::getUser($controller);
	}

	/**
	 * Retourne vrai si un utilisateur de type administrateur est connecté<br>
	 * Faux si l'utilisateur connecté n'est pas admin ou si personne n'est connecté
	 * @return boolean
	 */
	public static function isAdmin($controller){
		$user=self::getUser($controller);
		if($user instanceof User){
			return stripos($user->getRole(),"admin")!==false;
		}else{
			return false;
		}
	}

	/**
	 * Retourne la zone d'information au format HTML affichant l'utilisateur connecté<br>
	 * ou les boutons de connexion si personne n'est connecté
	 * @return string
	 */
	public static function getInfoUser($controller, $style="primary"){
		$jquery=$controller->jquery;
		$user=self::getUser($controller);
		if(isset($user)){
			$bt=$jquery->bootstrap()->htmlButton("btDisconnect","Déconnexion");
			$bt->addLabel($user);
			$bt->getOnClick("Auth/disconnect","#divInfoUser");
		}else{
			$bt=$jquery->bootstrap()->htmlButton("btConnect","Connexion en tant qu'user");
			$bt->getOnClick("Auth/connectAsUser","#divInfoUser");
		}
		return $bt;
	}
}