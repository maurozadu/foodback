<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout; ?></title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('style');
		//echo $this->Html->css('app');
		//echo $this->Html->css('foundation.min');
		//echo $this->Html->css('style');
		//echo $this->Html->script('jquery.mobile-1.2.0.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

        <? //<table width="50%" border="0"><tr><td> ?>

			<?php /*<div id="menu">
				<?php if(AuthComponent::user('id')): ?>
					Bienvenido <?=$authUser['User']['first_name'];?>
					<?=$this->Html->link('Logout', $logoutUrl);?>
				<?php else: ?>
					<?php //echo $this->Html->link('Login with facebook', $fbLoginUrl);?>
				<?php endif; ?>
			</div>*/ ?>
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
	<? //</td></tr></table> ?>
</body>
</html>
