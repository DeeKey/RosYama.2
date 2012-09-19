<?
$this->pageTitle=Yii::app()->name . ' - FAQ';
$this->layout='//layouts/header_default_without_add';
?>
<div class="lCol">
<?php $this->widget('application.widgets.news.newsWidget'); ?>
<?php $this->widget('application.widgets.social.socialWidget'); ?>
</div>
<div class="rCol">
<h1>Вопросы и ответы</h1>
<iframe height="600" width="990" frameBorder="3" src="http://rosdostup.ru/dokuwiki_integrated/doc.php?id=faq:faq">your browser does not support IFRAMEs</iframe>
