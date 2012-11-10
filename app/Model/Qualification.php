<?php

class Qualification extends AppModel {

	public $order = array('Qualification.id' => 'desc');

	public $belongsTo = array('Venue', 'Gender');

	public $validate = array(
		'edad' => array(
			'rule' => 'notEmpty', 'message' => 'campo requerido',
		),
		'lo_mejor' => array(
			'rule' => 'notEmpty', 'message' => 'campo requerido',
		),
		'lo_peor' => array(
			'rule' => 'notEmpty', 'message' => 'campo requerido',
		),
		'gender_id' => array(
			'rule' => 'notEmpty', 'message' => 'campo requerido',
		),
		'email' => array(
			array('rule' => 'notEmpty', 'message' => 'campo requerido'),
			array('rule' => 'email', 'message' => 'email no válido'),
		),
	);


}