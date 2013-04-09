<?php
App::uses('AppModel', 'Model');
/**
 * CustomerIpBlacklist Model
 *
 */
class CustomerIpBlacklist extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'customer_ip_blacklist';
	
	public $displayField = 'ip';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'customer_ip_blacklist_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'customer_ip_blacklist_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ip' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
