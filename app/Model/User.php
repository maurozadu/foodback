<?php

class User extends AppModel {

	//public $hasMany = array('Qualification');

	public $order = 'User.id desc';

	public $belongsTo = array('Gender');

	public $displayField = 'full_name';

	public $brwConfig = array(
		'fields' => array(
			'no_add' => array(
				'facebook_id',
			),
			'no_edit' => array(
				'facebook_id',
			),
			'legends' => array(
				'password' => 'Dejar en blanco para no cambiar',
			),
			'names' => array(
				'facebook_id' => 'Facebook ID',
			),
			'filter' => array(
				'email',
			),
		),
		'paginate' => array(
			'fields' => array('id', 'full_name', 'email'),
			//'images' => array('profile'),
		),
		'images' => array(
			'profile' => array(
				'name_category' => 'Profile picture',
				'sizes' => array('35x35', '174x174'),
				'description' => false,
				'index' => true
			),
		),
	);


	public $validate = array(
		'email' => array(
			'rule' => 'isUnique',
			'message' => 'Email already registered',
		),
	);

	public function beforeValidate($options = array()) {
		if (empty($this->data['User']['password'])) {
			unset($this->data['User']['password']);
		} else {
			$this->data['User']['password'] = Security::hash($this->data['User']['password'], null, true);
		}
		return parent::beforeValidate($options);
	}


	public function saveFromFacebook($fbData) {
		$data = array(
			'facebook_id' => $fbData['id'],
			'full_name' => trim(
				(!empty($fbData['first_name']) ? $fbData['first_name'] : '')
				. ' ' .
				(!empty($fbData['last_name']) ? $fbData['last_name'] : '')
			),
		);
		$fbFields = array('first_name', 'last_name', 'timezone', 'locale', 'email');
		foreach ($fbFields as $fbField) {
			if (!empty($fbData[$fbField])) {
				$data[$fbField] = $fbData[$fbField];
			}
		}
		if (!empty($fbData['gender'])) {
			$data['gender_id'] = ($fbData['gender'] == 'male') ? MALE : FEMALE;
		}
		$user = $this->findByEmail($fbData['email']);
		if ($user) {
			$data['id'] = $user['User']['id'];
		} else {
			$data['password'] = base_convert(uniqid(), 16, 36);
		}
		return $this->save($data);
	}


	public function get($id) {
		return $this->find('first', array(
			'conditions' => array('User.id' => $id),
			'contain' => array(
				'BrwImage',
				'Gender',
			)
		));
	}


	public function brwBeforeEdit($data) {
		if (!empty($data['User']['password'])) {
			$data['User']['password'] = '';
		}
		return $data;
	}


	public function getAll() {
		return $this->find('all', array(
			//'conditions' => array(),
		));
	}



}