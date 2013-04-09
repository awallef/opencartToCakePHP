<?php
App::uses('AppModel', 'Model');
/**
 * ProductToDownload Model
 *
 * @property Product $Product
 * @property Download $Download
 */
class ProductToDownload extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'product_to_download';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = array('product_id','download_id');

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
		'download_id' => array(
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
		'Download' => array(
			'className' => 'Download',
			'foreignKey' => 'download_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
