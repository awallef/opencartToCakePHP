<?php
App::uses('AppModel', 'Model');
/**
 * VoucherTheme Model
 *
 */
class VoucherTheme extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'voucher_theme';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'voucher_theme_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'voucher_theme_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'image' => array(
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
