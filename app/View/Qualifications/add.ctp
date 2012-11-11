<h2>¿Cómo fue tu experiencia?</h2>
<? /* con <?=$venue['Venue']['name'];?></h2>
<?php if($venue['Venue']['promotion']): ?>
	<h3>Promoción:</h3>
	<p><?=$venue['Venue']['promotion'];?></p>
<?php endif;*/
$options = array(
	'options' => array(1 => 'Horrible', 'Malo', 'Bueno', 'Muy Bueno', 'Excelente'),
	'type' => 'select',
	'empty' => '- elegir',
);
?>
<?=$this->Form->create('Qualification'); ?>
<?=$this->Form->input('Qualification.restaurant', array('label' => 'Nombre del bar o restaurant')); ?>
<?=$this->Form->input('Qualification.relacion_precio_calidad', array_merge($options, array('label' => 'Relación precio-calidad'))); ?>
<?=$this->Form->input('Qualification.puntualidad', $options); ?>
<?=$this->Form->input('Qualification.atencion', array_merge($options, array('label' => 'Atención'))); ?>
<?=$this->Form->input('Qualification.recomendaria', array(
	'label' => '¿Recomendarías este lugar?',
	'type' => 'select',
	'options' => array('1' => 'Sí', '0' => 'No'),
)); ?>
<?=$this->Form->input('Qualification.comentario', array('label' => '¿Qué le dirías al dueño?')); ?>
<?=$this->Form->end('Enviar'); ?>