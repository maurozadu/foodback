<?php

class Venue extends AppModel {

	public $hasMany = array('Qualification');


	public function getByCode($code) {
		$realCode = $code[0];
		return $this->findByCode($realCode);
	}


}