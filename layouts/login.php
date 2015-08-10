<?php
namespace matacms\theme\simple\assets;
use Yii;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use matacms\theme\simple\assets\ThemeAsset;

$bundle = ThemeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>

	<script src="//use.typekit.net/xnl0kun.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>

	<?php $this->head() ?>
	<link rel="icon" href="<?= $bundle->baseUrl ?>/images/favicon/mata-logo-favicon.png" type="image/png" />

</head>

<body>
	<?php $this->beginBody() ?>

	<div class="container">
		<?= $content ?>
	</div>
	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
