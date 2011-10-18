<div class="contactDetails form">
<?php echo $this->Form->create('ContactDetail');?>
	<fieldset>
 		<legend><?php echo __('Edit Contact Detail'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('contact_detail_type_id');
		echo $this->Form->input('value');
		echo $this->Form->input('primary');
		echo $this->Form->input('contact_id');
		echo $this->Form->input('creator_id');
		echo $this->Form->input('modifier_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ContactDetail.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ContactDetail.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Contact Details', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Enumerations', true), array('controller' => 'enumerations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact Detail Type', true), array('controller' => 'enumerations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contacts', true), array('controller' => 'contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact', true), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
	</ul>
</div>