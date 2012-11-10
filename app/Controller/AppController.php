<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $uses = array('User');

 	public $components= array(
		'Session',
	    'Auth',
		'Brownie.BrwPanel',
		'DebugKit.Toolbar',
	);


	public function beforeFilter() {
		if (empty($this->params['plugin'])) {
			$this->_customAuthSettings();
			$this->_denyUserByPrefix();
			$this->_setLoginURLs();
			$this->_setCurrentUser();
		}
	}


	public function _customAuthSettings() {
		if (
			empty($this->request->params['brw'])
			and
			empty($this->request->params['plugin'])
		) {
			AuthComponent::$sessionKey = 'Auth.FrontendUser';
			$this->Auth->authorize = array('Controller');
			$this->Auth->authenticate = array(
				AuthComponent::ALL => array(
					'userModel' => 'User',
					'fields' => array('username' => 'email'),
				),
				'Form',
				'Facebook',
				'Instagram',
			);
			$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'u' => false);
			$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
			$this->Auth->loginRedirect = '/';
			$this->Auth->authError = 'Please login to access';
			$this->Auth->allow('*');
		}
	}

	public function _denyUserByPrefix() {
		if (!empty($this->request->params['prefix']) and $this->request->params['prefix'] == 'u') {
			$this->Auth->deny('*');
		}
	}


	public function beforeRender() {
		$this->_setTitle();
		$this->_setLogoutUrl();
	}


	public function _setTitle() {
		if (!empty($this->pageTitle)) {
			$this->pageTitle .= ' - ';
		}
		$this->pageTitle .= 'dotspin';
		$this->set('title_for_layout', $this->pageTitle);
	}


	public function _setLogoutUrl() {
		$logoutUrl = array('controller' => 'users', 'action' => 'logout');
		$this->set('logoutUrl', $logoutUrl);
	}


	public function isAuthorized() {
		return (AuthComponent::user('id')) ? true : false;
	}



	public function _setLoginURLs() {
		$this->set(array(
			'fbLoginUrl' => Fb::lib()->getLoginUrl(array(
				'scope' => array('email', 'user_photos'),
				'redirect_uri' => 'http://' . env('HTTP_HOST') . Router::url(array('controller' => 'users', 'action' => 'login'))
			)),
		));
	}


	public function _setCurrentUser() {
		$this->authUser = $this->User->get(AuthComponent::user('id'));
		$this->set('authUser', $this->authUser);
	}



}
