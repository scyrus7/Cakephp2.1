<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

	?>
	 <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	
	
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link('Powered By Awesomeshortcut.com', 'http://www.awesomeshortcut.com'); ?></h1>
			
			<h1><?php echo $this->Html->link('Your Profile', '/users/profile'); ?></h1>
			<h1><?php echo $this->Html->link('Tasks', '/tasks/index'); ?></h1>
			<div style="color: white; text-align: right;">
	<h1>	<?php echo $this-> element('login_menu'); ?> </h1>
		</div>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.Awesomeshortcut.com/',
					array('target' => '_blank', 'escape' => false)
				);
			?>	

 <!---  <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) {return;}
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-like-box" data-href="http://www.facebook.com/pages/Development-Pioneer/108504595959400" data-width="292" data-height="180" data-colorscheme="light" data-show-faces="true" data-stream="false" data-header="false" data-border-color="#ffffff"></div>
			-->
		</div>
		   
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>