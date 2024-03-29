<?php
/**
 * Project Model
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
 * Project Model
 *
 * @package       wadudu
 * @subpackage    wadudu.cake.libs.model
 */
class Project extends AppModel {
/**
 * Name
 * 
 * @var string
 * @access public
 */
	var $name = 'Project';
	
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
		'Ticket' => array(
			'conditions' => array('Ticket.deleted' => null)
		)
	);
	
/**
 * belongsTo Associations
 * 
 * @var array
 * @access public
 */	
	var $belongsTo = array(
		'Company'
		, 'Workflow'
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
	
	public function getTickets($projectId, $params=array()){
		$conditions = array(
			'Ticket.project_id' => $projectId
		);
		$limit = 100;
		$tickets = $this->Ticket->find('all', array(
			'conditions' => $conditions
			, 'contain' => array()
			, 'limit' => $limit
		));
		return $tickets;
	}
	
	public function getWorkflow($projectId){
		$this->id = $projectId;
		$workflowId = $this->field('workflow_id');
		return $this->Workflow->getById($workflowId);
	}
}
