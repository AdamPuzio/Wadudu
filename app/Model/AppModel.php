<?php
/**
 * App Model
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
 * App Model
 *
 * @package       wadudu
 * @subpackage    wadudu.cake.libs.model
 */
class AppModel extends Model {
	
	public $actsAs = array('Containable');
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
		
	public function delete($id=null, $cascade=true){
		if(!empty($id)){
			$this->id = $id;
		}
		if($this->hasField('deleted')){
			if($this->beforeDelete($cascade)){
				$filters = $this->Behaviors->trigger(
					'beforeDelete',
					array(&$this, $cascade),
					array('break' => true, 'breakOn' => array(false, null))
				);
				if (!$filters || !$this->exists()) {
					return false;
				}

				// Soft Delete
				$this->id = $id;
				if($this->exists() && !$this->field('deleted')){
					$set_value = null;
					switch ($this->getColumnType('deleted')){
						case 'datetime':
							$set_value = date("Y-m-d H:i:s");
							break;
						case 'boolean':
							$set_value = 1;
							break;
						case 'integer':
							$set_value = time();
							break;
					}				
					
					if($this->saveField('deleted', $set_value)){
						$this->Behaviors->trigger($this, 'afterDelete');
						$this->afterDelete();
						$this->_clearCache();
						$this->id = false;
						return true;
					}
				}
			}
		}else{
			return parent::delete($id, $cascade);
		}
		return false;
	}
}
