<?php 
if(!$this->Session->check('Auth.User') )
{
	 echo $this->Facebook->login();
	 ?>
	<?php
?>
	
	<?php
	echo $this->Html->link('Login','/users/login');
	?> or 
	<?php
	echo $this->Html->link('Register for free ;-)','/users/register');

} 



else {
	?>
	<a  href="/dev2/users/logout"><img id="" onclick="logout('/dev2/users/logout');" alt="Facebook logout" src="/dev2/Facebook/img/facebook-logout.png"></a>
	<?php
	$username = $this->Session->read('Auth.User.username');
	echo " Hello ". $username ."&nbsp;";
	echo $this->Html->link("(logout)", "/users/logout", array(), null, false);
}
?>


