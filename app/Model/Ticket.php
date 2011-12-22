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
		'Comment' => array(
			'conditions' => array('Comment.deleted' => null)
		)
		, 'Tag' => array(
			'conditions' => array('Tag.deleted' => null)
		)
	);
	
/**
 * belongsTo Associations
 * 
 * @var array
 * @access public
 */	
	var $belongsTo = array(
		'Project'
		, 'TicketState'
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
	
	public function getTicket($id){
		$conditions = array(
			'Ticket.id' => $id
			//, 'Ticket.project_id' => $Project['Project']['id']
		);
		$ticket = $this->find('first', array(
			'conditions' => $conditions
			, 'contain' => array(
				'Reporter', 'Assignee', 'Project', 'TicketType'
				, 'Comment' => array('User')
			)
		));
		return $ticket;
	}
	
	public function parseRequest($id, $data, $named){
		$errors = array();
		$this->User = ClassRegistry::init('User');
		$userId = $this->User->UserId;
		foreach($data as $key => $value){
			switch($key){
				case 'comment':
					$this->addComment($id, $userId, $value);
					break;
				case 'tags':
					$this->addTags($id, $userId, $value);
					break;
			}
		}
		
		foreach($named as $key => $value){
			switch($key){
				case 'tag':
					$this->removeTag($id, $userId, $value);
					break;
			}
		}
		
		return array('success' => empty($errors), 'errors' => $errors);
	}
	
	public function addComment($ticketId, $userId, $comment){
		$this->Comment->create();
		$this->Comment->save(array('Comment' => array(
			'user_id' => $userId
			, 'ticket_id' => $ticketId
			, 'comment' => $comment
		)));
	}
	
	public function addTags($ticketId, $userId, $tags){
		$tags = explode(',', $tags);
		foreach($tags as $tag){
			$this->addTag($ticketId, $userId, $tag);
		}
	}
	
	public function addTag($ticketId, $userId, $tag){
		$value = trim($tag);
		$name = 'Tag';
		if(strstr($value, ':')){
			list($name, $value) = explode($value);
		}
		$name = trim($name);
		$value = trim($value);
		$this->Tag->create();
		$save = $this->Tag->save(array('Tag' => array(
			'ticket_id' => $ticketId
			, 'user_id' => $userId
			, 'name' => $name
			, 'value' => $value
		)));
	}
	
	public function removeTag($ticketId, $userId, $tagId){
		$tag = $this->Tag->find('first', array(
			'conditions' => array(
				'Tag.ticket_id' => $ticketId
				, 'Tag.id' => $tagId
			)
		));
		if(!$tag){
			return false;
		}

		$this->Tag->delete($tag['Tag']['id']);
	}
}