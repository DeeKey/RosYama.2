<?php
$this->breadcrumbs=array(
	'Типы барьеров'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Список типов барьеров', 'url'=>array('index')),
	array('label'=>'Создать тип барьера', 'url'=>array('create')),
);
?>

<h1>Изменить тип барьера "<?php echo $model->name; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>