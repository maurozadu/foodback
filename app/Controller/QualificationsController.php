<?php

class QualificationsController extends AppController {


	public function add($code) {
		if ($this->request->is('post')) {
			$this->Qualification->save($this->data);
			$this->redirect(array('controller' => 'qualifications', 'action' => 'assoc_user', $this->Qualification->id));
		}
		$venue = $this->Qualification->Venue->findByCode($code);
		if (empty($venue)) {
			throw new NotFoundException();
		}
		$this->set(compact('venue'));
	}


	public function assoc_user($id) {
		$qualification = $this->Qualification->findById($id);
	}

}