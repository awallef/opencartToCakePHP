<?php
App::uses('AppModel', 'Model');
/**
 * Attribute Model
 *
 * @property AttributeGroup $AttributeGroup
 */
class Attribute extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'attribute';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'attribute_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'attribute_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'attribute_group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sort_order' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'AttributeGroup' => array(
			'className' => 'AttributeGroup',
			'foreignKey' => 'attribute_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
