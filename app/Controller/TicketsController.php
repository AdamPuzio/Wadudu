<?php
/**
 * Tickets controller
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
 * Tickets controller
 *
 * @package       wadudu
 * @subpackage    wadudu.cake.libs.controller
 */
class TicketsController extends AppController {
	var $name = 'Tickets';
	var $uses = array();	// No Model
	var $components = array('Wadudu');

	function beforeFilter() {
		parent::beforeFilter();
	}

	function index() {
		//$companyName = $this->params['company_name'];
		$Company = $this->Wadudu->determineCompany();
		$projectName = $this->params['project_name'];
		$Project = $this->Wadudu->determineProject();
		//die("Company Name: $companyName<br />Project Name: $projectName");
		$this->set(compact('projectName', 'Company', 'Project'));
	}
}
