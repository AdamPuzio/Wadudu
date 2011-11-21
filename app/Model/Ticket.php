<?php
/**
 * Ticket Model
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
 * Ticket Model
 *
 * @package       wadudu
 * @subpackage    wadudu.cake.libs.model
 */
class Ticket extends AppModel {
/**
 * Name
 * 
 * @var string
 * @access public
 */
	var $name = 'Ticket';
	
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
		
	);
	
/**
 * belongsTo Associations
 * 
 * @var array
 * @access public
 */	
	var $belongsTo = array(
		'Project'
		, 'TicketType'
		, 'Reporter' => array(
			'className' => 'User'
			, 'foreignKey' => 'reporter_id'
		)
		, 'Assignee' => array(
			'className' => 'User'
			, 'foreignKey' => 'assignee_id'
		)
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
}
