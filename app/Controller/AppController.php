<?php
// app/Controller/AppController.php
class AppController extends Controller {
    
	public $components = array(
		'Session'
		, 'Auth' => array(
			'loginAction' => array('controller' => 'users', 'action' => 'login')
			, 'loginRedirect' => array('controller' => 'pages', 'action' => 'display', 'home')
			, 'logoutRedirect' => array('controller' => 'users', 'action' => 'login')
			, 'authError' => 'Invalid email/password combination'
			, 'authenticate' => array('BluePrint')
		)
	);

	public function beforeFilter() {
		parent::beforeFilter();
		$this->User = ClassRegistry::init('User');
		$this->User->UserId = $this->UserId = $this->Auth->User('id');
	}
    
}