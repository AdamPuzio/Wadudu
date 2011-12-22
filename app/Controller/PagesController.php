<?php
/**
 * Home controller
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
 * Home controller
 *
 * @package       wadudu
 * @subpackage    wadudu.cake.libs.controller
 */
class PagesController extends AppController {
	var $name = 'Pages';
	var $uses = array('Company');
	var $components = array('Wadudu');

	public function beforeFilter() {
		parent::beforeFilter();
	}

	public function home() {
		if(Configure::read('App.multi_company')){
			// Multi-Company, so show companies
			$this->set('Projects', false);
		}else{
			// Single Company, so show projects
			$company = $this->Wadudu->determineCompany();
			$projects = $this->Company->getProjects($company['Company']['id']);
			$this->set('Projects', $projects);
		}
	}
	
	public function display(){
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}
}
