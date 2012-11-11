<?php

class Qualification extends AppModel {

	public $order = array('Qualification.id' => 'desc');

	public $belongsTo = array('Venue', 'Gender');

	public $validate = array(
		//'edad' => array('rule' => 'notEmpty', 'message' => 'campo requerido', ),
		'precio' => array('rule' => 'notEmpty', 'message' => 'campo requerido', ),
		'calidad' => array('rule' => 'notEmpty', 'message' => 'campo requerido', ),
		'calidad' => array('rule' => 'notEmpty', 'message' => 'campo requerido', ),
		'relacion_precio_calidad' => array('rule' => 'notEmpty', 'message' => 'campo requerido', ),
		'puntualidad' => array('rule' => 'notEmpty', 'message' => 'campo requerido', ),
		'atencion' => array('rule' => 'notEmpty', 'message' => 'campo requerido', ),
		'recomendaria' => array('rule' => 'notEmpty', 'message' => 'campo requerido', ),
		/*'email' => array(
			array('rule' => 'notEmpty', 'message' => 'campo requerido'),
			array('rule' => 'email', 'message' => 'email no válido'),
		),*/
	);

	public $brwConfig = array(
	);

}