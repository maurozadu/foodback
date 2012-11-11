<h2>¿Querés participar de sorteos y promociones?</h2>
<p>Completá tus datos a continuación	</p>
<?php /*if($qualification['Venue']['promotion']): ?>
	<h3>Si nos das tus datos participas por la promoción:</h3>
	<p><?=$qualification['Venue']['promotion'];?></p>
<?php endif;*/ ?>
<?=$this->Form->create('Qualification'); ?>
<?=$this->Form->input('Qualification.id', array('value' => $qualification['Qualification']['id'], 'type' => 'hidden')); ?>
<?=$this->Form->input('Qualification.edad'); ?>
<?=$this->Form->input('Qualification.email'); ?>
<?=$this->Form->end('Enviar'); ?>