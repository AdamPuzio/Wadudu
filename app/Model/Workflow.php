<?php
/**
 * Workflow Model
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
 * Workflow Model
 *
 * @package       wadudu
 * @subpackage    wadudu.cake.libs.model
 */
class Workflow extends AppModel {
/**
 * Name
 * 
 * @var string
 * @access public
 */
	var $name = 'Workflow';
	
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
		'Company'
	);
	
/**
 * HABTM Associations
 * 
 * @var array
 * @access public
 */	
	var $hasAndBelongsToMany = array(
		'TicketType'
	);
	
/**
 * Validation
 * 
 * @var array
 * @access public
 */	
	var $validate = array(
		
	);
	
	public function getById($id){
		$workflow = $this->find('first', array(
			'conditions' => array(
				'Workflow.id' => $id				
			)
			, 'contain' => array(
				'TicketType' => array(
					'TicketState' => array(
						'Status'
						, 'Transition' => array('TransitionTo')
					)
				)
			)
		));
		return $workflow;
	}
	
	public function getSummary($id){
		$workflow = $this->getById($id);
		$ticketTypes = array();
		foreach($workflow['TicketType'] as $ticketType){
			$ttId = $ticketType['TicketTypesWorkflow']['id'];
			$name = $ticketType['TicketTypesWorkflow']['name'];
			$tt = array(
				'id' => $ttId
				, 'name' => $name
				, 'ticket_type_id' => $ticketType['id']
				, 'ticket_type_name' => $ticketType['name']
				, 'states' => array()
			);
			foreach($ticketType['TicketState'] as $ticketState){
				$state = array(
					'id' => $ticketState['id']
					, 'name' => $ticketState['name']
					, 'status' => $ticketState['Status']['name']
					, 'transitions' => array()
				);
				foreach($ticketState['Transition'] as $transition){
					$trans = array(
						'id' => $transition['id']
						, 'name' => $transition['name']
						, 'transition_to_id' => $transition['transition_to_id']
					);
					$state['transitions'][] = $trans;
				}
				$tt['states'][$ticketState['id']] = $state;
			}
			
			$ticketTypes[$ttId] = $tt;
		}
		return $ticketTypes;
	}
}
