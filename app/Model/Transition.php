<?php
/**
 * Transition Model
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
 * Transition Model
 *
 * @package       wadudu
 * @subpackage    wadudu.cake.libs.model
 */
class Transition extends AppModel {
/**
 * Name
 * 
 * @var string
 * @access public
 */
	var $name = 'Transition';
	
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
		'TicketState'
		, 'TransitionTo' => array(
			'className' => 'TicketState'
			, 'foreignKey' => 'transition_to_id'
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
