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
