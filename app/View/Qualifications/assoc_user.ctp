<h2>¿Queres darnos más datos?</h2>
<p>Así podemos contactarte con promociones, descuentos y novedades.</p>
<?php /*if($qualification['Venue']['promotion']): ?>
	<h3>Si nos das tus datos participas por la promoción:</h3>
	<p><?=$qualification['Venue']['promotion'];?></p>
<?php endif;*/ ?>
<?=$this->Form->create('Qualification'); ?>
<?=$this->Form->input('Qualification.id', array('value' => $qualification['Qualification']['id'], 'type' => 'hidden')); ?>
<?=$this->Form->input('Qualification.gender_id', array('label' => 'Sexo')); ?>
<?=$this->Form->input('Qualification.edad'); ?>
<?=$this->Form->input('Qualification.email'); ?>
<?=$this->Form->end('Enviar'); ?>