<?php
/**
 * Wadudu Component
 *
 * Wadudu
 * Copyright 2011
 *
 * @copyright     Copyright 2011
 * @link          http://adam.puzio.me
 * @package       wadudu
 * @subpackage    wadudu.cake.libs.component
 */

/**
 * Wadudu controller
 *
 * @package       wadudu
 * @subpackage    wadudu.cake.libs.component
 */
class WaduduComponent extends Component {
	var $components = array();
	
	public function initialize(&$controller, $settings=array()){
		$this->controller = $controller;
		$this->Company = ClassRegistry::init('Company');
	}
	
	public function determineCompany(){
		if(Configure::read('App.multi_company')){
			$field = 'name';
			$value = $this->controller->params['company_name'];
		}else{
			$field = 'id';
			$value = Configure::read('App.default_company');
		}
		$company = $this->Company->find('first', array(
			'conditions' => array('Company.' . $field => $value)
			, 'contain' => array()
		));
		return $company;
	}
	
	public function determineProject(){
		$projectName = $this->controller->params['project_name'];
		$company = $this->determineCompany();
		$projectName = $this->controller->params['project_name'];
		$project = $this->Company->Project->find('first', array(
			'conditions' => array(
				'Project.code' => $projectName
				, 'Project.company_id' => $company['Company']['id']
			)
			, 'contain' => array()
		));
		return $project;
	}
}