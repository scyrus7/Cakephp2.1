<h1>Edit Your profile</h1>
<?php
	echo $this->Form->create('User', array('action' => 'profile'));
	echo $this->Form->input('username');
	echo $this->Form->input('password');
	echo $this->Form->input('email');	
	echo $this->Form->input('id', array('type' => 'hidden')); 
	echo $this->Form->end('Save');
?>
