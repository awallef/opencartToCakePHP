<?php
App::uses('AppModel', 'Model');
/**
 * Option Model
 *
 */
class Option extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'option';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'option_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'type';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'option_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
}
