



<div class="users form">
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