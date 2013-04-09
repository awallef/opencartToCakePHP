<?php
App::uses('AppModel', 'Model');
/**
 * ProductRelated Model
 *
 * @property Product $Product
 * @property Related $Related
 */
class ProductRelated extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'product_related';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = array('product_id','related_id');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'product_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'related_id' => array(
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
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Related' => array(
			'className' => 'Product',
			'foreignKey' => 'related_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
