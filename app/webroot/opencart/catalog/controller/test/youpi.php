<?php 
class ControllerTestYoupi extends Controller
{ 	
        public function index() {
            $this->template = 'paloma/template/test/youpi.tpl';
            $this->response->setOutput($this->render());
        }
}
?>