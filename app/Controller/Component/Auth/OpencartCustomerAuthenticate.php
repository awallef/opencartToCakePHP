<?php

App::uses('BaseAuthenticate', 'Controller/Component/Auth');
App::uses('Customer', 'Model');

class OpencartCustomerAuthenticate extends BaseAuthenticate {

    /**
     *  authenticate method
     * 
     *  check if user is logged in opencart && if user belongs to group 1
     *  @param CakeRequest $request cake request
     *  @param CakeResponse $response CakeResponse
     *  @return array
     */
    public function authenticate(CakeRequest $request, CakeResponse $response) {

        $customer = array();

        if (key_exists('session', $this->settings)) {
            $session = $this->settings['session']->read();

            if (key_exists('customer_id', $session)) {
                $customerModel = new Customer();
                $c = $customerModel->find('first', array(
                    'conditions' => array(
                        'Customer.customer_id' => $session['customer_id']
                    )
                        )
                );

                if (!empty($c)) {
                    if ($c['Customer']['customer_group_id'] == 1)
                        $customer = $c['Customer'];
                }
            }
        }

        return $customer;
    }

}
