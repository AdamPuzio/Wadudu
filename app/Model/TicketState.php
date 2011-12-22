<?php
/**
 * TicketState Model
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
 * TicketState Model
 *
 * @package       wadudu
 * @subpackage    wadudu.cake.libs.model
 */
class TicketState extends AppModel {
/**
 * Name
 * 
 * @var string
 * @access public
 */
	var $name = 'TicketState';
	
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
		'Transition'
	);
	
/**
 * belongsTo Associations
 * 
 * @var array
 * @access public
 */	
	var $belongsTo = array(
		'Status' => array(
			//'conditions' => array('Status.deleted' => null)
		)
		, 'TicketType'
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
}
