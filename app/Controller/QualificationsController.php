<?php

class QualificationsController extends AppController {


	public function add($code) {
		if ($this->request->is('post')) {
			if ($this->Qualification->save($this->data)) {
				$this->Session->setFlash('Tu opinión fue registrada correctamente', 'flash_success');
				$this->redirect(array('controller' => 'qualifications', 'action' => 'assoc_user', $this->Qualification->id));
			} else {
				$this->Session->setFlash('No enviado. Revisar errores a continuación', 'flash_error');
			}
		}
		$venue = $this->Qualification->Venue->getByCode($code);
		if (empty($venue)) {
			throw new NotFoundException();
		}
		$this->set(compact('venue', 'code'));
	}


	public function assoc_user($id) {
		if ($this->request->is('post')) {
			if ($this->Qualification->save($this->data)) {
				$this->redirect(array('controller' => 'pages', 'action' => 'display', 'gracias'));
			}
		}

		$qualification = $this->Qualification->find('first', array(
			'conditions' => array('Qualification.id' => $id),
			'contain' => array('Venue'),
		));
		$genders = $this->Qualification->Gender->find('list');
		$this->set(compact('qualification', 'genders'));

	}

}