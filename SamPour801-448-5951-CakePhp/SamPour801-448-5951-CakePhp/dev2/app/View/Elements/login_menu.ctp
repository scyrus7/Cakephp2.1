<?php 
if(!$this->Session->check('Auth.User'))
{
?>

<?php
echo $this->Html->link('Login','/users/login');
?> or 
<?php
echo $this->Html->link('Register for free ;-)','/users/register');

} else {
$username = $this->Session->read('Auth.User.username');
echo " Hello ". $username ."&nbsp;";
echo $this->Html->link("(logout)", "/users/logout", array(), null, false);
}
?>
