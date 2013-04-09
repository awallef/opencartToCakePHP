<?php
App::uses('AppModel', 'Model');
/**
 * AttributeGroup Model
 *
 * @property Attribute $Attribute
 */
class AttributeGroup extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'attribute_group';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'attribute_group_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Attribute' => array(
			'className' => 'Attribute',
			'foreignKey' => 'attribute_group_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
