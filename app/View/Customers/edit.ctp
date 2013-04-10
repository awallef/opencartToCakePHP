<div class="customers form">
<?php echo $this->Form->create('Customer'); ?>
	<fieldset>
		<legend><?php echo __('Edit Customer'); ?></legend>
	<?php
		echo $this->Form->input('customer_id');
		echo $this->Form->input('store_id');
		echo $this->Form->input('firstname');
		echo $this->Form->input('lastname');
		echo $this->Form->input('email');
		echo $this->Form->input('telephone');
		echo $this->Form->input('fax');
		echo $this->Form->input('password');
		echo $this->Form->input('salt');
		echo $this->Form->input('cart');
		echo $this->Form->input('wishlist');
		echo $this->Form->input('newsletter');
		echo $this->Form->input('address_id');
		echo $this->Form->input('customer_group_id');
		echo $this->Form->input('ip');
		echo $this->Form->input('status');
		echo $this->Form->input('approved');
		echo $this->Form->input('token');
		echo $this->Form->input('date_added');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Customer.customer_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Customer.customer_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'index')); ?></li>
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
