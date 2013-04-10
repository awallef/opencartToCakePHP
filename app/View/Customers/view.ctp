<div class="customers view">
<h2><?php  echo __('Customer'); ?></h2>
	<dl>
		<dt><?php echo __('Customer Id'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['customer_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Store'); ?></dt>
		<dd>
			<?php echo $this->Html->link($customer['Store']['name'], array('controller' => 'stores', 'action' => 'view', $customer['Store']['store_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Firstname'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['firstname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['lastname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telephone'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['telephone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fax'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['fax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salt'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['salt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cart'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['cart']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wishlist'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['wishlist']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Newsletter'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['newsletter']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo $this->Html->link($customer['Address']['address_id'], array('controller' => 'addresses', 'action' => 'view', $customer['Address']['address_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customer Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($customer['CustomerGroup']['customer_group_id'], array('controller' => 'customer_groups', 'action' => 'view', $customer['CustomerGroup']['customer_group_id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['ip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approved'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['approved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Token'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['token']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Added'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['date_added']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Customer'), array('action' => 'edit', $customer['Customer']['customer_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Customer'), array('action' => 'delete', $customer['Customer']['customer_id']), null, __('Are you sure you want to delete # %s?', $customer['Customer']['customer_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customer Groups'), array('controller' => 'customer_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer Group'), array('controller' => 'customer_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Coupon Histories'), array('controller' => 'coupon_histories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon History'), array('controller' => 'coupon_histories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Frauds'), array('controller' => 'order_frauds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Fraud'), array('controller' => 'order_frauds', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Return Operations'), array('controller' => 'return_operations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Return'), array('controller' => 'return_operations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reviews'), array('controller' => 'reviews', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Review'), array('controller' => 'reviews', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Coupon Histories'); ?></h3>
	<?php if (!empty($customer['CouponHistory'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Coupon History Id'); ?></th>
		<th><?php echo __('Coupon Id'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Date Added'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($customer['CouponHistory'] as $couponHistory): ?>
		<tr>
			<td><?php echo $couponHistory['coupon_history_id']; ?></td>
			<td><?php echo $couponHistory['coupon_id']; ?></td>
			<td><?php echo $couponHistory['order_id']; ?></td>
			<td><?php echo $couponHistory['customer_id']; ?></td>
			<td><?php echo $couponHistory['amount']; ?></td>
			<td><?php echo $couponHistory['date_added']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'coupon_histories', 'action' => 'view', $couponHistory['coupon_history_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'coupon_histories', 'action' => 'edit', $couponHistory['coupon_history_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'coupon_histories', 'action' => 'delete', $couponHistory['coupon_history_id']), null, __('Are you sure you want to delete # %s?', $couponHistory['coupon_history_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Coupon History'), array('controller' => 'coupon_histories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($customer['Order'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Invoice No'); ?></th>
		<th><?php echo __('Invoice Prefix'); ?></th>
		<th><?php echo __('Store Id'); ?></th>
		<th><?php echo __('Store Name'); ?></th>
		<th><?php echo __('Store Url'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Customer Group Id'); ?></th>
		<th><?php echo __('Firstname'); ?></th>
		<th><?php echo __('Lastname'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Telephone'); ?></th>
		<th><?php echo __('Fax'); ?></th>
		<th><?php echo __('Payment Firstname'); ?></th>
		<th><?php echo __('Payment Lastname'); ?></th>
		<th><?php echo __('Payment Company'); ?></th>
		<th><?php echo __('Payment Company Id'); ?></th>
		<th><?php echo __('Payment Tax Id'); ?></th>
		<th><?php echo __('Payment Address 1'); ?></th>
		<th><?php echo __('Payment Address 2'); ?></th>
		<th><?php echo __('Payment City'); ?></th>
		<th><?php echo __('Payment Postcode'); ?></th>
		<th><?php echo __('Payment Country'); ?></th>
		<th><?php echo __('Payment Country Id'); ?></th>
		<th><?php echo __('Payment Zone'); ?></th>
		<th><?php echo __('Payment Zone Id'); ?></th>
		<th><?php echo __('Payment Address Format'); ?></th>
		<th><?php echo __('Payment Method'); ?></th>
		<th><?php echo __('Payment Code'); ?></th>
		<th><?php echo __('Shipping Firstname'); ?></th>
		<th><?php echo __('Shipping Lastname'); ?></th>
		<th><?php echo __('Shipping Company'); ?></th>
		<th><?php echo __('Shipping Address 1'); ?></th>
		<th><?php echo __('Shipping Address 2'); ?></th>
		<th><?php echo __('Shipping City'); ?></th>
		<th><?php echo __('Shipping Postcode'); ?></th>
		<th><?php echo __('Shipping Country'); ?></th>
		<th><?php echo __('Shipping Country Id'); ?></th>
		<th><?php echo __('Shipping Zone'); ?></th>
		<th><?php echo __('Shipping Zone Id'); ?></th>
		<th><?php echo __('Shipping Address Format'); ?></th>
		<th><?php echo __('Shipping Method'); ?></th>
		<th><?php echo __('Shipping Code'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Total'); ?></th>
		<th><?php echo __('Order Status Id'); ?></th>
		<th><?php echo __('Affiliate Id'); ?></th>
		<th><?php echo __('Commission'); ?></th>
		<th><?php echo __('Language Id'); ?></th>
		<th><?php echo __('Currency Id'); ?></th>
		<th><?php echo __('Currency Code'); ?></th>
		<th><?php echo __('Currency Value'); ?></th>
		<th><?php echo __('Ip'); ?></th>
		<th><?php echo __('Forwarded Ip'); ?></th>
		<th><?php echo __('User Agent'); ?></th>
		<th><?php echo __('Accept Language'); ?></th>
		<th><?php echo __('Date Added'); ?></th>
		<th><?php echo __('Date Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($customer['Order'] as $order): ?>
		<tr>
			<td><?php echo $order['order_id']; ?></td>
			<td><?php echo $order['invoice_no']; ?></td>
			<td><?php echo $order['invoice_prefix']; ?></td>
			<td><?php echo $order['store_id']; ?></td>
			<td><?php echo $order['store_name']; ?></td>
			<td><?php echo $order['store_url']; ?></td>
			<td><?php echo $order['customer_id']; ?></td>
			<td><?php echo $order['customer_group_id']; ?></td>
			<td><?php echo $order['firstname']; ?></td>
			<td><?php echo $order['lastname']; ?></td>
			<td><?php echo $order['email']; ?></td>
			<td><?php echo $order['telephone']; ?></td>
			<td><?php echo $order['fax']; ?></td>
			<td><?php echo $order['payment_firstname']; ?></td>
			<td><?php echo $order['payment_lastname']; ?></td>
			<td><?php echo $order['payment_company']; ?></td>
			<td><?php echo $order['payment_company_id']; ?></td>
			<td><?php echo $order['payment_tax_id']; ?></td>
			<td><?php echo $order['payment_address_1']; ?></td>
			<td><?php echo $order['payment_address_2']; ?></td>
			<td><?php echo $order['payment_city']; ?></td>
			<td><?php echo $order['payment_postcode']; ?></td>
			<td><?php echo $order['payment_country']; ?></td>
			<td><?php echo $order['payment_country_id']; ?></td>
			<td><?php echo $order['payment_zone']; ?></td>
			<td><?php echo $order['payment_zone_id']; ?></td>
			<td><?php echo $order['payment_address_format']; ?></td>
			<td><?php echo $order['payment_method']; ?></td>
			<td><?php echo $order['payment_code']; ?></td>
			<td><?php echo $order['shipping_firstname']; ?></td>
			<td><?php echo $order['shipping_lastname']; ?></td>
			<td><?php echo $order['shipping_company']; ?></td>
			<td><?php echo $order['shipping_address_1']; ?></td>
			<td><?php echo $order['shipping_address_2']; ?></td>
			<td><?php echo $order['shipping_city']; ?></td>
			<td><?php echo $order['shipping_postcode']; ?></td>
			<td><?php echo $order['shipping_country']; ?></td>
			<td><?php echo $order['shipping_country_id']; ?></td>
			<td><?php echo $order['shipping_zone']; ?></td>
			<td><?php echo $order['shipping_zone_id']; ?></td>
			<td><?php echo $order['shipping_address_format']; ?></td>
			<td><?php echo $order['shipping_method']; ?></td>
			<td><?php echo $order['shipping_code']; ?></td>
			<td><?php echo $order['comment']; ?></td>
			<td><?php echo $order['total']; ?></td>
			<td><?php echo $order['order_status_id']; ?></td>
			<td><?php echo $order['affiliate_id']; ?></td>
			<td><?php echo $order['commission']; ?></td>
			<td><?php echo $order['language_id']; ?></td>
			<td><?php echo $order['currency_id']; ?></td>
			<td><?php echo $order['currency_code']; ?></td>
			<td><?php echo $order['currency_value']; ?></td>
			<td><?php echo $order['ip']; ?></td>
			<td><?php echo $order['forwarded_ip']; ?></td>
			<td><?php echo $order['user_agent']; ?></td>
			<td><?php echo $order['accept_language']; ?></td>
			<td><?php echo $order['date_added']; ?></td>
			<td><?php echo $order['date_modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'orders', 'action' => 'view', $order['order_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'orders', 'action' => 'edit', $order['order_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'orders', 'action' => 'delete', $order['order_id']), null, __('Are you sure you want to delete # %s?', $order['order_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Order Frauds'); ?></h3>
	<?php if (!empty($customer['OrderFraud'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Country Match'); ?></th>
		<th><?php echo __('Country Code'); ?></th>
		<th><?php echo __('High Risk Country'); ?></th>
		<th><?php echo __('Distance'); ?></th>
		<th><?php echo __('Ip Region'); ?></th>
		<th><?php echo __('Ip City'); ?></th>
		<th><?php echo __('Ip Latitude'); ?></th>
		<th><?php echo __('Ip Longitude'); ?></th>
		<th><?php echo __('Ip Isp'); ?></th>
		<th><?php echo __('Ip Org'); ?></th>
		<th><?php echo __('Ip Asnum'); ?></th>
		<th><?php echo __('Ip User Type'); ?></th>
		<th><?php echo __('Ip Country Confidence'); ?></th>
		<th><?php echo __('Ip Region Confidence'); ?></th>
		<th><?php echo __('Ip City Confidence'); ?></th>
		<th><?php echo __('Ip Postal Confidence'); ?></th>
		<th><?php echo __('Ip Postal Code'); ?></th>
		<th><?php echo __('Ip Accuracy Radius'); ?></th>
		<th><?php echo __('Ip Net Speed Cell'); ?></th>
		<th><?php echo __('Ip Metro Code'); ?></th>
		<th><?php echo __('Ip Area Code'); ?></th>
		<th><?php echo __('Ip Time Zone'); ?></th>
		<th><?php echo __('Ip Region Name'); ?></th>
		<th><?php echo __('Ip Domain'); ?></th>
		<th><?php echo __('Ip Country Name'); ?></th>
		<th><?php echo __('Ip Continent Code'); ?></th>
		<th><?php echo __('Ip Corporate Proxy'); ?></th>
		<th><?php echo __('Anonymous Proxy'); ?></th>
		<th><?php echo __('Proxy Score'); ?></th>
		<th><?php echo __('Is Trans Proxy'); ?></th>
		<th><?php echo __('Free Mail'); ?></th>
		<th><?php echo __('Carder Email'); ?></th>
		<th><?php echo __('High Risk Username'); ?></th>
		<th><?php echo __('High Risk Password'); ?></th>
		<th><?php echo __('Bin Match'); ?></th>
		<th><?php echo __('Bin Country'); ?></th>
		<th><?php echo __('Bin Name Match'); ?></th>
		<th><?php echo __('Bin Name'); ?></th>
		<th><?php echo __('Bin Phone Match'); ?></th>
		<th><?php echo __('Bin Phone'); ?></th>
		<th><?php echo __('Customer Phone In Billing Location'); ?></th>
		<th><?php echo __('Ship Forward'); ?></th>
		<th><?php echo __('City Postal Match'); ?></th>
		<th><?php echo __('Ship City Postal Match'); ?></th>
		<th><?php echo __('Score'); ?></th>
		<th><?php echo __('Explanation'); ?></th>
		<th><?php echo __('Risk Score'); ?></th>
		<th><?php echo __('Queries Remaining'); ?></th>
		<th><?php echo __('Maxmind Id'); ?></th>
		<th><?php echo __('Error'); ?></th>
		<th><?php echo __('Date Added'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($customer['OrderFraud'] as $orderFraud): ?>
		<tr>
			<td><?php echo $orderFraud['order_id']; ?></td>
			<td><?php echo $orderFraud['customer_id']; ?></td>
			<td><?php echo $orderFraud['country_match']; ?></td>
			<td><?php echo $orderFraud['country_code']; ?></td>
			<td><?php echo $orderFraud['high_risk_country']; ?></td>
			<td><?php echo $orderFraud['distance']; ?></td>
			<td><?php echo $orderFraud['ip_region']; ?></td>
			<td><?php echo $orderFraud['ip_city']; ?></td>
			<td><?php echo $orderFraud['ip_latitude']; ?></td>
			<td><?php echo $orderFraud['ip_longitude']; ?></td>
			<td><?php echo $orderFraud['ip_isp']; ?></td>
			<td><?php echo $orderFraud['ip_org']; ?></td>
			<td><?php echo $orderFraud['ip_asnum']; ?></td>
			<td><?php echo $orderFraud['ip_user_type']; ?></td>
			<td><?php echo $orderFraud['ip_country_confidence']; ?></td>
			<td><?php echo $orderFraud['ip_region_confidence']; ?></td>
			<td><?php echo $orderFraud['ip_city_confidence']; ?></td>
			<td><?php echo $orderFraud['ip_postal_confidence']; ?></td>
			<td><?php echo $orderFraud['ip_postal_code']; ?></td>
			<td><?php echo $orderFraud['ip_accuracy_radius']; ?></td>
			<td><?php echo $orderFraud['ip_net_speed_cell']; ?></td>
			<td><?php echo $orderFraud['ip_metro_code']; ?></td>
			<td><?php echo $orderFraud['ip_area_code']; ?></td>
			<td><?php echo $orderFraud['ip_time_zone']; ?></td>
			<td><?php echo $orderFraud['ip_region_name']; ?></td>
			<td><?php echo $orderFraud['ip_domain']; ?></td>
			<td><?php echo $orderFraud['ip_country_name']; ?></td>
			<td><?php echo $orderFraud['ip_continent_code']; ?></td>
			<td><?php echo $orderFraud['ip_corporate_proxy']; ?></td>
			<td><?php echo $orderFraud['anonymous_proxy']; ?></td>
			<td><?php echo $orderFraud['proxy_score']; ?></td>
			<td><?php echo $orderFraud['is_trans_proxy']; ?></td>
			<td><?php echo $orderFraud['free_mail']; ?></td>
			<td><?php echo $orderFraud['carder_email']; ?></td>
			<td><?php echo $orderFraud['high_risk_username']; ?></td>
			<td><?php echo $orderFraud['high_risk_password']; ?></td>
			<td><?php echo $orderFraud['bin_match']; ?></td>
			<td><?php echo $orderFraud['bin_country']; ?></td>
			<td><?php echo $orderFraud['bin_name_match']; ?></td>
			<td><?php echo $orderFraud['bin_name']; ?></td>
			<td><?php echo $orderFraud['bin_phone_match']; ?></td>
			<td><?php echo $orderFraud['bin_phone']; ?></td>
			<td><?php echo $orderFraud['customer_phone_in_billing_location']; ?></td>
			<td><?php echo $orderFraud['ship_forward']; ?></td>
			<td><?php echo $orderFraud['city_postal_match']; ?></td>
			<td><?php echo $orderFraud['ship_city_postal_match']; ?></td>
			<td><?php echo $orderFraud['score']; ?></td>
			<td><?php echo $orderFraud['explanation']; ?></td>
			<td><?php echo $orderFraud['risk_score']; ?></td>
			<td><?php echo $orderFraud['queries_remaining']; ?></td>
			<td><?php echo $orderFraud['maxmind_id']; ?></td>
			<td><?php echo $orderFraud['error']; ?></td>
			<td><?php echo $orderFraud['date_added']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'order_frauds', 'action' => 'view', $orderFraud['Array'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'order_frauds', 'action' => 'edit', $orderFraud['Array'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'order_frauds', 'action' => 'delete', $orderFraud['Array']), null, __('Are you sure you want to delete # %s?', $orderFraud['Array'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order Fraud'), array('controller' => 'order_frauds', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Return Operations'); ?></h3>
	<?php if (!empty($customer['Return'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Return Id'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Firstname'); ?></th>
		<th><?php echo __('Lastname'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Telephone'); ?></th>
		<th><?php echo __('Product'); ?></th>
		<th><?php echo __('Model'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Opened'); ?></th>
		<th><?php echo __('Return Reason Id'); ?></th>
		<th><?php echo __('Return Action Id'); ?></th>
		<th><?php echo __('Return Status Id'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Date Ordered'); ?></th>
		<th><?php echo __('Date Added'); ?></th>
		<th><?php echo __('Date Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($customer['Return'] as $return): ?>
		<tr>
			<td><?php echo $return['return_id']; ?></td>
			<td><?php echo $return['order_id']; ?></td>
			<td><?php echo $return['product_id']; ?></td>
			<td><?php echo $return['customer_id']; ?></td>
			<td><?php echo $return['firstname']; ?></td>
			<td><?php echo $return['lastname']; ?></td>
			<td><?php echo $return['email']; ?></td>
			<td><?php echo $return['telephone']; ?></td>
			<td><?php echo $return['product']; ?></td>
			<td><?php echo $return['model']; ?></td>
			<td><?php echo $return['quantity']; ?></td>
			<td><?php echo $return['opened']; ?></td>
			<td><?php echo $return['return_reason_id']; ?></td>
			<td><?php echo $return['return_action_id']; ?></td>
			<td><?php echo $return['return_status_id']; ?></td>
			<td><?php echo $return['comment']; ?></td>
			<td><?php echo $return['date_ordered']; ?></td>
			<td><?php echo $return['date_added']; ?></td>
			<td><?php echo $return['date_modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'return_operations', 'action' => 'view', $return['return_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'return_operations', 'action' => 'edit', $return['return_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'return_operations', 'action' => 'delete', $return['return_id']), null, __('Are you sure you want to delete # %s?', $return['return_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Return'), array('controller' => 'return_operations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Reviews'); ?></h3>
	<?php if (!empty($customer['Review'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Review Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Author'); ?></th>
		<th><?php echo __('Text'); ?></th>
		<th><?php echo __('Rating'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Date Added'); ?></th>
		<th><?php echo __('Date Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($customer['Review'] as $review): ?>
		<tr>
			<td><?php echo $review['review_id']; ?></td>
			<td><?php echo $review['product_id']; ?></td>
			<td><?php echo $review['customer_id']; ?></td>
			<td><?php echo $review['author']; ?></td>
			<td><?php echo $review['text']; ?></td>
			<td><?php echo $review['rating']; ?></td>
			<td><?php echo $review['status']; ?></td>
			<td><?php echo $review['date_added']; ?></td>
			<td><?php echo $review['date_modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'reviews', 'action' => 'view', $review['review_id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'reviews', 'action' => 'edit', $review['review_id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'reviews', 'action' => 'delete', $review['review_id']), null, __('Are you sure you want to delete # %s?', $review['review_id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Review'), array('controller' => 'reviews', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
