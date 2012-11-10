<?php

App::uses('CakeSession', 'Model/Datasource');
App::uses('BaseAuthenticate', 'Controller/Component/Auth');

class InstagramAuthenticate extends BaseAuthenticate {

	public function authenticate(CakeRequest $request, CakeResponse $response) {
		$Session = new CakeSession();
		if (!empty($_GET['error']) and $_GET['error'] == 'access_denied') {
			$Session->setFlash(__('Access denied by user'), 'flash_error');
			return false;
		}
		$redirectedURL = Instagram::$redirectURL;
		if (!empty($_GET['back_to'])) {
			$redirectedURL .= '?back_to=' . $_GET['back_to'];
		}
		$igData = Instagram::getUserData($_GET['code'], $redirectedURL);
		//pr($igData);
		if (empty($igData['user'])) {
			return false;
		}
		//pr($igData);
		$User = ClassRegistry::init('User');
		$result = $User->saveDataInstagram($igData);
		//var_dump($result);
		if (!$result) {
			return false;
		}
		$user = $User->findByInstagramId($igData['user']['id']);
		$Session->write('Auth.FrontendUser', $user['User']);
		return true;
	}

	/*
	public function authenticate(CakeRequest $request, CakeResponse $response) {
		if (empty($request['params']['named']['instagram_user_id'])) {
			return false;
		}
		$instagramId = $request['params']['named']['instagram_user_id'];
		$UserModel = ClassRegistry::init('User');
		$user = $UserModel->findByInstagramId($instagramId);
		if ($user) {

		}

		pr('auth instagram');
		$authorized = false;
		$fbId = Fb::lib()->getUser();
		if ($fbId) {
			$fbUser = Fb::lib()->api('/me');
			$UserModel = ClassRegistry::init('User');
			$user = $UserModel->findByFacebookId($fbId);
			if (empty($user)) {
				$user = $UserModel->saveFromFacebook($fbUser);
			}
			$authorized = true;
			$session = new CakeSession();
			$session->write('Auth.FrontendUser', $user['User']);
		}
		return $authorized;
	}*/


}