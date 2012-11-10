<?php

class UsersController extends AppController {


	public function login() {
		if (AuthComponent::user('id')) {
			if (!empty($_GET['back_to']) and $_GET['back_to'] == 'upload') {
				$this->redirect(array('controller' => 'user_photos', 'action' => 'add', 'u' => true));
			}
			$this->redirect('/');
		}
		if ($this->request->is('post') or !empty($this->request->query['code'])) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Username and password do not match'), 'flash_error', array(), 'auth');
			}
		}
		$this->set(array('bgBlue' => true));
	}


	public function logout() {
		$this->Auth->logout();
		foreach ($this->Session->read() as $key => $value) {
			if (substr($key, 0, 3) == 'fb_') {
				$this->Session->delete($key);
			}
		}
		$this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
	}



}