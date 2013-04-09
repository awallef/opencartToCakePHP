<?php
App::uses('AppModel', 'Model');
/**
 * UrlAlias Model
 *
 */
class UrlAlias extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'url_alias';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'url_alias_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'url_alias_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'query' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'keyword' => array(
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
