<?php

// Controllers
App::uses('Component', 'Controller');

// Models
App::uses('Product', 'Model');

class CartComponent extends Component {

    public $components = array('Session');

    public function initialize(Controller $controller) {
        parent::initialize($controller);
        
        // test
        if( $this->Session->read('cart') )
        {
            $products = $this->Session->read('cart');
            foreach( $products as $key => $value ){
                $product = explode(':', $key);
                $product[1] = unserialize(base64_decode($product[1]));
                $product[2] = $value; 
                
                
                debug( $product );
            }
        }
        
        // die!!!
        return;
        
        // init Crypter for all app
        if( class_exists('Crypter') != true ) App::import('Vendor', 'Crypter', array('file' => 'crypto'.DS.'Crypter.php'));
        
        $cart = ( $this->Session->read('cart') )? $this->Session->read('cart') : array();
           
        $cartFingerPrint = $this->Session->read('Opencart.cartFingerPrint');
        $fingerPrint = md5(serialize($cart));

        if( empty($cartFingerPrint) )
        {
            $this->_setCart ($cart, $fingerPrint );
        }else{
            if( $cartFingerPrint != $fingerPrint )
                 $this->_setCart ($cart, $fingerPrint );
        }
        
        //Configure::write('Opencart.cart', unserialize( Crypter::decrypt( base64_decode( $this->Session->read('Opencart.cart') ) , Configure::read('Security.salt') ) ) );
        Configure::write('Opencart.cart', $this->Session->read('Opencart.cart') );
    }

    private function _setCart($cart, $fingerPrint) {
        
        $this->Session->write('Opencart.cartFingerPrint', $fingerPrint );
        
        $Product = new Product();
        $cartItems = array();
        $taxes = array();

        $totalItems = 0;
        $totalPriceET = 0;
        $totalPriceATI = 0;
        
        foreach ($cart as $key => $quantity) {
            $product = explode(':', $key);
            $product_id = $product[0];

            // Check if product exists
            $Product->id = $product_id;
            if ($Product->exists()) {

                $productDetails = $Product->getBasicInfosById($product_id, $this->Session->read('Opencart.language'));

                $priceATI = $priceET = $productDetails[0]['Product']['price'];



                // Options
                $options = array();
                if (isset($product[1])) {
                    $options_ref = unserialize(base64_decode($product[1]));
                    
                    foreach ($options_ref as $option) {
                        $option = $Product->getOptionById($option, $this->Session->read('Opencart.language'));

                        switch ($option[0]['ProductOptionValue']['price_prefix']) {
                            case '+':
                                $priceET += $option[0]['ProductOptionValue']['price'];
                                break;
                            case '-':
                                $priceET -= $option[0]['ProductOptionValue']['price'];
                                break;
                        }

                        $options[] = $option[0];
                    }
                }


                foreach ($productDetails[0]['Tax'] as $tax) {
                    $taxRate = $tax['TaxRate'];

                    if (!key_exists($taxRate['tax_rate_id'], $taxes)) {
                        $taxes[$taxRate['tax_rate_id']] = array(
                            'name' => $taxRate['name'],
                            'priceToTax' => 0,
                            'tax' => 0
                        );
                    }

                    switch ($taxRate['type']) {
                        case 'F':
                            $priceATI += $taxRate['rate'];
                            $taxes[$taxRate['tax_rate_id']]['priceToTax'] = $taxes[$taxRate['tax_rate_id']]['tax'] += ( $taxRate['rate'] * $quantity );
                            break;

                        case 'P':
                            $taxes[$taxRate['tax_rate_id']]['priceToTax'] += $priceET * $quantity;
                            $taxes[$taxRate['tax_rate_id']]['tax'] = ($taxes[$taxRate['tax_rate_id']]['priceToTax'] / 100 * $taxRate['rate']);
                            $priceATI += ($priceET / 100 * $taxRate['rate']);
                            break;
                    }
                }

                $cartItem = array(
                    'session_key' => $key,
                    'id' => $product_id,
                    'quantity' => $quantity,
                    'priceET' => $priceET,
                    'priceATI' => $priceATI,
                    'totalATI' => $priceATI * $quantity
                );

                $cartItem = array_merge($cartItem, $productDetails[0]);
                $cartItem['Options'] = $options;

                $cartItems[] = $cartItem;
                $totalItems += $quantity;
                $totalPriceET += $priceET * $quantity;
                $totalPriceATI += $priceATI * $quantity;
            }
        }
        
        $newCart = array(
            'cartItems' => $cartItems,
            'totalItems' => $totalItems,
            'totalPriceET' => $totalPriceET,
            'totalPriceATI' => $totalPriceATI,
            'taxes' => $taxes
        );
        
        //$newCart = base64_encode( Crypter::encrypt(serialize($newCart), Configure::read('Security.salt') ) );
        
        //$newCart = unserialize( Crypter::decrypt( base64_decode($newCart) , Configure::read('Security.salt') ) );
        
        $this->Session->write('Opencart.cart', $newCart );
    }

}
