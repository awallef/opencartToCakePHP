<?php
App::uses('AppModel', 'Model');
/**
 * TaxRateToCustomerGroup Model
 *
 * @property TaxRate $TaxRate
 * @property CustomerGroup $CustomerGroup
 */
class TaxRateToCustomerGroup extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'tax_rate_to_customer_group';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = array('tax_rate_id','customer_group_id');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'tax_rate_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'customer_group_id' => array(
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
		'TaxRate' => array(
			'className' => 'TaxRate',
			'foreignKey' => 'tax_rate_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CustomerGroup' => array(
			'className' => 'CustomerGroup',
			'foreignKey' => 'customer_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
