<?php
/**
 * TicketType Model
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
 * TicketType Model
 *
 * @package       wadudu
 * @subpackage    wadudu.cake.libs.model
 */
class TicketType extends AppModel {
/**
 * Name
 * 
 * @var string
 * @access public
 */
	var $name = 'TicketType';
	
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
		'Ticket'
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
}
