<?php
App::uses('AppModel', 'Model');
/**
 * TaxRule Model
 *
 * @property TaxClass $TaxClass
 * @property TaxRate $TaxRate
 */
class TaxRule extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'tax_rule';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'tax_rule_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'tax_rule_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tax_class_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
		'based' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'priority' => array(
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
		'TaxClass' => array(
			'className' => 'TaxClass',
			'foreignKey' => 'tax_class_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TaxRate' => array(
			'className' => 'TaxRate',
			'foreignKey' => 'tax_rate_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
