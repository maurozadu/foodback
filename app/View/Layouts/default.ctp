<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout; ?></title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>foodback logo</h1>
		</div>
		<div id="content">
			<div id="menu">
				<?php if(AuthComponent::user('id')): ?>
					Bienvenido <?=$authUser['User']['first_name'];?>
					<?=$this->Html->link('Logout', $logoutUrl);?>
				<?php else: ?>
					<?=$this->Html->link('Login with facebook', $fbLoginUrl);?>
				<?php endif; ?>
			</div>
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			foodback
		</div>
	</div>
</body>
</html>
