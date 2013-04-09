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
  OpenCart 1.5.0.5u1 Australia Post Module 1.5.0.5u2
  If you're going to use the code, give me some credit.. it's simple

*/

class ModelShippingAuspost extends Model {
	public function getQuote($address) {
		$this->load->language('shipping/auspost');

		if ($this->config->get('auspost_status')) {
      		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('auspost_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
		
      		if (!$this->config->get('auspost_geo_zone_id')) {
        		$status = TRUE;
      		} elseif ($query->num_rows) {
        		$status = TRUE;
      		} else {
        		$status = FALSE;
      		}
		} else {
			$status = FALSE;
		}


		if ($status && ($this->config->get('auspost_standard') || $this->config->get('auspost_express') || $this->config->get('auspost_sea') || $this->config->get('auspost_air') || $this->config->get('auspost_satchreg') || $this->config->get('auspost_satchexp') || $this->config->get('auspost_satchpla'))) {
	
			//echo 'cart get Weight : '.$this->cart->getWeight() .' config get weight class : ' . $this->config->get('config_weight_class_id') ;
                        
                        $weight = intval($this->weight->convert($this->cart->getWeight(), $this->config->get('config_weight_class_id'), 2));
	
			$this->load->model('localisation/country');
			
			$country_info = $this->model_localisation_country->getCountry($address['country_id']);
		
			$method_data = array();

			$quote_data = array();

			$error = FALSE;	
		
			//These errors will clobber each other, so only one error will be displayed at a time	
			if (intval($weight) == 0) { $error = 'The basket weight is 0g, unable to calculate shipping costs';}
			if (intval($weight) > 20000) { $error = 'Your basket is too heavy to ship with Australia Post (20kg+)';}

			if($country_info['iso_code_2'] == 'AU') {
				if (!preg_match('/^[0-9]{4}$/', $address['postcode'])) { $error = 'Your post code is not valid in Australia';}

				$validmethods = array("standard","express");
			} else {
				$validmethods = array("sea","air");
			}


			//Calculate the cube root of the item volume to send to the auspost module, if it's a single item.. the actual dimensions will be sent
			if(@count($validmethods) > 0) {
			 	//Set the total cubed amount to 0
				$cartcubed = 0;

				foreach ($this->cart->getProducts() as $cartitem) {
			 		//Check the length class, if it isn't mm we need to convert it
			 		if($cartitem['length_class_id'] != 2) {
						if($cartitem['width'] != 0) {
							$cartitem['width'] = $this->length->convert($cartitem['width'], $cartitem['length_class_id'], 2);
						}

					if($cartitem['height'] != 0) {
						$cartitem['height'] = $this->length->convert($cartitem['height'], $cartitem['length_class_id'], 2);
						}

						if($cartitem['length'] != 0) {
							$cartitem['length'] = $this->length->convert($cartitem['length'], $cartitem['length_class_id'], 2);
						}
			   		}
	
			   		//If a dimension is missing, fall back to 100mm
			   		if($cartitem['width'] == 0) { $cartitem['width'] = 100;}
			   		if($cartitem['height'] == 0) { $cartitem['height'] = 100;}
			   		if($cartitem['length'] == 0) { $cartitem['length'] = 100;}

			   		//Combine the total cubed capacity (value will be unused if no items in the cart)
			   		$cartcubed += ($cartitem['width'] * $cartitem['height'] * $cartitem['length'] * $cartitem['quantity']);
			 	}

				//If it's a single item send the real dimensions, if not send the cubed root
				if($this->cart->countProducts() == 1) {
					$auspost_width = intval($cartitem['width']);	
					$auspost_height	= intval($cartitem['height']);
					$auspost_length	= intval($cartitem['length']);

				} else if ($this->cart->countProducts() > 1) {
			 		$auspost_width = round(pow($cartcubed,1/3));
			 		$auspost_height = round(pow($cartcubed,1/3));
			 		$auspost_length = round(pow($cartcubed,1/3));
				}
			}

			foreach ($validmethods as $postmethod) {
				if ($this->config->get('auspost_' . $postmethod) && $error == FALSE) {
					$postcharge = $this->getAuspostQuote($address['postcode'], $postmethod, $weight, $country_info['iso_code_2'], $auspost_width, $auspost_height, $auspost_length);
			
					if($postcharge[0] < 0) {
						//-99 is an Auspost combination error, silently hidden
						if($postcharge[0] != -99) {
                                        		$error = $postcharge[1];
						}
                                	} else {
                                        	$quote_data['auspost_' . $postmethod] = array(
                                                	'code'           => 'auspost.auspost_' . $postmethod,
                                                	'title'        => $this->language->get('text_' . $postmethod). $postcharge[1],
                                                	'cost'         => $postcharge[0],
                                                	'tax_class_id' => $this->config->get('auspost_tax_class_id'),
                                                	'text'         => '$' . sprintf('%.2f', ($this->tax->calculate($postcharge[0], $this->config->get('auspost_tax_class_id'), $this->config->get('config_tax'))))
                                        	);
                                	}
                        	}
			}

			//Code for prepaid satchels
			//Satchels do not feedback any errors, they are just displayed if the weight fits in the criteria and the method is enabled
			if($country_info['iso_code_2'] == 'AU') {
				foreach (array("satchreg", "satchexp", "satchpla") as $postmethod) {
					if ($this->config->get('auspost_' . $postmethod) && $error == FALSE) {
						$satcharge = $this->getAuspostSatchel($postmethod, $weight);

						if($satcharge > 0) {
                                        		$quote_data['auspost_' . $postmethod] = array(
                                                		'code'           => 'auspost.auspost_' . $postmethod,
                                                		'title'        => $this->language->get('text_' . $postmethod),
                                                		'cost'         => $satcharge,
                                                		'tax_class_id' => $this->config->get('auspost_tax_class_id'),
                                                		'text'         => '$' . sprintf('%.2f', ($this->tax->calculate($satcharge, $this->config->get('auspost_tax_class_id'), $this->config->get('config_tax'))))
                                        		);
						}	
					}		
				}
			}

			$method_data = array(
				'id'         => 'auspost',
				'title'      => $this->language->get('text_title'),
				'quote'      => $quote_data,
				'sort_order' => $this->config->get('auspost_sort_order'),
				'error'      => $error 
			);

			return $method_data;
		} //End Auspost module is enabled
	} //End of getQuote function


	private function getAuspostQuote($dst_postcode, $service, $weight, $country, $width, $height, $length) {
                $ch = curl_init();
                
		//Australia Post appear to have some undocumented minimum values for different dimensions, check that items passed aren't below the minimums
		if($width < 30) {$width = 30;}
		if($height < 50) {$height = 50;}
		if($length < 50) {$length = 50;}

		$request_url = 'http://drc.edeliver.com.au/ratecalc.asp?pickup_postcode=' . $this->config->get('auspost_postcode') . '&width=' . $width . '&height=' . $height . '&length=' . $length . '&country=' . $country . '&service_type=' . $service . '&quantity=1&weight=' . $weight;
                       
 
		if(strtolower($country) == "au") {
			$request_url .= '&destination_postcode=' . $dst_postcode;
		}

                curl_setopt($ch, CURLOPT_URL,$request_url);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                $get_quote = curl_exec($ch);
                //echo $get_quote;
                curl_close($ch);

		if (strstr($get_quote, 'err_msg=OK') == FALSE) {

			//Check if the string is even remotely what we are looking for (if so, we know Auspost doesn't like the combo)
			if(strstr($get_quote, 'err_msg=') == FALSE) {
                                $auspost_quote[0] = -1;
                                $auspost_quote[1] = 'Error interfacing with Australia Post (connection)';
			} else {
				if(strstr($get_quote, 'Weight Outside Valid Range') != FALSE) {
					//Special case where destination country won't accept parcels over a certain weight
					$auspost_quote[0] = -1;
					$auspost_quote[1] = 'Basket is too heavy to ship to this destination';
				} else {
					//-99 represents an Auspost combination error, will be silently hidden from shipping offerings
					$auspost_quote[0] = -99;
				}
			}
		
		} else {
			$get_quote_charge = preg_match('/^charge=([0-9]{1,3}\.?[0-9]{0,2})/', $get_quote, $quote_charge);

                        if (!isset($quote_charge[1])) {
                        	$auspost_quote[0] = -1;
				$auspost_quote[1] = 'Error interfacing with Australia Post (charge)';
			} else {
                        	$post_charge = sprintf('%.2f', $quote_charge[1]);

                                if (floatval($this->config->get('auspost_handling')) > 0) {
                                	$post_charge = sprintf('%.2f', $post_charge + floatval($this->config->get('auspost_handling')));
				}

				if ($this->config->get('auspost_stripgst')) {	
					$auspost_quote[0] = (($post_charge / 11) * 10);
				} else {
					$auspost_quote[0] = $post_charge;
				}

                                $get_post_estimate = preg_match('/days=([0-9]{1,2})/', $get_quote, $post_estimate);

                                $auspost_quote[1] = '';
                
                                if ($this->config->get('auspost_estimate') && isset($post_estimate[1])) {
                                	if (is_numeric($post_estimate[1])) {
                                        	if($post_estimate[1] == 1) {
                                                	$auspost_quote[1] = ' (est. ' . $post_estimate[1] . ' day delivery)';
                                                } else {
                                                        $auspost_quote[1] = ' (est. ' . $post_estimate[1] . ' days delivery)';
                                                }
                                        }
                                }

			}
		}

		return $auspost_quote;
	}

	private function getAuspostSatchel($service, $weight) {
		//Define the different satchel sizes / prices (0 represents unavailable) - Updated July 2011
      		$satchel = array("satchreg" => array(0 => 6.60, 1 => 11.20, 2 => 0),
                       		 "satchexp" => array(0 => 9.20, 1 => 12.55, 2 => 20.85),
                       		 "satchpla" => array(0 => 13.40, 1 => 17.70, 2 => 0));

		//Default to return 0
		$satch_quote = 0;

		if($weight <= 500) { $satch_quote = $satchel[$service][0];}
		if(($weight > 500) && ($weight <= 3000)) { $satch_quote = $satchel[$service][1];}
		if(($weight > 3000) && ($weight <=5000)) { $satch_quote = $satchel[$service][2];}

		//Added > 0 check to ensure handling wasn't added if no satchel was suitable
                if ((floatval($this->config->get('auspost_handling')) > 0) && $satch_quote > 0 ) {
                	$satch_quote = sprintf('%.2f', $satch_quote + floatval($this->config->get('auspost_handling')));
                }

		if ($this->config->get('auspost_stripgst')) {$satch_quote = (($satch_quote / 11) * 10);}

		return $satch_quote;
	}
}
?>
