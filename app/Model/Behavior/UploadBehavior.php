<?php

/**
 * Upload behavior class.
 * PHP 5
 * Uploads file on server HD in app/webroot dir on specified folder
 * 
 *
 * 3XW Sàrl :  (http://www.3xw.ch)
 * Copyright 2012-2013, 3XW Sàrl.
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 * 
 * USEAGE:
 * 
 * {{{
 * public $actsAs = array(
 * 
 *   'Upload' => array(
 * 
 *     'file_field' => 'media', // requiered: name of the field
 * 
 *     'base' => 'files', // optional: base folder for upload ( here: app/webroot/files ) 
 * 
 *     'maxsize' => 10 * 1000 * 1024 * 1024, // optional: here: 10MB in octet
 * 
 *     'path' => '{$year}{DS}{$month}', // optional: you can choose between '{$modelName}{DS}{$year}{DS}{$month}{DS}{$type}{DS}{$subtype}',
 * 
 *     'types' => array(
 *          'image/jpeg',
 *          'image/png',
 *          'image/gif',
 *          'application/pdf'
 *     ), // optional: allowed types here jpeg, png, gif, pdf files...
 * 
 *     'delete' => true // optional: if file needs to be removed or not
 *   )
 * );
 * }}}
 *
 * @copyright     2012-2013, 3XW Sàrl. (http://www.3xw.ch)
 * @link          http://cakephp.org CakePHP Project
 * @package       app.Model.Behavior
 * @since         CakePHP v 2.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class UploadBehavior extends ModelBehavior {

    /**
     *  $settings public var array for each models
     * 
     * @var array
     */
    public $settings = array();

    /**
     * $_fileToRemove private var boolean used by behavior to enable earase process
     * 
     * @var boolean 
     */
    private $_fileToRemove = false;

    /**
     * Initiate Upload behavior
     * 
     * Pass settings to your behavior
     * {{{
     * public $actsAs = array(
     * 
     *   'Upload' => array(
     * 
     *     'file_field' => 'media', // requiered: name of the field
     * 
     *     'base' => 'files', // optional: base folder for upload ( here: app/webroot/files ) 
     * 
     *     'maxsize' => 10 * 1000 * 1024 * 1024, // optional: here: 10MB in octet
     * 
     *     'path' => '{$year}{DS}{$month}', // optional: you can choose between '{$modelName}{DS}{$year}{DS}{$month}{DS}{$type}{DS}{$subtype}',
     * 
     *     'types' => array(
     *          'image/jpeg',
     *          'image/png',
     *          'image/gif',
     *          'application/pdf'
     *     ), // optional: allowed types here jpeg, png, gif, pdf files...
     * 
     *     'delete' => true // optional: if file needs to be removed or not
     *   )
     * );
     * }}}
     *
     * @param Model $Model instance of model
     * @param array $settings array of configuration settings. You must specify a file_field value
     * @return void
     * @throws Exception throws exception if file_field is not defined in $settings array
     */
    public function setup(&$model, $settings) {

        if (!isset($this->settings[$model->alias])) {

            $this->settings[$model->alias] = array(
                'base' => 'scenes',
                'maxsize' => 10 * 1000 * 1024 * 1024, // 10MB in octet
                'path' => '{$year}{DS}{$month}', //'{$modelName}{DS}{$year}{DS}{$month}{DS}{$type}{DS}{$subtype}',
                'types' => array(
                    'image/jpeg',
                    'image/png',
                    'image/gif',
                    'application/pdf'
                ),
                'delete' => true
            );
        }

        $this->settings[$model->alias] = array_merge(
                $this->settings[$model->alias], (array) $settings
        );

        // check for a file_field field (there is no default)
        if (!isset($this->settings[$model->alias]['file_field']) || '' === $this->settings[$model->alias]['file_field']) {
            throw new Exception('Must specify a file_field for UploadBehavior');
        }
    }

    /**
     * getPath method used to set the path to upload file in beforeSave method
     * 
     * 
     * @param Model $model 
     * @param string $path like '{$modelName}{DS}{$year}{DS}{$month}{DS}{$type}{DS}{$subtype}{DS}{$fileName}'
     * @param string $type image|application|etc...
     * @param string $subtype jpeg|gif|png etc..
     * @return string 
     */
    public function getPath(&$model, $path, $type, $subtype) {

        $path = str_replace(array(
            '{$modelName}',
            '{DS}',
            '{$year}',
            '{$month}',
            '{$type}',
            '{$subtype}'
                ), array(
            $model->alias,
            DS,
            date("Y"),
            date("m"),
            $type,
            $subtype
                ), $path);

        return $path;
    }

    /**
     * beforeValidate method check if file fit to criteria
     * 
     * @param Model $model
     * @return boolean
     * @throws Exception throws exception if file do not fit to settings
     */
    public function beforeValidate(&$model) {
        $field = $this->settings[$model->alias]['file_field'];

        if (isset($model->data[$model->alias][$field])) {
            if ($model->data[$model->alias][$field] != '' && !empty($model->data[$model->alias][$field]) && is_array($model->data[$model->alias][$field])) {

                // CHECK upload success
                if ($model->data[$model->alias][$field]['error'] != 0)
                    throw new Exception('Upload Error occured');

                // CHECK type
                if (( in_array($model->data[$model->alias][$field]['type'], $this->settings[$model->alias]['types']) === false))
                    throw new Exception('This file type is not suported!');

                // CHECK Size
                if ($this->settings[$model->alias]['maxsize'] < $model->data[$model->alias][$field]['size'])
                    throw new Exception('This file is too large ma size is : ' . ( $this->settings[$model->alias]['maxsize'] / ( 1024 * 1024 * 1000 ) ) . ' MB');
            }
        }

        return true;
    }

    /**
     * 
     * @param Model $model
     * @return boolean
     * @throws Exception
     */
    public function beforeSave(&$model) {
        $field = $this->settings[$model->alias]['file_field'];

        if (isset($model->data[$model->alias][$field])) {
            if ($model->data[$model->alias][$field] != '' && !empty($model->data[$model->alias][$field]) && is_array($model->data[$model->alias][$field])) {

                // NAME
                $name = time() . '_' . preg_replace('/[^a-z0-9_.]/i', '', strtolower($model->data[$model->alias][$field]['name']));

                // TEMPNAME
                $temp_name = $model->data[$model->alias][$field]['tmp_name'];

                // TYPE
                $fullType = $model->data[$model->alias][$field]['type'];
                $type = explode('/', $fullType);
                $subtype = $type[1];
                $type = $type[0];

                // GET CONFIG
                $conf = $this->settings[$model->alias];

                $path = WWW_ROOT . 'img' . DS .$conf['base'] . DS . $this->getPath($model, $conf['path'], $type, $subtype);
                $folder = new Folder();
                $folder->create($path, false);


                if (move_uploaded_file($temp_name, $path . DS . $name)) {
                    $model->data[$model->alias][$field] = 'img' . DS .$conf['base'] . DS . $this->getPath($model, $conf['path'], $type, $subtype) . DS . $name;
                    return true;
                }else
                    throw new Exception('Unable to move file on Server HD');
            }
        }

        return true;
    }

    /**
     * 
     * @param Model $model
     * @return boolean
     */
    function beforeDelete(&$model) {
        $field = $this->settings[$model->alias]['file_field'];
        $this->_fileToRemove = false;
        $model->read(null, $model->id);
        if (isset($model->data)) {

            $conf = $this->settings[$model->alias];

            if ($model->data[$model->alias][$field] != '' && $conf['delete']) {
                $this->_fileToRemove = $model->data[$model->alias][$field];
            }
        }
        return true;
    }

    /**
     * 
     * @param Model $model
     * @return boolean
     */
    function afterDelete(&$model) {
        if ($this->_fileToRemove) {
            $file = new File(WWW_ROOT . $this->_fileToRemove);
            return $file->delete();
        }
        return true;
    }

}