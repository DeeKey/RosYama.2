<?php
$this->breadcrumbs=array(
	'Типы барьеров'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список типов барьеров', 'url'=>array('index')),
);
?>

<h1>Создать тип барьера</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>