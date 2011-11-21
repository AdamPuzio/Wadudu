<?php
/**
 * Issues controller
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
 * Issues controller
 *
 * @package       wadudu
 * @subpackage    wadudu.cake.libs.controller
 */
class IssuesController extends AppController {
	var $name = 'Issues';
	var $uses = array();	// No Model
	var $components = array('Wadudu');

	function beforeFilter() {
		die('NO ISSUES');
		parent::beforeFilter();
	}

	function index() {
		$companyName = $this->params['company_name'];
		$projectName = $this->params['project_name'];
		die("Company Name: $companyName<br />Project Name: $projectName");
	}
}
