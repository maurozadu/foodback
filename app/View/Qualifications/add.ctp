<h2>Califica tu experiencia con <?=$venue['Venue']['name'];?></h2>
<?php if($venue['Venue']['promotion']): ?>
	<h3>Promoción:</h3>
	<p><?=$venue['Venue']['promotion'];?></p>
<?php endif;
$options = array(
	'options' => array(1 => 'Horrible', 'Malo', 'Bueno', 'Muy Bueno', 'Excelente'),
	'type' => 'select',
	'empty' => '- elegir',
);
?>
<?=$this->Form->create('Qualification'); ?>
<?=$this->Form->input('Qualification.code', array('value' => $code, 'type' => 'hidden')); ?>
<?=$this->Form->input('Qualification.venue_id', array('value' => $venue['Venue']['id'], 'type' => 'hidden')); ?>
<?=$this->Form->input('Qualification.precio', $options); ?>
<?=$this->Form->input('Qualification.calidad', $options); ?>
<?=$this->Form->input('Qualification.relacion_precio_calidad', $options); ?>
<?=$this->Form->input('Qualification.puntualidad', $options); ?>
<?=$this->Form->input('Qualification.atencion', $options); ?>
<?=$this->Form->input('Qualification.recomendaria', array(
	'label' => '¿Nos recomendarías?',
	'type' => 'select',
	'options' => array('1' => 'Sí', '0' => 'No'),
)); ?>
<?=$this->Form->input('Qualification.comentario', array('label' => '¿Qué le dirías al dueño?')); ?>
<?=$this->Form->end('Enviar'); ?>