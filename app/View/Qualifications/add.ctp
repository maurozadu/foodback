<h2>Califica tu experiencia con <?=$venue['Venue']['name'];?></h2>
<?php if($venue['Venue']['promotion']): ?>
	<h3>Promoción:</h3>
	<p><?=$venue['Venue']['promotion'];?></p>
<?php endif; ?>
<?=$this->Form->create('Qualification'); ?>
<?=$this->Form->input('Qualification.code', array('value' => $code, 'type' => 'hidden')); ?>
<?=$this->Form->input('Qualification.venue_id', array('value' => $venue['Venue']['id'], 'type' => 'hidden')); ?>
<?=$this->Form->input('Qualification.lo_mejor'); ?>
<?=$this->Form->input('Qualification.lo_peor'); ?>
<?=$this->Form->end('Enviar'); ?>