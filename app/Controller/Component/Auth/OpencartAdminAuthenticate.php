<?php

App::uses('BaseAuthenticate', 'Controller/Component/Auth');
App::uses('User', 'Model');

class OpencartAdminAuthenticate extends BaseAuthenticate {

    /**
     *  authenticate method
     * 
     *  check if user is logged in opencart && if user belongs to group 1
     *  @param CakeRequest $request cake request
     *  @param CakeResponse $response CakeResponse
     *  @return array
     */
    public function authenticate(CakeRequest $request, CakeResponse $response) {

        $user = array();

        if (key_exists('session', $this->settings)) {
            $session = $this->settings['session']->read();

            if (key_exists('user_id', $session) && key_exists('token', $session)) {
                $userModel = new User();
                $u = $userModel->find('first', array(
                    'conditions' => array(
                        'User.user_id' => $session['user_id']
                    )
                        )
                );

                if (!empty($u)) {
                    if ($u['User']['user_group_id'] == 1)
                        $user = $u['User'];
                }
            }
        }

        return $user;
    }
    
    /**
     * login:
     * password creation: sha1($salt . sha1($salt . sha1($password)))
     */

}
