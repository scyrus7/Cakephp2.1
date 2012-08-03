<!-- File: /app/views/Tasks/edit.ctp -->
	
<h1>Edit Task</h1>
<?php
	echo $this->Form->create('Task', array('action' => 'edit'));
	echo $this->Form->input('title');
	echo $this->Form->input('body', array('rows' => '3'));
	echo $this->Form->input('latitude');
	echo $this->Form->input('longitude');
	echo $this->Form->input('id', array('type' => 'hidden')); 
	echo $this->Form->end('Save To Dos');
?>
