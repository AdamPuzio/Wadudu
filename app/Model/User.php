<?php
// app/Model/User.php
class User extends AppModel {
	public $name = 'User';
	public $validate = array(
		'username' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'A username is required'
			)
		)
		, 'email' => array(
			'required' => array(
				'rule' => array('notEmpty')
				, 'message' => 'An email address is required'
			)
		)
		, 'password' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'A password is required'
			)
		)
	);
	

	public function beforeSave() {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = Security::hash($this->data[$this->alias]['password']);
		}
		return true;
	}
	
	function hashPasswords($data){
		if(isset($this->data[$this->alias]['password'])){
			$this->data[$this->alias]['password']= Security::hash($this->data[$this->alias]['password']);
			return $data;
		}
		return $data;
	}
}