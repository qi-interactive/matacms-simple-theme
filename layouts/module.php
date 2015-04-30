<?php
use matacms\theme\simple\assets\ModuleAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\web\View;

ModuleAsset::register($this);

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
</head>

<script>

/**
 * Hitting any link directly will cause the layout not to show. 
 * Detect it, and if we are not in an iFrame redirect to layout.
 */
 // if (inIframe() == false)
 	// window.location.href = "/mata-cms/#" + window.location.href;

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
	<?php
	
	$this->registerJs("

		$(window).ready(function() {	        
			mata.addActiveStateToMenuItemsOnLoad('" . $this->context->module->id . "');
		});", View::POS_READY);

		?>

		<div class="container">
			<?= $content ?>
		</div>
		<?php $this->endBody() ?>
	</body>
	</html>
	<?php $this->endPage() ?>
