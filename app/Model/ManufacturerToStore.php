<?php
App::uses('AppModel', 'Model');
/**
 * ManufacturerToStore Model
 *
 * @property Manufacturer $Manufacturer
 * @property Store $Store
 */
class ManufacturerToStore extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'manufacturer_to_store';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = array('manufacturer_id','store_id');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'manufacturer_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'store_id' => array(
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
		'Manufacturer' => array(
			'className' => 'Manufacturer',
			'foreignKey' => 'manufacturer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Store' => array(
			'className' => 'Store',
			'foreignKey' => 'store_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
