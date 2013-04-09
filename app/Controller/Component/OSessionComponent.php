<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP OSessionComponent
 * @author mike
 */
class OSessionComponent extends Component {

    public $components = array('Session');
    
    public function initialize($controller) {
        if( class_exists('Crypter') != true ) App::import('Vendor', 'Crypter', array('file' => 'crypto'.DS.'Crypter.php'));
    }
    
    public function read( $name = NULL ) {
        
        $opencart = $this->_retrieveArray(); 
        return ( isset($name) )? ( ( array_key_exists( $name, $opencart) )? $opencart[$name] : NULL ) : $opencart;
    }
    
    public function write( $name, $value ) {
        
        $opencart = $this->_retrieveArray();
        $opencart[ $name ] = $value;
        $this->Session->write('Opencart', $this->encodeArray($opencart));
    }
    
    private function _retrieveArray() {
        
        $opencart = $this->Session->read('Opencart');
        $opencart = ( empty($opencart) )? array() : $this->decodeArray( $opencart ); 
        return $opencart;
    }
    
    /**
     * 
     * @param array $data
     * @return string
     */
    public function encodeArray( $data ) {
        return $this->encode( serialize($data) );
    }
    
    /**
     * 
     * @param string $data
     * @return string
     */
    public function encode( $data ) {
        return base64_encode( Crypter::encrypt($data, Configure::read('Security.salt') ) );
    }
    
    /**
     * 
     * @param string $data
     * @return array
     */
    public function decodeArray( $data ) {
        return unserialize( $this->decode($data) );
    }
    
    /**
     * 
     * @param string $data
     * @return string
     */
    public function decode( $data ) {
        return Crypter::decrypt( base64_decode($data) , Configure::read('Security.salt') );
    }

}
