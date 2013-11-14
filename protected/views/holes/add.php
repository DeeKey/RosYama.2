<?
$this->pageTitle=Yii::app()->name . ' :: Добавление барьера';
?>

<div id="addmess" style="display:none; color:#0C0"><p><b>Выберите место на карте и кликните по нему два раза, чтобы отметить расположение барьера.</b></p></div>
  <div class="head">
		<div class="container">
<div class="lCol"><a href="/" class="logo" title="На главную"><img src="<? echo Yii::app()->params['logo_path'] ?>" alt="РосДоступ" /></a>

</div>
						<div class="rCol">
							<h1>Добавление барьера</h1>
<ul class="steps">
	<li>
		<p class="number">1</p>
		<p>Добавьте фотографию барьера и&nbsp;введите основные параметры <em>(адрес, фото, описание)</em></p>
	</li>
	<li>
		<p class="number">2</p>
		<p>Отправьте автоматически сгенерированное письмо в&nbsp;местный орган власти. Не&nbsp;забудьте вписать свои личные данные.</p>
	</li>
	<li>
		<p class="number">3</p>
		<p>Через 37&nbsp;дней загрузите фото устраненного барьера или отправьте жалобу в&nbsp;прокуратуру</p>
	</li>
</ul>
						</div>
		</div>
	</div>
	<div class="mainCols">
			
<?php echo $this->renderPartial('_form', array('model'=>$model, 'newimage'=>new PictureFiles)); ?>

</div>


