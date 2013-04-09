<?php

// Controllers
App::uses('Component', 'Controller');

// Models
App::uses('Language', 'Model');
App::uses('Currency', 'Model');
App::uses('Setting', 'Model');

/**
 * CakePHP SettingsDataComponent
 * @author mike
 */
class SettingsComponent extends Component {

    /**
     *
     * @var array 
     */
    public $components = array('Session','OSession');
    
    /**
     * 
     * @param Controller $controller
     */
    public function initialize($controller) {
        parent::initialize($controller);
        $this->_initLng();
        $this->_initCurrencies();
    }
    
    /**
     * upadte language in cake Configure class object 'Opencart.language'
     * 
     * @param string $code
     */
    public function updateLanguage( $code ) {
        
        $this->Language->recursive = -1;
        $lng = $this->Language->find('first',array(
            'conditions' => array(
                'Language.code' => $code
            )
        ));
        $this->OSession->write('language_id', $lng['Language']['language_id'] );
        $this->OSession->write('language_code', $lng['Language']['code'] );
    }
    
    /**
     * store curent customer currency in cake Configure class object 'Opencart.currency' 
     * 
     * @param string $code
     */
    public function updateCurrency( $code ) {
        
        foreach( $this->OSession->read('currencies') as $currency ) {
            if( $currency['Currency']['code'] == $code ){
                $this->OSession->write('currency_code', $currency['Currency']['code'] );
                $this->Session->write('currency', $currency['Currency']['code'] );
                $this->OSession->write('currency_value', $currency['Currency']['value'] );
                break;
            }
        }
    }
    
    /**
     * 
     */
    private function _initCurrencies() {
        // retrieve or set Session currency
        $currency = $this->Session->read('currency');
        if( empty($currency) )
            $currency = $this->_setCurrency();
    
        // create instance of Currency Model for component
        // store currencies Avaliable in cake Configure class object 'Opencart.currencies'
        $this->Currency = new Currency();
        $currencies = $this->OSession->read('currencies');
        if( empty( $currencies ) ) {
            $this->_storeCurrencies();
        }
        
        // store curent customer currency in cake Configure class object 'Opencart.currency'
        if( $currency != $this->OSession->read('currency_code') )
            $this->updateCurrency( $currency );
    }
    
    /**
     * 
     */
    private function _initLng() {
        // retrieve or set Session language
        $language = $this->Session->read('language');
        if( empty($language) )
            $language = $this->_setLng();
        
        // create instance of Language Model for component
        $this->Language = new Language();
        
        // upadte language in cake Configure class object 'Opencart.language'
        if( $language != $this->OSession->read('language_code') )
            $this->updateLanguage( $language );
    }
    
    /**
     * 
     * @return string
     */
    private function _setLng()
    {
        $this->Setting = new Setting();
        $this->Setting->recursive = -1;
        $setting = $this->Setting->find('first',array(
            'conditions' => array(
                'Setting.key' => 'config_language'
            )
        ));
        $language = $setting['Setting']['value'];
        $this->Session->write('language', $language );
        return $language;
    }
    
    /**
     * 
     * @return string
     */
    private function _setCurrency()
    {
        $this->Setting = new Setting();
        $this->Setting->recursive = -1;
        $currency = $this->Setting->find('first',array(
            'conditions' => array(
                'Setting.key' => 'config_currency'
            )
        ));
        $currency = $currency['Setting']['value'];
        $this->Session->write('currency', $currency );
        return $currency;
    }
    
    /**
     * 
     * @return void
     */
    private function _storeCurrencies() {
        
        // store currencies Avaliable in cake Configure class object 'Opencart.currencies
        $currencies = $this->Currency->find('all',array(
            'conditions' => array(
                'Currency.status' => 1
            )
        ));
        $this->OSession->write('currencies', $currencies );
    }

}
