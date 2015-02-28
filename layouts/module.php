<?php
use matacms\assets\ModuleAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use  matacms\theme\simple\assets\ThemeAsset;

ModuleAsset::register($this);
ThemeAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>

<script>

/**
 * Hitting any link directly will cause the layout not to show. 
 * Detect it, and if we are not in an iFrame redirect to layout.
 */
 if (inIframe() == false)
 	window.location.href = "/mata-cms/#" + window.location.href;

 function inIframe () {
 	try {
 		return window.self !== window.top;
 	} catch (e) {
 		return true;
 	}
 }
</script>

<body>
	<?php $this->beginBody() ?>

	<div class="container">
		<?= $content ?>
	</div>
	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
