<div class="customers index">
	<h2><?php echo __('Customers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('customer_id'); ?></th>
			<th><?php echo $this->Paginator->sort('store_id'); ?></th>
			<th><?php echo $this->Paginator->sort('firstname'); ?></th>
			<th><?php echo $this->Paginator->sort('lastname'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('telephone'); ?></th>
			<th><?php echo $this->Paginator->sort('fax'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('salt'); ?></th>
			<th><?php echo $this->Paginator->sort('cart'); ?></th>
			<th><?php echo $this->Paginator->sort('wishlist'); ?></th>
			<th><?php echo $this->Paginator->sort('newsletter'); ?></th>
			<th><?php echo $this->Paginator->sort('address_id'); ?></th>
			<th><?php echo $this->Paginator->sort('customer_group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ip'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('approved'); ?></th>
			<th><?php echo $this->Paginator->sort('token'); ?></th>
			<th><?php echo $this->Paginator->sort('date_added'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($customers as $customer): ?>
	<tr>
		<td><?php echo h($customer['Customer']['customer_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($customer['Store']['name'], array('controller' => 'stores', 'action' => 'view', $customer['Store']['store_id'])); ?>
		</td>
		<td><?php echo h($customer['Customer']['firstname']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['lastname']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['email']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['telephone']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['fax']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['password']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['salt']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['cart']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['wishlist']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['newsletter']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($customer['Address']['address_id'], array('controller' => 'addresses', 'action' => 'view', $customer['Address']['address_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($customer['CustomerGroup']['customer_group_id'], array('controller' => 'customer_groups', 'action' => 'view', $customer['CustomerGroup']['customer_group_id'])); ?>
		</td>
		<td><?php echo h($customer['Customer']['ip']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['status']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['approved']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['token']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['date_added']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $customer['Customer']['customer_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $customer['Customer']['customer_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $customer['Customer']['customer_id']), null, __('Are you sure you want to delete # %s?', $customer['Customer']['customer_id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Customer'), array('action' => 'add')); ?></li>
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
