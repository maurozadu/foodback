<h2>Califica tu experiencia con <?=$venue['Venue']['name'];?></h2>
<?php if($venue['Venue']['promotion']): ?>
	<h3>Promoción:</h3>
	<p><?=$venue['Venue']['promotion'];?></p>
<?php endif; ?>
<?=$this->Form->create(); ?>
<?=$this->Form->input('venue_id', $venue['Venue']['id']); ?>
<?=$this->Form->input('lo_mejor'); ?>
<?=$this->Form->input('lo_peor'); ?>
<?=$this->Form->end('Enviar'); ?>