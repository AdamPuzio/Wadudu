<?php
/**
 * Company Model
 *
 * Wadudu
 * Copyright 2011
 *
 * @copyright     Copyright 2011
 * @link          http://adam.puzio.me
 * @package       wadudu
 * @subpackage    wadudu.cake.libs.model
 */

/**
 * Company Model
 *
 * @package       wadudu
 * @subpackage    wadudu.cake.libs.model
 */
class Company extends AppModel {
/**
 * Name
 * 
 * @var string
 * @access public
 */
	var $name = 'Company';
	
/*
* Associations
*/
/**
 * HasMany Associations
 * 
 * @var array
 * @access public
 */	
	var $hasMany = array(
		'Project' => array(
			'conditions' => array('Project.deleted' => null)
		)
	);
	
/**
 * belongsTo Associations
 * 
 * @var array
 * @access public
 */	
	var $belongsTo = array(
		
	);
	
/**
 * HABTM Associations
 * 
 * @var array
 * @access public
 */	
	var $hasAndBelongsToMany = array(
		
	);
	
/**
 * Validation
 * 
 * @var array
 * @access public
 */	
	var $validate = array(
		
	);
	
	public function getProjects($companyId){
		$projects = $this->Project->find('all', array(
			'conditions' => array(
				'Project.company_id' => $companyId
			)
			, 'contain' => array(
			
			)
		));
		return $projects;
	}
}
