<?php
/**
 * Comment Model
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
 * Comment Model
 *
 * @package       wadudu
 * @subpackage    wadudu.cake.libs.model
 */
class Comment extends AppModel {
/**
 * Name
 * 
 * @var string
 * @access public
 */
	var $name = 'Comment';
	
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
		'Ticket'
		, 'User'
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
