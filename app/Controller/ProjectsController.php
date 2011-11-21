<?php
/**
 * Projects controller
 *
 * Wadudu
 * Copyright 2011
 *
 * @copyright     Copyright 2011
 * @link          http://adam.puzio.me
 * @package       wadudu
 * @subpackage    wadudu.cake.libs.controller
 */

/**
 * Projects controller
 *
 * @package       wadudu
 * @subpackage    wadudu.cake.libs.controller
 */
class ProjectsController extends AppController {
	var $name = 'Projects';
	var $uses = array('Project');	// No Model
	var $components = array('Wadudu');

	public function beforeFilter() {
		parent::beforeFilter();
	}

	public function index() {
		$company = $this->Wadudu->determineCompany();
		$projectCode = $this->request->params['project_name'];
		$project = $this->Project->find('first', array(
			'conditions' => array(
				'Project.code' => $projectCode
			)
			, 'contain' => array()
		));
		if(!$project){
			// Trigger Error
			die('Cannot find a project "' . $projectCode . '"');
		}
		$this->set('Company', $company);
		$this->set('ProjectCode', $projectCode);
		$this->set('Project', $project);
	}
	
	public function _findCompanyByField($field, $value){
		$company = $this->Project->Company->find('first', array(
			'conditions' => array('Company.' . $field => $value)
		));
		return $company;
	}
}
