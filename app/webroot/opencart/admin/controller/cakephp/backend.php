<?php

class ControllerCakephpBackend extends Controller {

    /**
     * iframeOutput private method used by all other method in this controller to render an open cart view
     * 
     * @param String $iframeUrl the href of iframe element used to render cakePHP App inside OpenCart
     * @return void
     */
    private function _iframeOutput( $iframeUrl )
    {
        $this->document->setTitle($this->language->get('heading_title'));
        $this->data['heading_title'] = $this->language->get('heading_title');
        
        $this->data['iframe_url'] = $iframeUrl;
        
        $this->template = 'cakephp/backend.tpl';
        $this->children = array(
            'common/header',
            'common/footer'
        );

        $this->response->setOutput($this->render());
    }
    
    /**
     * scenes method called to render Scenes index Admin action in cakePHP
     * 
     * @return void
     */
    public function scenes() {
        $this->_iframeOutput( $this->url->cakeLink('admin/Scenes') );
    }
    
    /**
     * people method called to render People index Admin action in cakePHP
     * 
     * @return void
     */
    public function people() {
        $this->_iframeOutput( $this->url->cakeLink('admin/People') );
    }
    
    /**
     * peopletypes method called to render PeopleTypes index Admin action in cakePHP
     * 
     * @return void
     */
    public function peopletypes() {
        $this->_iframeOutput( $this->url->cakeLink('admin/PeopleTypes') );
    }

}

?>