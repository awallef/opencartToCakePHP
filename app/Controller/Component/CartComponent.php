<?php

// Controllers
App::uses('Component', 'Controller');

// Models
App::uses('Product', 'Model');

class CartComponent extends Component {

    public $components = array('Session');

    public function initialize(Controller $controller) {
        parent::initialize($controller);
        
        // retrieve or set Session cart
        $cart = $this->Session->read('cart');
        if( empty($cart) ){
            $cart = array();
            $this->Session->write('cart', $cart );
        }
    }
    
}
