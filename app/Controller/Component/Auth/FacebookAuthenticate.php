<?php

App::uses('CakeSession', 'Model/Datasource');
App::uses('BaseAuthenticate', 'Controller/Component/Auth');

class FacebookAuthenticate extends BaseAuthenticate {

	public function authenticate(CakeRequest $request, CakeResponse $response) {
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
	}


}