<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="ru" />
<meta name="copyright" content="<?=Yii::app()->params->copyright;?>" />
<meta name="robots" content="index, follow" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<link rel="icon" href="/favicon.ico" type="image/x-icon" />

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/template_styles.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
<!--[if lte IE 7]><link rel="stylesheet" href="/css/ie.css" type="text/css" /><![endif]-->


<script type="text/javascript" src="http://userapi.com/js/api/openapi.js?22"></script>

<script type="text/javascript">VK.init({apiId: <?php echo Yii::app()->params['vkWidget_apiId'] ?>, onlyWidgets: true});</script>

</head>

<body>

<script type="text/javascript">
					$(document).ready(function(){
						if ($('.name  a').width()>$('.auth .name').width())
							{
								$('.grad').show()
							}
					})
				</script>

<div class="wrap">
<div class="navigation">
		<div class="container">
			<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'О проекте', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Карта', 'url'=>array('/holes/map')),
				array('label'=>'Порядок работы', 'url'=> array('/site/page', 'view'=>'workorder')),			
				array('label'=>'FAQ', 'url'=>array('/site/page', 'view'=>'faq')),
				/*array('label'=>'Статистика', 'url'=>array('/statics/index')),*/
				array('label'=>'Нормативы', 'url'=>array('/site/page', 'view'=>'regulations')),
				array('label'=>'Контакты', 'url'=>array('/site/page', 'view'=>'contacts')),
//				array('label'=>'Справочники', 'url'=>array('/sprav/index')), // Намеренно убрано для Росдоступа
				//array('label'=>'Logout ('.$this->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!$this->user->isGuest)
			),
			'htmlOptions'=>array('class'=>'menu'),
			'firstItemCssClass'=>'first',
			'activeCssClass'=>'selected',
		)); ?>
			<div class="search">
				<form action="/map">
			<input type="image" name="s" src="/images/search_btn.gif" class="btn" /><input type="text" class="textInput inactive" name="q"  value="Поиск по адресу" />
	<script type="text/javascript">
		$(document).ready(function(){
			var startSearchWidth=$('.search').width();
			var startSearchInputWidth=$('.search .textInput').width();
			var time=200;

							var searchWidth=230;
				var	searchInputWidth=searchWidth-30;

										searchInputWidth-=47;
				searchWidth-=47;
							if ($.browser.msie && $.browser.version == 9) {
					searchInputWidth+=5;
					searchWidth+=5;
					}
				$('.search .textInput').click(function(){
					if ($(this).val()=='Поиск по адресу')
					{
						$(this).val('').removeClass('inactive');
					}
					$('.search').animate({width:searchWidth},time);
					$('.search .textInput').animate({width:searchInputWidth},time);
				})
				$('.search .textInput').blur(function(){

					if ($(this).val()=='')
					{
						$(this).val('Поиск по адресу').addClass('inactive');
					}
					$('.search').animate({width:startSearchWidth},time);
					$('.search .textInput').animate({width:startSearchInputWidth},time);
				})
			})
	</script>
	</form>
			</div>
			<div class="auth">
			<?php if(!$this->user->isGuest) : ?>
					<?php echo CHtml::link('<img src="/images/logout.png" alt="Выйти" />',Array('/site/logout'),Array('title'=>'Выйти')); ?>
					<div class="name">
						<p><?php echo CHtml::link($this->user->fullname,Array('/holes/personal')); ?></p><span class="grad"></span>
					</div>
				<?php else: ?>
					<?php echo CHtml::link('Войти',Array('/holes/personal'),Array('title'=>'Войти', 'class'=>'profileBtn')); ?>
				<? endif; ?>
					<style type="text/css">
						.auth .name
						{
							width: 150px !important;
						}

					</style>

			</div>
		</div>
	</div>
		<?php echo $content; ?>


	<? if (!$this->user->isGuest && $flash=$this->user->getFlash('user')):?>
		<div id="addDiv">
			<div id="fon">
			</div>
			<div id="popupdiv">
			<?php echo ($flash); ?>
				 <span class="filterBtn close">
					<i class="text">Продолжить</i>
				 </span>
			</div>
		</div>

		<script type="text/javascript">
		$(document).ready(function(){
			$('.close').click(function(){
				$('#popupdiv').fadeOut(400);
				$('#fon').fadeOut(600);
				$('#addDiv').fadeOut(800);
			})
		})

		</script>
	<?endif?>


	<div class="footer">

		<div class="container">
		<div class="left_footer">
		</div>
		<div class="center_footer">
			<?php if($this->beginCache('countHoles', array('duration'=>3600))) { ?>
			<?php $this->widget('application.widgets.collection.collectionWidget'); ?>
			<?php $this->endCache(); } ?>
			<br/>Сайт создан на базе проекта  <a href="http://rosyama.ru" target="_blank">«РосЯма»</a> при поддержке <a href="http://te-st.ru" target="_blank">Теплицы социальных технологий</a>
		</div>
		<div class="right_footer">
			<a title="Теплица социальных технологий – краудсорсинг, технологии для третьего сектора" href="http://te-st.ru/"><img title="Теплица социальных технологий – краудсорсинг, технологии для третьего сектора" src="http://te-st.ru/wp-content/uploads/white-logo-100x50.png" alt="Теплица социальных технологий – краудсорсинг, технологии для третьего сектора" width="100" height="50" /></a>
			<a target="_blank" href="http://www.perspektiva-inva.ru"><img src="http://www.perspektiva-inva.ru/files/banner/rooi-perspektiva_88x31_v1.png" alt="РООИ Перспектива. Открываем новые возможности" width="88" height="31" /></a>
		</div>
	</div>

	<script type="text/javascript">
                var reformalOptions = {
                        project_id: <?php echo Yii::app()->params['reformal_prj_id'] ?>,
			project_host: "<?php echo Yii::app()->params['reformal_prj_host'];?>",
                        force_new_window: false,
                        tab_alignment: "left",
                        tab_top: "316",
                        tab_image_url: "http://reformal.ru/files/images/buttons/reformal_tab_orange.png"
                };
                (function() {
                        if ('https:' == document.location.protocol) return;
                        var script = document.createElement('script');
                        script.type = 'text/javascript';
                        script.src = 'http://media.reformal.ru/widgets/v1/reformal.js';
                        document.getElementsByTagName('head')[0].appendChild(script);
                })();
        </script>


	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', '<?php echo Yii::app()->params["ganalytics_acc"] ?>']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>


	</body>
	</html>
