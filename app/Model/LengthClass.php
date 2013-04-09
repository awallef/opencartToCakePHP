<?php
App::uses('AppModel', 'Model');
/**
 * LengthClass Model
 *
 * @property Product $Product
 */
class LengthClass extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'length_class';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'length_class_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'length_class_id' => array(
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
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'length_class_id',
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
