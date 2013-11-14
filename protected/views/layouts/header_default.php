<?php $this->beginContent('//layouts/main'); ?>
<div class="head">
		<div class="container">
			<div class="lCol">
					<a href="/" class="logo" title="На главную"><img src="<? echo Yii::app()->params['logo_path'] ?>" alt="Логотип" /></a>
					<div class="btn">
						<?php echo CHtml::link('<i class="text">Добавить</i><i class="arrow"></i>',Array('/holes/add'),Array('class'=>'addFact')); ?>
					</div>
			</div>

			<div class="rCol">
				<ul class="aboutProject">
					<li class="about1">Добавить барьер и&nbsp;отправить заявление в&nbsp;местный орган власти<em></em></li>
					<li class="about2">Ждать 37&nbsp;календарных дней с&nbsp;момента регистрации вашего заявления</li>
					<li class="about3">Если барьер не&nbsp;устранили, отправлять жалобу в&nbsp;прокуратуру</li>
				</ul>
			</div>
		</div>
	</div>
	

	<div class="mainCols">
	<?php echo $content; ?>
	</div>		
	
<?php $this->endContent(); ?>
