<?php

class VenuesController extends AppController {

	public function code() {
		if (!empty($this->data['Venue']['code'])) {
			$code = $this->data['Venue']['code'];
			if ($this->Venue->findByCode($code)) {
				$this->redirect(array('controller' => 'qualifications', 'action' => 'add', $code));
			} else {
				$this->Session->setFlash('Código no válido. Por favor, intenta nuevamente.', 'flash_error');
			}
		}
	}



}