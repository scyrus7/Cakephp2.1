

<div id="form-wrapper">
		<?php
	//	echo $this->Session->flash('auth'); 
		echo $this->Form->create('User', array('action' => 'register'));
		?>
	<div id="form-inner">
		<?php
		echo $this->Form->input('username');
		?>
		<!--<input id="username" name="username" required="required" type="text" placeholder="myusername"/> -->
		<?php
		echo $this->Form->input('password');
		echo $this->Form->input('password_confirm', array('type' => 'password'));
		echo $this->Form->input('email');

		echo $this->Form->submit();
		?>
	</div>
		<?php
		echo $this->Form->end();
		?>
</div>

<!--
<h2>Create an Account</h2>
<?php
//echo $this->Form->create('User', array('action' => 'register'));
//echo $this->Form->input('username');
// Force the FormHelper to render a password field, and change the label.
//echo $this->Form->input('group_id', array('type' => 'hidden', 'value' => 'Insert-Default-Value'));
//echo $this->Form->input('passwrd', array('type' => 'password', 'label' => 'Password'));
//echo $this->Form->input('email', array('between' => 'We need to send you a confirmation email to check you are human.'));
//echo $this->Form->submit('Create Account');
//echo $this->Form->end();
?>-->