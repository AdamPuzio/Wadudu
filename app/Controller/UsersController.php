<?php
// app/Controller/UsersController.php
class UsersController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();
	}
	
	public function login() {
		Security::setHash('md5');
		$username = '';
		$password = '';
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash($this->Auth->authError);
				$username = $this->request->data['User']['username'];
				$password = $this->request->data['User']['password'];
			}
		}
		$this->set('username', $username);
		$this->set('password', $password);
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}
	
}