<?php
App::uses('AppModel', 'Model');
/**
 * InformationToLayout Model
 *
 * @property Information $Information
 * @property Store $Store
 * @property Layout $Layout
 */
class InformationToLayout extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'information_to_layout';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = array('information_id', 'store_id', 'layout_id');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'information_id' => array(
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
		'layout_id' => array(
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
		'Information' => array(
			'className' => 'Information',
			'foreignKey' => 'information_id',
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
		),
		'Layout' => array(
			'className' => 'Layout',
			'foreignKey' => 'layout_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
