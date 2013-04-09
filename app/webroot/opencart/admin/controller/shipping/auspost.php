<?php
/*
  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 
  ---------------------------------------------------------------------

  SuperJuice (Sam) opencart@pixeldrift.net
  OpenCart 1.5.0.5 Australia Post Module 1.5.0.5u2
  If you're going to use the code, give me some credit.. it's simple

*/

class ControllerShippingAusPost extends Controller {
	private $error = array(); 
	
	public function index() {   
		$this->load->language('shipping/auspost');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
				
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->model_setting_setting->editSetting('auspost', $this->request->post);		
					
			$this->session->data['success'] = $this->language->get('text_success');
						
			$this->redirect($this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL'));
		}
				
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_all_zones'] = $this->language->get('text_all_zones');
		$this->data['text_none'] = $this->language->get('text_none');
		
		$this->data['entry_standard'] = $this->language->get('entry_standard');
		$this->data['entry_express'] = $this->language->get('entry_express');
		$this->data['entry_sea'] = $this->language->get('entry_sea');
		$this->data['entry_air'] = $this->language->get('entry_air');
		$this->data['entry_satchreg'] = $this->language->get('entry_satchreg');
		$this->data['entry_satchexp'] = $this->language->get('entry_satchexp');
		$this->data['entry_satchpla'] = $this->language->get('entry_satchpla');
		$this->data['entry_postcode'] = $this->language->get('entry_postcode');
		$this->data['entry_handling'] = $this->language->get('entry_handling');
		$this->data['entry_estimate'] = $this->language->get('entry_estimate');
		$this->data['entry_stripgst'] = $this->language->get('entry_stripgst');
		$this->data['entry_tax'] = $this->language->get('entry_tax');
		$this->data['entry_geo_zone'] = $this->language->get('entry_geo_zone');		
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

		$this->data['tab_general'] = $this->language->get('tab_general');

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
		if (isset($this->error['postcode'])) {
			$this->data['error_postcode'] = $this->error['postcode'];
		} else {
			$this->data['error_postcode'] = '';
		}
		
		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
		'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
       		'text'      => $this->language->get('text_home'),
      		'separator' => FALSE
   		);

		$this->data['breadcrumbs'][] = array(
		'href'      => $this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL'),
       		'text'      => $this->language->get('text_shipping'),
      		'separator' => ' :: '
   		);
		
		$this->data['breadcrumbs'][] = array(
		'href'      => $this->url->link('shipping/auspost', 'token=' . $this->session->data['token'], 'SSL'),
       		'text'      => $this->language->get('heading_title'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('shipping/auspost', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['cancel'] = $this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL');		

		if (isset($this->request->post['auspost_standard'])) {
			$this->data['auspost_standard'] = $this->request->post['auspost_standard'];
		} else {
			$this->data['auspost_standard'] = $this->config->get('auspost_standard');
		}

		if (isset($this->request->post['auspost_express'])) {
			$this->data['auspost_express'] = $this->request->post['auspost_express'];
		} else {
			$this->data['auspost_express'] = $this->config->get('auspost_express');
		}
		
		if (isset($this->request->post['auspost_sea'])) {
			$this->data['auspost_sea'] = $this->request->post['auspost_sea'];
		} else {
			$this->data['auspost_sea'] = $this->config->get('auspost_sea');
		}

		if (isset($this->request->post['auspost_air'])) {
			$this->data['auspost_air'] = $this->request->post['auspost_air'];
		} else {
			$this->data['auspost_air'] = $this->config->get('auspost_air');
		}

		if (isset($this->request->post['auspost_satchreg'])) {
			$this->data['auspost_satchreg'] = $this->request->post['auspost_satchreg'];
		} else {
			$this->data['auspost_satchreg'] = $this->config->get('auspost_satchreg');
		}

		if (isset($this->request->post['auspost_satchexp'])) {
			$this->data['auspost_satchexp'] = $this->request->post['auspost_satchexp'];
		} else {
			$this->data['auspost_satchexp'] = $this->config->get('auspost_satchexp');
		}

		if (isset($this->request->post['auspost_satchpla'])) {
			$this->data['auspost_satchpla'] = $this->request->post['auspost_satchpla'];
		} else {
			$this->data['auspost_satchpla'] = $this->config->get('auspost_satchpla');
		}

		if (isset($this->request->post['auspost_postcode'])) {
			$this->data['auspost_postcode'] = $this->request->post['auspost_postcode'];
		} else {
			$this->data['auspost_postcode'] = $this->config->get('auspost_postcode');
		}
		
		if (isset($this->request->post['auspost_handling'])) {
			$this->data['auspost_handling'] = $this->request->post['auspost_handling'];
		} else {
			$this->data['auspost_handling'] = $this->config->get('auspost_handling');
		}

		if (isset($this->request->post['auspost_estimate'])) {
			$this->data['auspost_estimate'] = $this->request->post['auspost_estimate'];
		} else {
			$this->data['auspost_estimate'] = $this->config->get('auspost_estimate');
		}
		
		if (isset($this->request->post['auspost_stripgst'])) {
			$this->data['auspost_stripgst'] = $this->request->post['auspost_stripgst'];
		} else {
			$this->data['auspost_stripgst'] = $this->config->get('auspost_stripgst');
		}
		
		if (isset($this->request->post['auspost_tax_class_id'])) {
			$this->data['auspost_tax_class_id'] = $this->request->post['auspost_tax_class_id'];
		} else {
			$this->data['auspost_tax_class_id'] = $this->config->get('auspost_tax_class_id');
		}

		if (isset($this->request->post['auspost_geo_zone_id'])) {
			$this->data['auspost_geo_zone_id'] = $this->request->post['auspost_geo_zone_id'];
		} else {
			$this->data['auspost_geo_zone_id'] = $this->config->get('auspost_geo_zone_id');
		}
		
		if (isset($this->request->post['auspost_status'])) {
			$this->data['auspost_status'] = $this->request->post['auspost_status'];
		} else {
			$this->data['auspost_status'] = $this->config->get('auspost_status');
		}
		
		if (isset($this->request->post['auspost_sort_order'])) {
			$this->data['auspost_sort_order'] = $this->request->post['auspost_sort_order'];
		} else {
			$this->data['auspost_sort_order'] = $this->config->get('auspost_sort_order');
		}				

		$this->load->model('localisation/tax_class');
		
		$this->data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();
		
		$this->load->model('localisation/geo_zone');
		
		$this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		$this->template = 'shipping/auspost.tpl';
		$this->children = array(
			'common/header',	
			'common/footer'	
		);
		
		$this->response->setOutput($this->render());
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'shipping/auspost')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!preg_match('/^[0-9]{4}$/', $this->request->post['auspost_postcode'])){
			$this->error['postcode'] = $this->language->get('error_postcode');
		}

		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}	
	}
}
?>
