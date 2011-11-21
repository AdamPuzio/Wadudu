<?php
/**
 * Companies controller
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
 * Companies controller
 *
 * @package       wadudu
 * @subpackage    wadudu.cake.libs.controller
 */
class CompaniesController extends AppController {
	var $name = 'Companies';
	var $uses = array('Company');
	var $components = array('Wadudu');

	function beforeFilter() {
		parent::beforeFilter();
	}

	function index() {
		$company = $this->Wadudu->determineCompany();
		
		/*$companyName = $this->params['company_name'];
		print('Company Name: ' . $companyName);
		$company = $this->Company->find('first', array(
			'conditions' => array(
				'Company.name' => $companyName
			)
		));
		if(!$company){
			// Company doesn't exist
			die('We no find a company by that name');
		}*/
		pr($company);die();
	}
}
