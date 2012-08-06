



<div class="users form">
<?php if($facebook_user)
	{
	//	echo $this->Facebook->logout(array('redirect'=>(array('controller' => 'users', 'action' => 'logout'))));
//	echo $this->Facebook->logout();
	?>
	<a  href="/dev2/users/logout"><img id="" onclick="logout('/dev2/users/logout');" alt="Facebook logout" src="/dev2/Facebook/img/facebook-logout.png"></a>
	<?php
	//print_r ($facebook_user);
	//	debug($user);
	}
	else{ 
	 echo $this->Facebook->login(); 
	
	}
?>


<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User', array('action' => 'login'));?>
    <fieldset>
        <legend><?php echo __('Login Secure'); ?></legend>
		<br /> 
		<?php
// if an error occured display the error message
if(isset($error)) {
	echo "<div class='error'>" . $error . "</div>";
}
?>
		
    <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end('Login'); ?>
</div>