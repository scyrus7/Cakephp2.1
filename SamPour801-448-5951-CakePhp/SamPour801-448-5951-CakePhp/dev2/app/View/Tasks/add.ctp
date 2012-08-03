<!-- File: /app/views/Tasks/add.ctp -->	
	
<h1>Add Todos</h1><p style="text-align: right"><?php echo $this->Html->link("Back To All todos", array('action' => 'index')); ?></p>
<?php
echo $this->Form->create('Task');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));


echo $this->Form->input('file', array('type' => 'file'));
echo $this->Form->input('latitude');
echo $this->Form->input('longitude');
echo $this->Form->end('Save To Dos');
?>